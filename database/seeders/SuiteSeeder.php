<?php

namespace Database\Seeders;

use App\Models\apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {for ($i=0; $i <= 1 ; $i++) { 
        $newHome = new apartment();
        $newHome->title = "casa fittizzia";
        $newHome->room = 2;
        $newHome->bed = 3;
        $newHome->bathroom = 1;
        $newHome->squareM = 40;
        $newHome->address = "fa-solid fa-laptop-code agnengengengengnengeg";
        $newHome->img = "Front-end web development is the development of the graphical user interface of a website through the use of HTML, CSS, and JavaScript so users can view and interact with that website.";
        $newHome->visible = true;
        $newHome->sponsor_id = 1;
        $newHome->visuals = 12;
        $newHome->user_id = 2;
        $newHome->save();
        # code...
    } 
        
    }
}
