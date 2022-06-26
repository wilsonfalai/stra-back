<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FilmPeople extends Pivot
{
    //
    protected $table = 'films_peoples';

    public $timestamps = false;
}
