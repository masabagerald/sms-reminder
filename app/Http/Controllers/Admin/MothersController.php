<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherRequest;
use App\Http\Requests\StoreMotherRequest;
use App\Http\Requests\UpdateMotherRequest;
use App\Mother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\VisitType;
use Carbon\Carbon;

class MothersController extends Controller
{
    use CsvImportTrait;


    public function index()
    {




        abort_if(Gate::denies('mother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::all();

        return view('admin.mothers.index', compact('mothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mothers.create');
    }

    public function store(StoreMotherRequest $request)
    {
        $mother = Mother::create($request->all());

        //get the visit pick the name and the no of days

        $visit_types = VisitType::all();

        //id, date, type, mother_id, sms_flag, appointment_flag, notes, actual_date, created_at, updated_at

        foreach($visit_types as $type){

            $appointment= new Appointment;
            $appointment->date= Carbon::now()->addDay($type->days);
            $appointment->type=$type->id;
            $appointment->mother_id=$mother->id;

            $appointment->save();
        }

        return redirect()->route('admin.mothers.index');
    }

    public function edit(Mother $mother)
    {
        abort_if(Gate::denies('mother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mothers.edit', compact('mother'));
    }

    public function update(UpdateMotherRequest $request, Mother $mother)
    {
        $mother->update($request->all());

        return redirect()->route('admin.mothers.index');
    }

    public function show(Mother $mother)
    {
        abort_if(Gate::denies('mother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mother->load('motherInfants');

        return view('admin.mothers.show', compact('mother'));
    }

    public function destroy(Mother $mother)
    {
        abort_if(Gate::denies('mother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mother->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherRequest $request)
    {
        Mother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
