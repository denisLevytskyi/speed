<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

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
            'adminEditEmail' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($this->admin)],
            'adminEditPassword' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
