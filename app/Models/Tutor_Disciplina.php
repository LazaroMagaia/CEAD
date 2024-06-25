<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_Disciplina extends Model
{
    use HasFactory;
    protected $fillable = ['disciplina_id', 'tutor_id','faculdade_id','curso_id'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
