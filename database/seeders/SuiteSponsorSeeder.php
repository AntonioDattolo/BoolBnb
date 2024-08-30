<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuiteSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->suite_id = 1;
        // $table->sponsor_id = 1;
        // $table->save();

        $sql = 'insert into suite_sponsor ( suite_id , sponsor_id  ) values (?, ?)';
        $suite = 1;
        $sponsor = 1;
        DB::insert($sql, [
            $suite,
            $sponsor,
        ]);
        
        
        // $table->string('sponsor_name');
        // $table->decimal('sponsor_price');
        // $table->dateTime('sponsor_start');
        // $table->dateTime('sponsor_end');
        // $table->timestamps();
    }
}
