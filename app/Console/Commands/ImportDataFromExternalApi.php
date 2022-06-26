<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Film;
use App\Models\FilmPeople;
use App\Models\People;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Throwable;

class ImportDataFromExternalApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:film-import {film_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa para banco local dados vindo da api externa';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filmId = $this->argument('film_id');

        try {
            DB::beginTransaction();

            //Save Film
            $response = Http::get("https://swapi.dev/api/films/{$filmId}");

            $filmSearch = Film::where('title', $response['title'])->first();

            //$this->info($filmSearch);
            //dd();

            if(!$filmSearch){
                $film= new Film();
                $film->title = $response['title'];
                $film->director = $response['director'];
                $film->save();
                //dd();

                foreach($response['characters'] as $r){

                    //Save People
                    $response = Http::get($r);
                    $people = People::where('name', $response['name'])->first();

                    if(!$people){
                        $people = new People();
                        $people->name = $response['name'];
                        $people->gender = $response['gender'];
                        $people->save();
                    }

                    //Save Film has People - Pivot
                    $filmPeople= new FilmPeople();
                    $filmPeople->people_id = $people->id;
                    $filmPeople->film_id = $film->id;
                    $filmPeople->save();

                }

                DB::commit();
                $this->info('The command was successful!');
            } else {
                throw new Exception('Filme já existe');
            }



        } catch (Throwable $e) {
            DB::rollback();
            $this->info($e->getMessage());
            //$this->info('The command was successful!');
        }

    }
}
