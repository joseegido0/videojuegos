<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'fecha_lanzamiento', 'desarrollador_id'];

    public function desarrollador()
    {
        return $this->belongsTo(Desarrollador::class);
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class, 'etiqueta_videojuego');
    }
}
