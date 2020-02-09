@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facility.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.id') }}
                        </th>
                        <td>
                            {{ $facility->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.name') }}
                        </th>
                        <td>
                            {{ $facility->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.email') }}
                        </th>
                        <td>
                            {{ $facility->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.contact') }}
                        </th>
                        <td>
                            {{ $facility->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.incharge') }}
                        </th>
                        <td>
                            {{ $facility->incharge }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.village') }}
                        </th>
                        <td>
                            {{ $facility->village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.subcounty') }}
                        </th>
                        <td>
                            {{ $facility->subcounty }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#facility_health_workers" role="tab" data-toggle="tab">
                {{ trans('cruds.healthWorker.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="facility_health_workers">
            @includeIf('admin.facilities.relationships.facilityHealthWorkers', ['healthWorkers' => $facility->facilityHealthWorkers])
        </div>
    </div>
</div>

@endsection
