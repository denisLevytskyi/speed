<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreAdminRequest extends FormRequest
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
            'adminCreateName' => ['required', 'string', 'max:255'],
            'adminCreateEmail' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email'],
            'adminCreatePassword' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
