<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaDocument extends Model
{
    use HasFactory;
    protected $fillable = ['agenda_id', 'file_path'];
    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
