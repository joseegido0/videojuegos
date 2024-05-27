<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos'];

    public function videojuegos()
    {
        return $this->hasOne(Videojuego::class);
    }
}
