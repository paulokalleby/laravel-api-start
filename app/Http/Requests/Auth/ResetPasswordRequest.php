<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => ['required','string','email'],
            'password' => ['required','string','min:8','max:16'],
            'token'    => ['required','string'],
        ];
    }
}
