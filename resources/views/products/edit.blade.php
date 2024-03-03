@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Product</div>

        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $product->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="quantity_alert">الإنذار</label>
                    <input class="form-control {{ $errors->has('quantity_alert') ? 'is-invalid' : '' }}" type="text"
                        name="quantity_alert" id="quantity_alert"
                        value="{{ old('quantity_alert', $product->quantity_alert) }}">
                    @if ($errors->has('quantity_alert'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity_alert') }}
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

    <hr>

    <div class="card">
        <div class="card-header text-success">إضافة كمية</div>

        <div class="card-body">
            <form action="{{ route('productDetails.addIncrease', $product) }}" method="post">
                @csrf

                <div class="form-group text-success">
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
                    <label class="required" for="price">Price:</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text"
                        name="price" id="price" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="notes">Notes:</label>
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

    <div class="card">
        <div class="card-header text-danger">سحب كمية</div>

        <div class="card-body">
            <form action="{{ route('productDetails.addDecrease', $product) }}" method="post">
                @csrf

                <div class="form-group text-danger">
                    <label class="required" for="decrease">الكمية:</label>
                    <input class="form-control {{ $errors->has('decrease') ? 'is-invalid' : '' }}" type="number"
                        name="decrease" id="decrease" value="{{ old('decrease') }}" required>
                    @if ($errors->has('decrease'))
                        <div class="invalid-feedback">
                            {{ $errors->first('decrease') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="notes">Notes:</label>
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

    <hr>

    <div class="card">
        <div class="card-header">المعاملات السابقة</div>

        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>Notes</th>
                        <th>التاريخ</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->details as $detail)
                        @if ($detail->decrease)
                            <tr class="table-danger">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->decrease }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->notes }}</td>
                                <td>{{ $detail->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <form action="{{ route('productDetails.destroy', $detail) }}" method="POST"
                                        onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr class="table-success">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->increase }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->notes }}</td>
                                <td>{{ $detail->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <form action="{{ route('productDetails.destroy', $detail) }}" method="POST"
                                        onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
