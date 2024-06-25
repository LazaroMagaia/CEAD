<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'faculdades_id','duracao'];
    public function faculdade()
    {
        return $this->belongsTo(Faculdade::class);
    }
    public function estudantes()
    {
        return $this->belongsToMany(Estudante::class);
    }
    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class);
    }
}
