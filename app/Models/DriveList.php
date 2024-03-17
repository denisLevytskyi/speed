<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriveList extends Model
{
    use HasFactory;

    protected $fillable = [
        'drive_id',
        'timestamp',
        'speed',
        'time',
        'latitude',
        'longitude',
    ];
}