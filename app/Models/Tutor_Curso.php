<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_Curso extends Model
{
    use HasFactory;
    protected $fillable = ['curso_id', 'tutor_id','faculdade_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    
}
