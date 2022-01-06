<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChantierSeeder extends Seeder
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
            DB::table('chantiers')->insert([
            'nom' => 'chantier '.$i,
            'adresse' => Str::random(3).$i. 'rue '.$i,
            'comment' => Str::random(255),
            'chef_id' => 1,
            'created_by' => 1,
            ]);
        }
    }
}
