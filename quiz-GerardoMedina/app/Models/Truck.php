<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    public function vacas() { //Un lead solo tiene un usuario
        return $this->hasMany(Vaca::class, 'id');
    }
}
