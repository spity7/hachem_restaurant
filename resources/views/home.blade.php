@extends('layouts.app')

@section('content')
    @foreach ($products as $product)
        @if ($product->current_quantity <= $product->quantity_alert)
            <div class="card" style="width: 19rem; font-weight: bold;">
                <div class="card-header text-danger">!!! تنبيه !!!</div>

                <div class="card-body">
                    إنتبه الى : {{ $product->name }}
                </div>
            </div>
        @endif
    @endforeach


    <div class="card" style="width: 16rem; font-weight: bold;">
        <div class="card-header">عدد الموظفين: {{ $employees_count }}</div>

        <div class="card-body">
            مجموع الرواتب: {{ $employees_total_salaries }}
            <br><br>
            <span class="text-danger">
                مجموع السلف: {{ $withdrawals_total }}
            </span>
            <br><br>
            <span class="text-success">
                باقي الرواتب: {{ $salaries_rest }}
            </span>
        </div>
    </div>
@endsection
