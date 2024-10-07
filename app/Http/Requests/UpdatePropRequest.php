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
            'propShowOrgName' => ['required', 'min:3', 'max:40'],
            'propShowSubName' => ['required', 'min:3', 'max:40'],
            'propShowSubAddress1' => ['required', 'min:3', 'max:40'],
            'propShowSubAddress2' => ['required', 'min:3', 'max:40'],
            'propShowId' => ['required', 'min:3', 'max:20'],
            'propShowNn' => ['required', 'min:3', 'max:20'],
            'propShowVersion' => ['required', 'min:3', 'max:20'],
            'propShowAssembly' => ['required', 'min:3', 'max:20'],
            'propDriveMinSpeed' => ['required', 'integer', 'min:-1', 'max:300'],
            'propDriveMaxSpeed' => ['required', 'integer', 'min:0', 'max:300'],
            'propDriveGetTime' => ['required', 'integer', 'min:1000', 'max:10000'],
            'propDriveSendTime' => ['required', 'integer', 'min:1000', 'max:10000'],
            'propDriveTimeout' => ['required', 'integer', 'min:3000', 'max:100000'],
            'propDriveError' => ['required', 'integer', 'min:0', 'max:5000'],
            'propWatchLatitude' => ['required', 'numeric', 'min:-500', 'max:500'],
            'propWatchLongitude' => ['required', 'numeric', 'min:-500', 'max:500'],
            'propWatchTime' => ['required', 'integer', 'min:3000', 'max:100000'],
            'propAppMode' => ['required', 'integer', 'min:0', 'max:1'],
            'propAppRegister' => ['required', 'integer', 'min:0', 'max:1'],
            'propAppPaginator' => ['required', 'integer', 'min:1', 'max:100'],
            'propSmsChance' => ['required', 'integer', 'min:0', 'max:100'],
            'propSmsName' => ['required', 'min:3', 'max:100'],
            'propSmsSubject' => ['required', 'min:3', 'max:100'],
            'propSmsLine1' => ['required', 'min:3', 'max:300'],
            'propSmsLine2' => ['required', 'min:3', 'max:300'],
            'propSmsLine3' => ['required', 'min:3', 'max:300'],
            'propSmsRandom' => ['required', 'min:3', 'max:100000'],
            'propSmsSeparator' => ['required', 'min:1', 'max:3'],
        ];
    }
}
