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
        $newVisual->suite_id = 'Visual 1';
        $newVisual->ip_address = 'This address of a visual 1';
        $newVisual->date = '30/08/2024';
        $newVisual->save();
    }
}
