<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function saveForm(array $inputs)
    {
        $this->fill($inputs);
        $this->save();
    }
}
