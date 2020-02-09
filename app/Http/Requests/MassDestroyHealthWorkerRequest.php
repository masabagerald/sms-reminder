<?php

namespace App\Http\Requests;

use App\HealthWorker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHealthWorkerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('health_worker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:health_workers,id',
        ];
    }
}
