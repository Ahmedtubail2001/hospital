<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAmbulanceRequest extends FormRequest
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
            'car_number' => 'required',
            'car_model_en' => 'required',
            'car_model_ar' => 'required',
            'car_type' => "required|in:1,2",
            'driver_name_en' => 'required',
            'driver_name_ar' => 'required',
            'driver_license_number' => 'required|numeric',
            'driver_phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'car_number.required' => trans('validation.required'),
            'car_model.required' => trans('validation.required'),
            'car_type.required' => trans('validation.required'),
            'driver_name_en.required' => trans('validation.required'),
            'driver_name_ar.required' => trans('validation.required'),
            'driver_license_number.required' => trans('validation.required'),
            'driver_license_number.numeric' => trans('validation.numeric'),
            'driver_phone.required' => trans('validation.required'),
            'driver_phone.numeric' => trans('validation.numeric'),
        ];
    }
}