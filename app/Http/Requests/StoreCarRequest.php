<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'CarCreateUserId' => 'required',
            'CarCreateManufacturer' => 'required',
            'CarCreateModel' => 'required',
            'CarCreateNumber' => ['required', 'min:4', 'max:10'],
            'CarCreateColor' => ['required', 'min:4', 'max:20'],
            'CarCreateFuel' => 'required',
            'CarCreateYear' => ['required', 'numeric']
        ];
    }
}
