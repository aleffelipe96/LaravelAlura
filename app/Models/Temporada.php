<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Temporada extends Model
{
    protected $table = 'temporadas';

    protected $fillable = ['numero_temporada'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function episodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function (Episodio $episodio) {
            return $episodio->assistido;
        });
    }
}
