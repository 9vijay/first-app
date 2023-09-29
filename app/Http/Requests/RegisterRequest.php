<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|max:50',
            'password'  =>  'required|min:6',
            'password_confirmation'  =>  'required|min:6|same:password',
        ];
        return $rules;
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.email' => 'Email should be in email format',
            'email.unique' => 'Email already in use',
            'name.required' => 'Name is required!',
            'name.max' => 'Max length is 50 characters',
            'password.required' => 'Password is required !',
            'password.min' => 'Password lenth is min 6 characters',
            'password.confirmed' => 'Password is not matched',
            'password_confirmation.required' => 'Password is required !',
            'password_confirmation.min' => 'Password lenth is min 6 characters',
            'password_confirmation.confirmed' => 'Password is not matched'
        ];
    }
}
