<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'id';
    public $incrementing = false; // ID là string (session ID)

    protected $casts = [
        'last_activity' => 'integer',
    ];
}
