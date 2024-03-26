<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->belongsTo(CarManufacturer::class, 'manufacturer_id', 'id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
