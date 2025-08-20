<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'species',
        'breed',
        'birthdate',
        'gender',
        'color',
        'weight',
        'is_neutered',
        'microchip',
        'notes',
        'public_id',
        'is_lost',
    ];

    // Liên kết với chủ nuôi (User)
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getPublicUrlAttribute()
    {
        return route('pets.public', $this->public_id);
    }
}
