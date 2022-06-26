<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FilmPlanet extends Pivot
{
    protected $table = 'films_planets';

    public $timestamps = false;
}
