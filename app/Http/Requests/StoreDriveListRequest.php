<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreDriveListRequest extends FormRequest
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
            'driveEditDrive' => ['required', 'integer'],
            'driveEditTimestamp' => ['required', 'integer'],
            'driveEditTime' => ['required', 'numeric'],
            'driveEditSpeed' => ['required', 'numeric'],
            'driveEditLatitude' => ['required', 'numeric'],
            'driveEditLongitude' => ['required', 'numeric'],
            'driveEditDistance' => ['required', 'numeric'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        abort(404);
    }
}