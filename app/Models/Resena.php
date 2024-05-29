<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $fillable = ['videojuego_id', 'usuario', 'contenido', 'puntuacion'];
    protected $table = 'resenas';

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }
}
