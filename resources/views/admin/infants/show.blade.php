@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.infant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.id') }}
                        </th>
                        <td>
                            {{ $infant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.name') }}
                        </th>
                        <td>
                            {{ $infant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.mother') }}
                        </th>
                        <td>
                            {{ $infant->mother->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.age') }}
                        </th>
                        <td>
                            {{ $infant->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.eid_no') }}
                        </th>
                        <td>
                            {{ $infant->eid_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.dob') }}
                        </th>
                        <td>
                            {{ $infant->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Infant::GENDER_RADIO[$infant->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infant.fields.pcr_exp_date') }}
                        </th>
                        <td>
                            {{ $infant->pcr_exp_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
