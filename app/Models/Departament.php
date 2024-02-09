<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departaments';
    protected $fillable = [
        'name', 'country_id'
    ];

    public function municipality()
    {
        return $this->hasMany(Municipality::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
