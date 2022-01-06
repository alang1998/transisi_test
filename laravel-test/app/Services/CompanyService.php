<?php

namespace App\Services;

use App\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyService
{
    public function getRecords($recordPerPage = 10): LengthAwarePaginator
    {
        return Company::orderBy('id', 'DESC')
            ->paginate($recordPerPage);
    }

    public function handleStore($request)
    {
        $company = new Company;
        $logo = $this->imgUpload($request);
        $newCompany = $request->all();
        $newCompany['logo'] = $logo;
        $company->saveForm($newCompany);
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
}