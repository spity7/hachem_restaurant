@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('products.create') }}">
                Create Product
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Products list</div>

        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>الكمية الحالية</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->current_quantity }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('products.edit', $product) }}">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
