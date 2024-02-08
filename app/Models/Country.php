<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $fillable = [
        'name'
    ];

    public function departament(): HasMany{
        return $this->hasMany(Departament::class);
    }

}
