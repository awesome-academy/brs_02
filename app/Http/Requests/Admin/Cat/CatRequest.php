<?php

namespace App\Http\Requests\Admin\Cat;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            'cname' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'cname.required' => trans('lable.Request_catname'),
        ];
    }
}
