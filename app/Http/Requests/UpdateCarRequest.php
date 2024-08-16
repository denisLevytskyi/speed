<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'carEditManufacturerId' => ['required', 'integer'],
            'carEditModel' => ['required'],
            'carEditNumber' => ['required', 'min:3', 'max:10'],
            'carEditColor' => ['required', 'min:3', 'max:20'],
            'carEditFuel' => 'required',
            'carEditYear' => ['required', 'numeric', 'min:1900', 'max:2030']
        ];
    }
}
