<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::all();
        $employees_count = Employee::count();
        $employees_total_salaries = Employee::sum('initial_salary');
        $withdrawals_total = Withdrawal::sum('withdrawal');
        $salaries_rest = $employees_total_salaries - $withdrawals_total;

        $products = Product::all();
        $suppliers = Supplier::all();

        return view('home', compact(
            'employees',
            'employees_count',
            'employees_total_salaries',
            'withdrawals_total',
            'salaries_rest',
            'products',
            'suppliers'
        ));
    }
}
