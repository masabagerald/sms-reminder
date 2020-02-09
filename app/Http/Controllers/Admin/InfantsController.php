<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInfantRequest;
use App\Http\Requests\StoreInfantRequest;
use App\Http\Requests\UpdateInfantRequest;
use App\Infant;
use App\Mother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InfantsController extends Controller
{
    public function index()
    {
       abort_if(Gate::denies('infant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infants = Infant::all();

        return view('admin.infants.index', compact('infants'));
    }

    public function create()
    {
        abort_if(Gate::denies('infant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.infants.create', compact('mothers'));
    }

    public function store(StoreInfantRequest $request)
    {
        $infant = Infant::create($request->all());

        return redirect()->route('admin.infants.index');
    }

    public function edit(Infant $infant)
    {
        abort_if(Gate::denies('infant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $infant->load('mother');

        return view('admin.infants.edit', compact('mothers', 'infant'));
    }

    public function update(UpdateInfantRequest $request, Infant $infant)
    {
        $infant->update($request->all());

        return redirect()->route('admin.infants.index');
    }

    public function show(Infant $infant)
    {
        abort_if(Gate::denies('infant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infant->load('mother');

        return view('admin.infants.show', compact('infant'));
    }

    public function destroy(Infant $infant)
    {
        abort_if(Gate::denies('infant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infant->delete();

        return back();
    }

    public function massDestroy(MassDestroyInfantRequest $request)
    {
        Infant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
