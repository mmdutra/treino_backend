<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products')->insert([
            'name'     => 'Teste',
            'value'    => 1000,
            'quantity' => 10,
        ]);
    }
}
