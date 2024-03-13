<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'car_id',
        'point_a',
        'point_b',
        'odometer',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car () {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
