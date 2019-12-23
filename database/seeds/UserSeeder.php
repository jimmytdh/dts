<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'fname' => 'Jimmy',
            'mname' => 'B.',
            'lname' => 'Parker',
            'username' => 'admin',
            'designation' => '1',
            'division' => '1',
            'section' => '1',
            'password' => bcrypt('admin'),
            'user_priv' => 1
        ]);
    }
}
