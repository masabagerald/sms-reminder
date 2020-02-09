@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mother.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.id') }}
                        </th>
                        <td>
                            {{ $mother->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.name') }}
                        </th>
                        <td>
                            {{ $mother->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.age') }}
                        </th>
                        <td>
                            {{ $mother->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Mother::MARITAL_STATUS_RADIO[$mother->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.village') }}
                        </th>
                        <td>
                            {{ $mother->village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.parish') }}
                        </th>
                        <td>
                            {{ $mother->parish }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.subcounty') }}
                        </th>
                        <td>
                            {{ $mother->subcounty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.phone') }}
                        </th>
                        <td>
                            {{ $mother->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.anc_no') }}
                        </th>
                        <td>
                            {{ $mother->anc_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.hiv_status') }}
                        </th>
                        <td>
                            {{ App\Mother::HIV_STATUS_RADIO[$mother->hiv_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.newly_tested') }}
                        </th>
                        <td>
                            {{ App\Mother::NEWLY_TESTED_RADIO[$mother->newly_tested] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.newly_art') }}
                        </th>
                        <td>
                            {{ App\Mother::NEWLY_ART_RADIO[$mother->newly_art] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.edd') }}
                        </th>
                        <td>
                            {{ $mother->edd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.notes') }}
                        </th>
                        <td>
                            {{ $mother->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mothers.index') }}">
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
            <a class="nav-link" href="#mother_infants" role="tab" data-toggle="tab">
                {{ trans('cruds.infant.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="mother_infants">
            @includeIf('admin.mothers.relationships.motherInfants', ['infants' => $mother->motherInfants])
        </div>
    </div>
</div>

@endsection
