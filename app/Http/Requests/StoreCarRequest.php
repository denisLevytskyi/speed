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
            'carCreateManufacturerId' => ['required', 'exists:car_manufacturers,id'],
            'carCreateModel' => ['required'],
            'carCreateNumber' => ['required', 'min:3', 'max:10'],
            'carCreateColor' => ['required', 'min:3', 'max:20'],
            'carCreateFuel' => 'required',
            'carCreateYear' => ['required', 'numeric', 'min:1900', 'max:2030']
        ];
    }
}
