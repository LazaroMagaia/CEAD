<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'disciplina_id',
        'tutor_id',
        'data_hora',
        'assunto',
        'documentos',
        'informacoes_adicionais',
    ];
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
    public function documents()
    {
        return $this->hasMany(AgendaDocument::class);
    }
}
