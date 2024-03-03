<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'notes',
        'initial_salary',
        'current_salary',
        'withdrawals',
    ];

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function getCurrentSalaryAttribute()
    {
        return $this->initial_salary - $this->withdrawals_total;
    }

    public function getWithdrawalsTotalAttribute()
    {
        return $this->withdrawals()->sum('withdrawal');
    }
}
