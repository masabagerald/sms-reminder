<?php

namespace App\Http\Requests;

use App\HealthWorker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHealthWorkerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('health_worker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'phone'       => [
                'required',
            ],
            'facility_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
