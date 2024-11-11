<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarManufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'mark'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car () {
        return $this->hasMany(Car::class, 'manufacturer_id', 'id');
    }
}
