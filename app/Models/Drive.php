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
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function car () {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }
}
