<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSingleServiceRequest extends FormRequest
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
            'name_en' => 'required|unique:services,name_en,' . $this->id . ',id',
            'name_ar' => 'required|unique:services,name_ar,' . $this->id . ',id',
            'description_en' => 'required|unique:services,description_en,' . $this->id . ',id',
            'description_ar' => 'required|unique:services,description_ar,' . $this->id . ',id',
            'price' => 'numeric|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('Dashboard/validation.required'),
            'name.unique' => trans('Dashboard/validation.unique'),
            'price.required' => trans('Dashboard/validation.required'),
            'price.numeric' => trans('Dashboard/validation.numeric'),
        ];
    }
}