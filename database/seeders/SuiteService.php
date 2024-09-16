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
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 1 == 0) {
                $service = 1;

                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 1 == 0 && $i % 7 == 0) {
                $service = 5;

                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 2 == 0) {
                $service = 2;

                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            };
        }
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 3 == 0) {
                $service = 3;
                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 5 == 0) {
                $service = 5;
                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 4 == 0) {
                $service = 4;

                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $suite = $i;

            if ($i % 6 == 0) {
                $service = 6;

                DB::insert($sql, [
                    $suite,
                    $service,
                ]);
            }
        };
    }
}
