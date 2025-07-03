<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
     protected $guarded=[];
    public $timestamps=false;
    public function mercado()
    {
        return $this->belongsTo(Mercado::class);
    }

    public function responsable()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function detalleProductos()
    {
        return $this->hasMany(DetalleProducto::class);
    }
}
