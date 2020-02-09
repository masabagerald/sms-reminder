@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.update", [$appointment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.appointment.fields.date') }}</label>

                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $appointment->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif

            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.appointment.fields.type') }}</label>

                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    @foreach($types as $id => $type)

                        <option value="{{ $id }}" {{$appointment->type?$appointment->visit_type->id: old('type') == $id ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>


                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="mother_id">{{ trans('cruds.appointment.fields.mother') }}</label>
                <select class="form-control select2 {{ $errors->has('mother') ? 'is-invalid' : '' }}" name="mother_id" id="mother_id" required>
                    @foreach($mothers as $id => $mother)
                        <option value="{{ $id }}" {{$appointment->mother_id?$appointment->mother->id: old('mother_id') == $id ? 'selected' : '' }}>{{ $mother }}</option>
                    @endforeach
                </select>
                @if($errors->has('mother_id'))
                    <span class="text-danger">{{ $errors->first('mother_id') }}</span>
                @endif

            </div>

            <div class="form-group">
                <label for="notes">{{ trans('cruds.appointment.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes'),$appointment->notes }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif

            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
