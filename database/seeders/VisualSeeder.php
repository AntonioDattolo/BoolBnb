<?php

namespace Database\Seeders;

use App\Models\Visual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newVisual = new Visual();
        $newVisual->suite_id =  1;
        $newVisual->ip_address = 'This address of a visual 1';
        $newVisual->date = '2024/08/30';
        $newVisual->save();
    }
}
