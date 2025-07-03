<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDetalle extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;

    public function cotizacion()
    {
        return $this->belongsTo(Lista::class);
    }

    public function detalleProducto()
    {
        return $this->belongsTo(DetalleProducto::class);
    }
}
