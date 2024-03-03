@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">تعديل الموظف</div>

        <div class="card-body">
            <form action="{{ route('employees.update', $employee) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $employee->name) }}" required>
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
                        name="phone" id="phone" value="{{ old('phone', $employee->phone) }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="address">Address</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', $employee->address) }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group text-success">
                    <label class="required" for="initial_salary">الراتب الأساسي</label>
                    <input class="form-control {{ $errors->has('initial_salary') ? 'is-invalid' : '' }}" type="integer"
                        name="initial_salary" id="initial_salary"
                        value="{{ old('initial_salary', $employee->initial_salary) }}" required>
                    @if ($errors->has('initial_salary'))
                        <div class="invalid-feedback">
                            {{ $errors->first('initial_salary') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group text-danger">
                    <label for="withdrawals">مجموع السلف</label>
                    <input class="form-control {{ $errors->has('withdrawals') ? 'is-invalid' : '' }}" type="integer"
                        name="withdrawals" id="withdrawals" value="{{ old('withdrawals', $employee->withdrawalsTotal) }}"
                        readonly>
                    @if ($errors->has('withdrawals'))
                        <div class="invalid-feedback">
                            {{ $errors->first('withdrawals') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group text-success">
                    <label for="current_salary">باقي الراتب</label>
                    <input class="form-control {{ $errors->has('current_salary') ? 'is-invalid' : '' }}" type="integer"
                        name="current_salary" id="current_salary"
                        value="{{ old('current_salary', $employee->current_salary) }}" readonly>
                    @if ($errors->has('current_salary'))
                        <div class="invalid-feedback">
                            {{ $errors->first('current_salary') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text"
                        name="notes" id="notes" value="{{ old('notes', $employee->notes) }}">
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
        <div class="card-header text-danger">سحب سلفة</div>

        <div class="card-body">
            <form action="{{ route('withdrawals.store', $employee) }}" method="post">
                @csrf

                <div class="form-group text-danger">
                    <label class="required" for="withdrawal">السلفة</label>
                    <input class="form-control {{ $errors->has('withdrawal') ? 'is-invalid' : '' }}" type="number"
                        name="withdrawal" id="withdrawal" value="{{ old('withdrawal') }}" required>
                    @if ($errors->has('withdrawal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('withdrawal') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>

                <div class="form-group">
                    <label class="required" for="notes">Notes</label>
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
        <div class="card-header">السلف السابقة</div>

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
                        <th class="text-danger">السلفة</th>
                        <th>Notes</th>
                        <th>التاريخ</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    @foreach ($employee->withdrawals as $withdrawal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $withdrawal->withdrawal }}</td>
                            <td>{{ $withdrawal->notes }}</td>
                            <td>{{ $withdrawal->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('withdrawals.destroyOne', $withdrawal) }}" method="POST"
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
