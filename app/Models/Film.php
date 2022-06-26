<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    //protected $fillable = ['title'];

    public function peoples()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
                People::class,
                'films_peoples',
                'film_id',
                'people_id');
    }

    public function planets()
    {
        return $this->belongsToMany(
                Planet::class,
                'films_planets',
                'film_id',
                'planet_id');
    }
}
