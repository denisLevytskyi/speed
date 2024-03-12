<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manufacturer_id',
        'model',
        'number',
        'color',
        'fuel',
        'year'
    ];

    public function manufacturer () {
        return $this->hasOne(CarManufacturer::class, 'id', 'manufacturer_id');
    }

    public function getMark () {
        return $this->manufacturer->mark;
    }
}
