<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prop extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];

    public function getProp ($key) {
        if ($this->where('key', '=', $key)->exists()) {
            return $this->where('key', '=', $key)->first()->value;
        } else {
            return '';
        }
    }
}
