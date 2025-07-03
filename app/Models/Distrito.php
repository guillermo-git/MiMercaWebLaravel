<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
  protected $guarded=[];
    public $timestamps=false;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function mercados()
    {
        return $this->hasMany(Mercado::class);
    }
}
