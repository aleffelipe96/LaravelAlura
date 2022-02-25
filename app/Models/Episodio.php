<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $table = 'episodios';

    protected $fillable = ['numero_episodio'];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
