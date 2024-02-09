<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipality';
    protected $fillable = [
        'name', 'departaments_id'
    ];

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}
