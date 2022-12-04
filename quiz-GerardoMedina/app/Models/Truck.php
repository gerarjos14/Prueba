<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Truck extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trucks';

    protected $primary = 'id';

    protected $fillable = [
        'name',
        'support_kg',
    ];

    public function vacas() { 
        return $this->hasMany(Vaca::class, 'id');
    }
}
