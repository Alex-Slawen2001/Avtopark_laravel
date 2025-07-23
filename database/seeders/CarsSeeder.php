<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
           ['model'=>'Toyota',
           'make_year'=>'2020',],
            ['model'=>'BMV',
                'make_year'=>'2021',],
            ['model'=>'Honda',
                'make_year'=>'2019',]
        ]);

    }
}
