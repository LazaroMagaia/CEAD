<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;
    protected $fillable = ['cursos_id', 'contacto', 'user_id','primeira_senha'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cursos()
    {
        return $this->belongsToOne(Curso::class);
    }
    
}
