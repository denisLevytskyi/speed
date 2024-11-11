<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function manufacturer () {
        return $this->belongsTo(CarManufacturer::class, 'manufacturer_id', 'id');
    }

    public function drive () {
        return $this->hasMany(Drive::class, 'car_id', 'id');
    }

    public function odometer () {
        $lastDrive =  $this->drive()->where('status', '=', TRUE)->orderBy('id', 'desc');
        if ($lastDrive->exists()) {
            return $lastDrive->first()->odometer + round($lastDrive->first()->list()->sum('distance') / 1000);
        } else {
            return 0;
        }
    }
}
