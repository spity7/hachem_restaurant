@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Supplier</div>

        <div class="card-body">
            <form action="{{ route('suppliers.update', $supplier) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="required" for="name">Name:</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $supplier->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="phone">Phone:</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                        name="phone" id="phone" value="{{ old('phone', $supplier->phone) }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="address">Address:</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', $supplier->address) }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="shop_name">Shop Name:</label>
                    <input class="form-control {{ $errors->has('shop_name') ? 'is-invalid' : '' }}" type="integer"
                        name="shop_name" id="shop_name" value="{{ old('shop_name', $supplier->shop_name) }}">
                    @if ($errors->has('shop_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('shop_name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text"
                        name="notes" id="notes" value="{{ old('notes', $supplier->notes) }}">
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
