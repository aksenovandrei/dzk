<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            ['address' => 'online'],
            ['address' => 'м. Новоясеневская'],
            ['address' => 'м. Охотный ряд']
        ]);
    }
}
