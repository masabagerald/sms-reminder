@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subcounty.title') }}
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
                            {{ trans('cruds.subcounty.fields.name') }}
                        </th>
                        <td>
                            {{ $subcounty->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcounty.fields.county') }}
                        </th>
                        <td>
                            {{ $subcounty->county_id }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subcounties.index') }}">
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
            <a class="nav-link" href="#subcounty_health_workers" role="tab" data-toggle="tab">
                {{ trans('cruds.healthWorker.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="subcounty_health_workers">
            @includeIf('admin.facilities.relationships.subcountyHealthWorkers', ['healthWorkers' => $subcounty->subcountyHealthWorkers])
        </div>
    </div>
</div>

@endsection
