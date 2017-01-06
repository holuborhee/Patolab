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
        //
        for($i = 1; $i<=10; $i++){
        DB::table('users')->insert([
            'name' => str_random(15),
            'email' => str_random(10).'@gmail.com',
            'phone' => str_random(11),
            'type' => 1,
            'password' => bcrypt('secret'),
        ]);
    	}
    }
}
