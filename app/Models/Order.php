<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_total',
        'delivery_type',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected function orderTotal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => round($value, 2),
        );

    }
}
