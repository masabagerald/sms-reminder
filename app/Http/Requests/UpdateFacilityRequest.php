<?php

namespace App\Http\Requests;

use App\Facility;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFacilityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'  => [
                'required',
            ],
            'email' => [
                'required',
                'unique:facilities,email,' . request()->route('facility')->id,
            ],
        ];
    }
}
