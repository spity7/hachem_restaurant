<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'total_increase', 'total_decrease', 'current_quantity', 'quantity_alert', 'notes'
    ];

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', "%{$value}%");
    }

    public function getCurrentQuantityAttribute()
    {
        return $this->total_increase - $this->total_decrease;
    }
}
