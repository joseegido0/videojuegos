<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
    protected $table = 'etiquetas';

    public function videojuegos()
    {
        return $this->belongsToMany(Videojuego::class, 'etiqueta_videojuego');
    }
}
