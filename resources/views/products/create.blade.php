@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Product</div>

        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label class="required" for="name">Name:</label>
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
                    <label class="required" for="increase">الكمية:</label>
                    <input class="form-control {{ $errors->has('increase') ? 'is-invalid' : '' }}" type="number"
                        name="increase" id="increase" value="{{ old('increase') }}" required>
                    @if ($errors->has('increase'))
                        <div class="invalid-feedback">
                            {{ $errors->first('increase') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="price">السعر:</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                        name="price" id="price" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="quantity_alert">الإنذار:</label>
                    <input class="form-control {{ $errors->has('quantity_alert') ? 'is-invalid' : '' }}" type="number"
                        name="quantity_alert" id="quantity_alert" value="{{ old('quantity_alert') }}">
                    @if ($errors->has('quantity_alert'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity_alert') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label for="notes">Notes:</label>
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
