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
            'propOrgName' => ['required', 'min:4', 'max:40'],
            'propSubName' => ['required', 'min:4', 'max:40'],
            'propSubAddress1' => ['required', 'min:4', 'max:40'],
            'propSubAddress2' => ['required', 'min:4', 'max:40'],
            'propId' => ['required', 'min:4', 'max:20'],
            'propNn' => ['required', 'min:4', 'max:20'],
            'propVersion' => ['required', 'min:4', 'max:20'],
            'propAssembly' => ['required', 'min:4', 'max:20'],
            'propMinSpeed' => ['required', 'integer', 'min:-1', 'max:300'],
            'propMaxSpeed' => ['required', 'integer', 'min:0', 'max:300'],
            'propGetTime' => ['required', 'integer', 'min:1000', 'max:10000'],
            'propSendTime' => ['required', 'integer', 'min:1000', 'max:10000'],
            'propTimeout' => ['required', 'integer', 'min:3000', 'max:100000'],
            'propError' => ['required', 'integer', 'min:0', 'max:5000'],
            'propLatitude' => ['required', 'numeric', 'min:-500', 'max:500'],
            'propLongitude' => ['required', 'numeric', 'min:-500', 'max:500'],
            'propWatchTime' => ['required', 'integer', 'min:3000', 'max:100000'],
            'propAppMode' => ['required', 'integer', 'min:0', 'max:1'],
            'propAppRegister' => ['required', 'integer', 'min:0', 'max:1'],
        ];
    }
}
