@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('employees.create') }}">
                Create Employee
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Employees list</div>

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
                        <th>
                            <form action="{{ route('withdrawals.destroyAll') }}" method="POST"
                                onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-sm btn-danger" value="مسح كل السلف">
                            </form>
                        </th>
                        <th>Name</th>
                        <th>الراتب الأساسي</th>
                        <th>السلف</th>
                        <th>باقي الراتب</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <form action="{{ route('withdrawals.destroyMultiple', $employee) }}" method="POST"
                                    onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="مسح السلفة">
                                </form>
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->initial_salary }}</td>
                            <td>{{ $employee->withdrawals_total }}</td>
                            <td>{{ $employee->current_salary }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('employees.edit', $employee) }}">
                                    Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST"
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
