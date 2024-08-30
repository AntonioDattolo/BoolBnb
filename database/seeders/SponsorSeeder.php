<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newSponsor = new Sponsor();
        $newSponsor->name = "Sponsor Gold";
        $newSponsor->period = "24:00:00";
        $newSponsor->price = 9.99;
        $newSponsor->save();
    }
}
