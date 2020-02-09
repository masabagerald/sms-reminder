<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\Mother',
            'date_field' => 'edd',
            'field'      => 'name',
            'prefix'     => '',
            'suffix'     => 'expected to deliver today',
            'route'      => 'admin.mothers.edit',
        ],
        [
            'model'      => '\\App\\Infant',
            'date_field' => 'pcr_exp_date',
            'field'      => 'name',
            'prefix'     => 'child',
            'suffix'     => 'pcr today',
            'route'      => 'admin.infants.edit',
        ],
        [
            'model'      => '\\App\\Appointment',
            'date_field' => 'date',
            'field'      => 'mother',
            'prefix'     => 'Mothers',
            'suffix'     => 'Appointment Today',
            'route'      => 'admin.appointments.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
