<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $logoRule = ['mimes:png', 'max:2048', 'dimensions:min_width=100,min_height=100'];
        if ($this->id) {
            array_merge($logoRule, ['nullable']);
        } else {
            array_merge($logoRule, ['required, file']);
        }

        return [
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:companies,email,'.optional($this->company)->id],
            'website'   => ['required', 'unique:companies,website,'.optional($this->company)->id],
            'logo'      => $logoRule
        ];
    }
}
