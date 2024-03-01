<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

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
        $withdrawalsTotal = $this->withdrawals()->sum('withdrawal');
        return $this->initial_salary - $withdrawalsTotal;
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', "%{$value}%")->orWhere('phone', 'like', "%{$value}%")->orWhere('address', 'like', "%{$value}%")->orWhere('notes', 'like', "%{$value}%");
    }
}
