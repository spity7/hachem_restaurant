@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Employee</div>

        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="phone">Phone</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                        name="phone" id="phone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="address">Address</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="address"
                        name="address" id="address" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="initial_salary">الراتب</label>
                    <input class="form-control {{ $errors->has('initial_salary') ? 'is-invalid' : '' }}"
                        type="number" name="initial_salary" id="initial_salary" value="{{ old('initial_salary') }}"
                        required>
                    @if ($errors->has('initial_salary'))
                        <div class="invalid-feedback">
                            {{ $errors->first('initial_salary') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label for="notes">ملاحظات</label>
                    <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text"
                        name="notes" id="notes" value="{{ old('notes') }}">
                    @if ($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
