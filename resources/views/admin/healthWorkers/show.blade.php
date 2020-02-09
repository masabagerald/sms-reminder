@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.healthWorker.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.health-workers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.id') }}
                        </th>
                        <td>
                            {{ $healthWorker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.name') }}
                        </th>
                        <td>
                            {{ $healthWorker->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.title') }}
                        </th>
                        <td>
                            {{ $healthWorker->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.phone') }}
                        </th>
                        <td>
                            {{ $healthWorker->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.email') }}
                        </th>
                        <td>
                            {{ $healthWorker->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthWorker.fields.facility') }}
                        </th>
                        <td>
                            {{ $healthWorker->facility->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.health-workers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
