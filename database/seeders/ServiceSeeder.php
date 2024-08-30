<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newService = new Service();
        $newService->name = "Service 1";
        $newService->icon = "icon 1";
        $newService->description = "This is service 1";
        $newService->save();
    }
}
