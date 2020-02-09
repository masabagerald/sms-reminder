<?php

namespace App\Http\Controllers\Admin;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFacilityRequest;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacilitiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::all();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.facilities.create');
    }

    public function store(StoreFacilityRequest $request)
    {
        $facility = Facility::create($request->all());

        return redirect()->route('admin.facilities.index');
    }

    public function edit(Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        $facility->update($request->all());

        return redirect()->route('admin.facilities.index');
    }

    public function show(Facility $facility)
    {
        abort_if(Gate::denies('facility_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->load('facilityHealthWorkers');

        return view('admin.facilities.show', compact('facility'));
    }

    public function destroy(Facility $facility)
    {
        abort_if(Gate::denies('facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->delete();

        return back();
    }

    public function massDestroy(MassDestroyFacilityRequest $request)
    {
        Facility::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
