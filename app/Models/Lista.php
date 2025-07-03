<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
   
    protected $guarded=[];
    public $timestamps=false;
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function detalleCotizaciones()
    {
        return $this->hasMany(ListasDetalles::class);
    }
}
