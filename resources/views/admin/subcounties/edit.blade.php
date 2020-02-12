@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subcounty.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subcounties.update", [$subcounty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.subcounty.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $subcounty->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif

            </div>

            <div class="form-group">
                <label for="county_id">{{ trans('cruds.subcounty.fields.county_id') }}</label>
                <select class="form-control select2 {{ $errors->has('county_id') ? 'is-invalid' : '' }}" name="county_id" id="county_id" required>
                    @foreach($counties as $id => $county)
                        <option value="{{ $id }}" {{ ($subcounty->county ? $subcounty->county->id : old('mother_id')) == $id ? 'selected' : '' }}>{{ $county }}</option>
                    @endforeach
                </select>
                @if($errors->has('county_id'))
                <span class="text-danger">{{ $errors->first('county_id') }}</span>
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
