<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarOwner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car_owner')->insert([
           ['user_id'=> 1,
               'car_id'=>'1'],['user_id'=> 2,
                'car_id'=>'2'],['user_id'=> 1,
                'car_id'=>'3']

        ]);
    }
}
