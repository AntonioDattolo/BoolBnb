<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suite;

class SuiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newSuite = new Suite();
        $newSuite->title = "Appartamento fittizio" ;
        $newSuite->room = 2;
        $newSuite->bed = 2;
        $newSuite->bathroom = 1;
        $newSuite->squareM = 40 ;
        $newSuite->address ="Via del porco sul tavolo, 17" ;
        $newSuite->longitude = ;
        $newSuite->latitude = ;
        $newSuite->img ="alahahahahahahahaha" ;
        $newSuite->visible = true ;
        $newSuite->sponsor_id = true;
        $newSuite->tot_visuals = 20 ;
        $newSuite->user_id = 1 ;
        $newSuite->save()

    }
}
