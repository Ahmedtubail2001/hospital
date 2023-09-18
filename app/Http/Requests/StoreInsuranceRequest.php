<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceRequest extends FormRequest
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
        return [
            'insurance_code' => 'required',
            'discount_percentage' => 'required|numeric',
            'Company_rate' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'insurance_code.required' => trans('validation.required'),
            'discount_percentage.required' => trans('validation.required'),
            'discount_percentage.numeric' => trans('validation.numeric'),
            'Company_rate.required' => trans('validation.required'),
            'Company_rate.numeric' => trans('validation.numeric'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.unique' => trans('validation.unique'),

        ];
    }
}