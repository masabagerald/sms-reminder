<?php

namespace App\Http\Controllers\Admin;

use App\Facility;
use App\HealthWorker;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHealthWorkerRequest;
use App\Http\Requests\StoreHealthWorkerRequest;
use App\Http\Requests\UpdateHealthWorkerRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HealthWorkersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('health_worker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthWorkers = HealthWorker::all();

        return view('admin.healthWorkers.index', compact('healthWorkers'));
    }

    public function create()
    {
        abort_if(Gate::denies('health_worker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.healthWorkers.create', compact('facilities'));
    }

    public function store(App\Http\Controllers\Admin\StoreHealthWorkerRequest $request)
    {
        $healthWorker = HealthWorker::create($request->all());

        return redirect()->route('admin.health-workers.index');
    }

    public function edit(HealthWorker $healthWorker)
    {
        abort_if(Gate::denies('health_worker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $healthWorker->load('facility');

        return view('admin.healthWorkers.edit', compact('facilities', 'healthWorker'));
    }

    public function update(UpdateHealthWorkerRequest $request, HealthWorker $healthWorker)
    {
        $healthWorker->update($request->all());

        return redirect()->route('admin.health-workers.index');
    }

    public function show(HealthWorker $healthWorker)
    {
        abort_if(Gate::denies('health_worker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthWorker->load('facility');

        return view('admin.healthWorkers.show', compact('healthWorker'));
    }

    public function destroy(HealthWorker $healthWorker)
    {
        abort_if(Gate::denies('health_worker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthWorker->delete();

        return back();
    }

    public function massDestroy(MassDestroyHealthWorkerRequest $request)
    {
        HealthWorker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
