<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'version',
        'eui',
        'packet',
        'packet_time',
        'serial_number',
        'level',
        'battery',
        'temperature',
        'payload',
    ];
}
