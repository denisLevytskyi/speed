<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSearchRequest extends FormRequest
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
            'searchStart' => ['required', 'date'],
            'searchEnd' => ['required', 'date'],
            'searchUserId' => ['nullable', 'exists:users,id'],
            'searchCarId' => ['nullable', 'exists:cars,id'],
            'searchPointA' => ['nullable', 'min:3', 'max:20'],
            'searchPointB' => ['nullable', 'min:3', 'max:20'],
        ];
    }
}
