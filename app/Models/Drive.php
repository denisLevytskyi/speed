<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory, SoftDeletes;

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

    public function list () {
        return $this->hasMany(DriveList::class, 'drive_id', 'id');
    }

    public function hasData () {
        return $this->list()->exists();
    }
}
