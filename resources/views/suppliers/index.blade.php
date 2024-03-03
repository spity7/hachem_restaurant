@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('suppliers.create') }}">
                Create Supplier
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Suppliers list</div>

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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Shop Name</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->shop_name }}</td>
                            <td>{{ $supplier->notes }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('suppliers.edit', $supplier) }}">
                                    Edit
                                </a>
                                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
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
