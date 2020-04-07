<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name'     => 'Teste',
            'email'    => 'jewel57@hotmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
        ]);
    }
}
