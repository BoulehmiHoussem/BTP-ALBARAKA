<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
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
            DB::table('products')->insert([
            'name' => $this->faker->name,
            'reference' => Str::random(10).'U',
            'quantity' => 10*$i,
            'price' => 12*$i,
            'fournisseur' => $this->faker->name,
            ]);
        }
        
    }
}
