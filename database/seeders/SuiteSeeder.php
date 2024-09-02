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
    for ($i=0; $i < 50 ; $i++) { 
        # code...
        $newSuite = new Suite();
        $newSuite->title = "Appartamento fittizio";
        $newSuite->room = 2;
        $newSuite->bed = 2;
        $newSuite->bathroom = 1;
        $newSuite->squareM = 40;
        $newSuite->address = "Via del porco sul tavolo, 17";
        $newSuite->longitude = 12.4922260;
        $newSuite->latitude =  41.8902300;
        $newSuite->img = "https://fastly.picsum.photos/id/57/2448/3264.jpg?hmac=ewraXYesC6HuSEAJsg3Q80bXd1GyJTxekI05Xt9YjfQ";
        $newSuite->visible = true;
        $newSuite->sponsor = true;
        $newSuite->tot_visuals = 20;
        $newSuite->user_id = 1;
        $newSuite->save();
    }
    }
}
