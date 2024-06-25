<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = ['nivel_academico','especialidade','contacto','certificado','user_id','primeira_senha'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
