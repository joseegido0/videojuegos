<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido'];
    protected $table = 'desarrolladores';

    public function videojuegos()
    {
        return $this->hasOne(Videojuego::class);
    }
}
