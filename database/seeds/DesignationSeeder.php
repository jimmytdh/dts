<?php

use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designation')->insert([
            'id' => '1',
            'description' => 'CMT II'
        ]);
    }
}
