<?php

namespace App\Imports;

use App\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class CompaniesImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Company([
            'name' => $row['name'],
            'email' => $row['email'],
            'website' => $row['website'],
            'logo' => null
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }

    public function rules(): array
    {
        return [            
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:companies,email,'],
            'website'   => ['required', 'unique:companies,website,'],
        ];
    }
}
