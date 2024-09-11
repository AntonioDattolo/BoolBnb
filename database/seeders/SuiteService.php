<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SuiteService extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 65 ; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $faker->numberBetween(1,64);
            $tech= $faker->numberBetween(1,2);
            
            DB::insert($sql, [
                $project,
                $tech,
            ]);
        }
        for ($i=0; $i < 65 ; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $faker->numberBetween(1,64);
            $tech= $faker->numberBetween(3,4);
            
            DB::insert($sql, [
                $project,
                $tech,
            ]);
        }
        for ($i=0; $i < 65 ; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $faker->numberBetween(1,64);
            $tech= $faker->numberBetween(5,6);
            
            DB::insert($sql, [
                $project,
                $tech,
            ]);
        }
    }
}
