<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<100 ; $i++)
        {
            DB::table('locations')->insert([
            'name' => 'Voiture '.$i,
            'comment' => Str::random(255),
            'created_by' => 1,
            ]);
        }
    }
}
