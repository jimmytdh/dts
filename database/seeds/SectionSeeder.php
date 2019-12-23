<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([
            'id' => '1',
            'division' => '1',
            'description' => 'iHOMP',
            'head' => '271',
            'code' => 'A'
        ]);
    }
}
