<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Withdrawal;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWithdrawalRequest $request, Employee $employee)
    {
        $withdrawalData = $request->validated();
        $withdrawalData['employee_id'] = $employee->id;

        Withdrawal::create($withdrawalData);

        return redirect()->route('employees.index')->with('success', 'تم سحب السلفة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWithdrawalRequest $request, Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyOne(Withdrawal $withdrawal)
    {
        $withdrawal->delete();

        return redirect()->route('employees.index')->with('success', 'تم مسح السلفة ');
    }

    public function destroyMultiple(Employee $employee)
    {
        $employee->withdrawals()->delete();

        return redirect()->route('employees.index')->with('success', 'تم مسمح السلف');
    }

    public function destroyAll()
    {
        Withdrawal::truncate();

        return redirect()->route('employees.index')->with('success', 'تم مسح كل السلف');
    }
}
