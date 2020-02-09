@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mother.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mothers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.mother.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.mother.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age') }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.mother.fields.marital_status') }}</label>
                @foreach(App\Mother::MARITAL_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('marital_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="marital_status_{{ $key }}" name="marital_status" value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="marital_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="village">{{ trans('cruds.mother.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', '') }}" required>
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parish">{{ trans('cruds.mother.fields.parish') }}</label>
                <input class="form-control {{ $errors->has('parish') ? 'is-invalid' : '' }}" type="text" name="parish" id="parish" value="{{ old('parish', '') }}">
                @if($errors->has('parish'))
                    <span class="text-danger">{{ $errors->first('parish') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.parish_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subcounty">{{ trans('cruds.mother.fields.subcounty') }}</label>
                <input class="form-control {{ $errors->has('subcounty') ? 'is-invalid' : '' }}" type="text" name="subcounty" id="subcounty" value="{{ old('subcounty', '') }}">
                @if($errors->has('subcounty'))
                    <span class="text-danger">{{ $errors->first('subcounty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.subcounty_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.mother.fields.phone') }}</label>
                <input  class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>

                <span class="help-block">Format: 0771234567</span>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="anc_no">{{ trans('cruds.mother.fields.anc_no') }}</label>
                <input class="form-control {{ $errors->has('anc_no') ? 'is-invalid' : '' }}" type="text" name="anc_no" id="anc_no" value="{{ old('anc_no', '') }}" required>
                @if($errors->has('anc_no'))
                    <span class="text-danger">{{ $errors->first('anc_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.anc_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mother.fields.hiv_status') }}</label>
                @foreach(App\Mother::HIV_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('hiv_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="hiv_status_{{ $key }}" name="hiv_status" value="{{ $key }}" {{ old('hiv_status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="hiv_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('hiv_status'))
                    <span class="text-danger">{{ $errors->first('hiv_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.hiv_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mother.fields.newly_tested') }}</label>
                @foreach(App\Mother::NEWLY_TESTED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('newly_tested') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="newly_tested_{{ $key }}" name="newly_tested" value="{{ $key }}" {{ old('newly_tested', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="newly_tested_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('newly_tested'))
                    <span class="text-danger">{{ $errors->first('newly_tested') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.newly_tested_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mother.fields.newly_art') }}</label>
                @foreach(App\Mother::NEWLY_ART_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('newly_art') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="newly_art_{{ $key }}" name="newly_art" value="{{ $key }}" {{ old('newly_art', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="newly_art_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('newly_art'))
                    <span class="text-danger">{{ $errors->first('newly_art') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.newly_art_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="edd">{{ trans('cruds.mother.fields.edd') }}</label>
                <input class="form-control date {{ $errors->has('edd') ? 'is-invalid' : '' }}" type="text" name="edd" id="edd" value="{{ old('edd') }}" required>
                @if($errors->has('edd'))
                    <span class="text-danger">{{ $errors->first('edd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.edd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.mother.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.notes_helper') }}</span>
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
