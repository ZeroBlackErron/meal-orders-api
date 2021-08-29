<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'amount',
        'customer_name',
        'customer_email',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    protected $attributes = [
        'amount' => 0,
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($order) {
            $order->code = Str::upper(Str::random());
        });
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mealOrders()
    {
        return $this->hasMany(MealOrder::class);
    }
}
