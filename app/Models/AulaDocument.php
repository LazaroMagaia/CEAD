<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AulaDocument extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'file_path'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
