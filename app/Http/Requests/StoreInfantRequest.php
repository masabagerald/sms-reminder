<?php

namespace App\Http\Requests;

use App\Infant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreInfantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('infant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'         => [
                'required',
            ],
            'mother_id'    => [
                'required',
                'integer',
            ],
            'age'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'eid_no'       => [
                'required',
                'unique:infants',
            ],
            'dob'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender'       => [
                'required',
            ],
            'pcr_exp_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
