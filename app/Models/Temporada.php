<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
