<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante_turma extends Model
{
    use HasFactory;
    protected $fillable=["estudante_id","turma_id"];

    public function estudante(){
        return $this->belongsTo(Estudante::class);
    }
    public function turma(){
        return $this->belongsTo(Turma::class);
    }
    
}
 