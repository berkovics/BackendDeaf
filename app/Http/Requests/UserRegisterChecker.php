<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterChecker extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            "name" => ["required", "unique:users", "max:50"],
            "email" => ["required", "regex:/(.+)@(.+)\.(.+)/i", "unique:users"],
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required", "same:password"]
        ];
    }

    public function messages(){
        return [
            "name.required" => "Kérem írja be a Név",
            "name.max" => "Túl hosszú név",
            "email.required" => "Kérem írja be az Email",
            "email.regex" => "Nem valós email cím",
            "email.unique" => "Már létező email cím",
            "password.required" => "Kérem írja be a Jelszó",
            "password_confirmation.required" => "Kérem írja be a Jelszó megerősítés",
            "password_confirmation.same" => "A két jelszó nem egyezik!"
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            "success" => false,
            "message" => "Adatbeviteli hiba",
            "data" => $validator->errors()
        ]));
    }
}
