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
        DB::table('products')->insert([
            ['title' => 'Сертификат на прыжок с парашютом в тандеме',
                'value' => 10500,
                'weekdaysValue' => 9500],
            ['title' => 'Сертификат на прыжок с парашютом в тандеме со съемкой с руки инструктора',
                'value' => 9500,
                'weekdaysValue' => 8000],
            ['title' => 'Сертификат на прыжок с парашютом в тандеме со съемкой оператором',
                'value' => 13500,
                'weekdaysValue' => 12500],
            ['title' => 'Прыжок с парашютом в тандеме',
                'value' => 10000,
                'weekdaysValue' => 9000],
            ['title' => 'Прыжок с парашютом в тандеме со съемкой с руки инструктора',
                'value' => 13000,
                'weekdaysValue' => 8000],
            ['title' => 'Прыжок с парашютом в тандеме со съемкой оператором',
                'value' => 10500,
                'weekdaysValue' => 9500],
        ]);
    }
}
