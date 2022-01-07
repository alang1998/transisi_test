<?php

namespace App\Services;

use App\Company;
use App\Imports\CompaniesImport;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CompanyService
{
    public function getRecords($recordPerPage = 10): LengthAwarePaginator
    {
        return Company::orderBy('id', 'DESC')
            ->paginate($recordPerPage);
    }

    public function storeHandler($request)
    {
        $company = new Company;
        $logo = $this->imgUpload($request);
        $newCompany = $request->all();
        $newCompany['logo'] = $logo;
        $company->saveForm($newCompany);
    }

    public function updateHandler($request, $company)
    {
        if ($request->hasFile('logo')) {
            $logo = $this->imgUpdate($request, $company);
        }
        $newCompany = $request->all();
        $newCompany['logo'] = $logo ?? $company->logo;
        $company->saveForm($newCompany);
    }

    public function destroyHandler($company)
    {
        $exists = Storage::disk('public')->exists('company/'.$company->logo);
        if ($exists) {
            Storage::disk('public')->delete('company/'.$company->logo);
            $company->delete();
        }
    }

    public function imgUpdate($request, $company)
    {
        $exists = Storage::disk('public')->exists('company/'.$company->logo);
        if ($exists) {
            Storage::disk('public')->delete('company/'.$company->logo);
            $logo = $this->imgUpload($request);
        }

        return $logo;
    }

    public function imgUpload($request)
    {
        if ($request->hasFile('logo')) {
            $fileName = time().'-'.Str::random(10).'.'.$request->logo->getClientOriginalExtension();
            $path = Storage::putFileAs(
                'public/company', 
                $request->file('logo'),
                $fileName
            );
        }
        
        return $fileName;
    }

    public function importHanlder($request)
    {     
        $request->validate([
            'import' => ['required', 'file']
        ]);

        $file = $request->file('import');

        try {
            $import = Excel::import(new CompaniesImport, $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $text = '';

            foreach ($failures as $failure) {
                $text .= $failure->errors()[0].'<br>';
            }

            return redirect()->route($this->baseRoute . 'index')
                ->with('danger', $text);
        }
    }

    public function companySelect2($request)
    {
        $page = $request->get('page');

        $resultCount = 5;

        $offset = ($page - 1) * $resultCount;

        $breeds = Company::where('name', 'LIKE',  '%' .$request->get("term"). '%')->orderBy('name')->skip($offset)->take($resultCount)->get(['id', DB::raw('name as text')]);

        $count = Company::count();
        $endCount = $offset + $resultCount;
        $morePages = $endCount < $count;

        $results = array(
            "results" => $breeds,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results);
    }
}