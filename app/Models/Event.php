<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    protected $fillable = ['user_id', 'event_name', 'payload'];


    protected $casts = [
        'payload' => 'array',
    ];

}
