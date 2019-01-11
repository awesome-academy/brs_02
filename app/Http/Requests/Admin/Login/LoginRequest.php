<?php

namespace App\Http\Requests\Admin\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
<<<<<<< HEAD
            'username.required' => trans('lable.request_username'),
            'password.required' => trans('lable.request_password'),
=======
            'username.required' => trans('lable.Request_username'),
            'password.required' => trans('lable.Request_password'),
>>>>>>> master
        ];
    }
}
