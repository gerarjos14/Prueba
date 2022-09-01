<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaca extends Model
{
    use HasFactory;

    protected $table = 'vacas';

    # Clave primaria
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'truck_id',
    ];

    public function truck() { //Un lead solo tiene un usuario
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }
}
