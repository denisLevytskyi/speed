<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropRequest extends FormRequest
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
            'propEditOrgName' => ['required', 'min:4', 'max:40'],
            'propEditSubName' => ['required', 'min:4', 'max:40'],
            'propEditSubAddress1' => ['required', 'min:4', 'max:40'],
            'propEditSubAddress2' => ['required', 'min:4', 'max:40'],
            'propEditId' => ['required', 'min:4', 'max:20'],
            'propEditPn' => ['required', 'min:4', 'max:20'],
            'propEditVersion' => ['required', 'min:4', 'max:20'],
            'propEditAssembly' => ['required', 'min:4', 'max:20'],
        ];
    }
}
