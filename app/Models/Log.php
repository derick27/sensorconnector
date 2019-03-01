<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{   //declaration 
    protected $fillable = [
        'version',
        'loraDevEui',
        'loraPacketSequenceNumber',
        'packetTimestamp',
        'deviceSerialNumber',
        'tankLevel',
        'batteryVoltage',
        'temperature',
        'rawPayloadBytes',
    ];
}
