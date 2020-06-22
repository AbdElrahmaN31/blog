<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationForm extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist(){
        //create the user
        $user = User::create(array_merge(request(['name', 'email']), [
            'password' => Hash::make(request('password'))
        ]));

        //sign him in
        auth()->login($user);

        //sending welcome email
        \Mail::to($user)->send(new Welcome($user));
    }
}
