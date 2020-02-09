<?php

namespace App\Http\Requests;

use App\Mother;
use App\Rules\PhoneNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class StoreMotherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }
  /*   protected function validator(array $data)
    {

        return Validator::make($data, [
            'phone' => 'required|regex:/(256)[0-9]{9}/',

        ]);
    }
 */
    public function rules()
    {
        return [
            'name'           => [
                'required',
            ],
            'age'            => [
                'required',
                'integer',
                'min:15',
                'max:70',
            ],
            'marital_status' => [
                'required',
            ],
            'village'        => [
                'required',
            ],
            'phone'         =>[
                'required',
                new PhoneNumber
            ],

            'anc_no'         => [
                'required',
                'unique:mothers',
            ],
            'edd'            => [
                'required','after:today',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
