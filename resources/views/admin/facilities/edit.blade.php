@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.facility.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facilities.update", [$facility->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.facility.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $facility->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.facility.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $facility->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact">{{ trans('cruds.facility.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', $facility->contact) }}">
                @if($errors->has('contact'))
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="incharge">{{ trans('cruds.facility.fields.incharge') }}</label>
                <input class="form-control {{ $errors->has('incharge') ? 'is-invalid' : '' }}" type="text" name="incharge" id="incharge" value="{{ old('incharge', $facility->incharge) }}">
                @if($errors->has('incharge'))
                    <span class="text-danger">{{ $errors->first('incharge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.incharge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="village">{{ trans('cruds.facility.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', $facility->village) }}">
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.village_helper') }}</span>
            </div>


            <div class="form-group">
                <label for="subcounty">{{ trans('cruds.facility.fields.subcounty') }}</label>
                <select class="form-control select2 {{ $errors->has('subcounty') ? 'is-invalid' : '' }}" name="subcounty" id="subcounty" required>
                    @foreach($subcounties as $id => $subcounty)
                        <option value="{{ $id }}" {{ ($facility->subcounty ? $facility->subcounty->id : old('subcounty')) == $id ? 'selected' : '' }}>{{ $subcounty }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcounty'))
                    <span class="text-danger">{{ $errors->first('subcounty') }}</span>
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
