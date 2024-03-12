<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'adminEditName' => ['required', 'string', 'max:255'],
            'adminEditEmail' => ['required', 'string', 'email', 'max:255'],
            'adminEditPassword' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
