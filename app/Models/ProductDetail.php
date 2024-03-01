<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'increase',
        'price',
        'decrease',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('notes', 'like', "%{$value}%");
    }
}
