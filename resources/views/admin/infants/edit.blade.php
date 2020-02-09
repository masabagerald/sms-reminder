@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.infant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.infants.update", [$infant->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.infant.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $infant->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother_id">{{ trans('cruds.infant.fields.mother') }}</label>
                <select class="form-control select2 {{ $errors->has('mother') ? 'is-invalid' : '' }}" name="mother_id" id="mother_id" required>
                    @foreach($mothers as $id => $mother)
                        <option value="{{ $id }}" {{ ($infant->mother ? $infant->mother->id : old('mother_id')) == $id ? 'selected' : '' }}>{{ $mother }}</option>
                    @endforeach
                </select>
                @if($errors->has('mother_id'))
                    <span class="text-danger">{{ $errors->first('mother_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.infant.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $infant->age) }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="eid_no">{{ trans('cruds.infant.fields.eid_no') }}</label>
                <input class="form-control {{ $errors->has('eid_no') ? 'is-invalid' : '' }}" type="text" name="eid_no" id="eid_no" value="{{ old('eid_no', $infant->eid_no) }}" required>
                @if($errors->has('eid_no'))
                    <span class="text-danger">{{ $errors->first('eid_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.eid_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.infant.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $infant->dob) }}" required>
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.infant.fields.gender') }}</label>
                @foreach(App\Infant::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $infant->gender) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pcr_exp_date">{{ trans('cruds.infant.fields.pcr_exp_date') }}</label>
                <input class="form-control date {{ $errors->has('pcr_exp_date') ? 'is-invalid' : '' }}" type="text" name="pcr_exp_date" id="pcr_exp_date" value="{{ old('pcr_exp_date', $infant->pcr_exp_date) }}">
                @if($errors->has('pcr_exp_date'))
                    <span class="text-danger">{{ $errors->first('pcr_exp_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infant.fields.pcr_exp_date_helper') }}</span>
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
