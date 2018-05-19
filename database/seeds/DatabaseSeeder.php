<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Model::unguard();

       
        DB::table('user')->insert([
            'username' => 'hitesh',
            'email' => 'hiteshrane@gmail.com',
            'password' => bcrypt('hitesh123'),
        ]);

       // Model::reguard();
    }
}
