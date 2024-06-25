<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculdade extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'localizacao'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
