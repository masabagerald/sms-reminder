<?php

namespace App\Http\Controllers\Admin;

use App\County;
use App\Http\Controllers\Controller;
use App\Subcounty;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubcountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        abort_if(Gate::denies('subcounty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcounties = Subcounty::all();

        return view('admin.subcounties.index', compact('subcounties'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('subcounty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subcounties.create',compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcounty = subcounty::create($request->all());

        return redirect()->route('admin.subcounties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('subcounty_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcounty->load('subcountyHealthWorkers');

        return view('admin.subcounties.show', compact('subcounty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcounty $subcounty)
    {
        abort_if(Gate::denies('subcounty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcounty->load('county');

        return view('admin.subcounties.edit', compact('subcounty','counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcounty $subcounty)
    {
        $subcounty->update($request->all());

        return redirect()->route('admin.subcounties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcounty $subcounty)
    {
        abort_if(Gate::denies('subcounty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcounty->delete();

        return back();
    }

    public function massDestroy(MassDestroysubcountyRequest $request)
    {
        subcounty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
