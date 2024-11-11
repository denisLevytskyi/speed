<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'reportStart' => ['required', 'date'],
            'reportEnd' => ['required', 'date'],
            'reportUserId' => ['nullable', 'exists:users,id'],
            'reportCarId' => ['nullable', 'exists:cars,id'],
        ];
    }
}
