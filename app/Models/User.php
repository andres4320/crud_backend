<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'gender_id',
        'profession_id',
        'municipality_id'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}