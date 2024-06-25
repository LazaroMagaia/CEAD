<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = [
        'disciplina_id',
        'curso_id',
        'tutor_id',
        'titulo',
        'descricao',
        'link',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function documents()
    {
        return $this->hasMany(AulaDocument::class);
    }
}
