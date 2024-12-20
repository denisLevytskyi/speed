<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriveList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'drive_id',
        'timestamp',
        'speed',
        'time',
        'latitude',
        'longitude',
        'distance',
    ];
}
