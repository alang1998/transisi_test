<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function saveForm(array $inputs)
    {
        $this->fill($inputs);
        $this->save();
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
