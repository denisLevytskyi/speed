<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriveRequest extends FormRequest
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
            'driveCreateCarId' => ['required', 'exists:cars,id'],
            'driveCreatePointA' => ['required', 'min:3', 'max:20'],
            'driveCreatePointB' => ['required', 'min:3', 'max:20'],
            'driveCreateOdometer' => ['required', 'integer', 'min:0', 'max:1000000']
        ];
    }
}
