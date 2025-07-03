<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
     protected $guarded=[];
    public $timestamps=false;
    public function detalleProductos()
    {
        return $this->hasMany(DetalleProducto::class);
    }
}
