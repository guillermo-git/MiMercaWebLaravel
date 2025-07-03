<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercado extends Model
{
    use HasFactory;
  protected $guarded=[];
    public $timestamps=false;
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function tiendas()
    {
        return $this->hasMany(Tienda::class);
    }
}
