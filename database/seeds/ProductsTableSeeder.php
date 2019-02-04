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
                'weekdaysValue' => 9500,
                'productCategogy_id' => 1],
            ['title' => 'Сертификат на прыжок с парашютом в тандеме со съемкой с руки инструктора',
                'value' => 9500,
                'weekdaysValue' => 8000,
                'productCategogy_id' => 1],
            ['title' => 'Сертификат на прыжок с парашютом в тандеме со съемкой оператором',
                'value' => 13500,
                'weekdaysValue' => 12500,
                'productCategogy_id' => 1],
            ['title' => 'Прыжок с парашютом в тандеме',
                'value' => 10000,
                'weekdaysValue' => 9000,
                'productCategogy_id' => 2],
            ['title' => 'Прыжок с парашютом в тандеме со съемкой с руки инструктора',
                'value' => 13000,
                'weekdaysValue' => 8000,
                'productCategogy_id' => 2],
            ['title' => 'Прыжок с парашютом в тандеме со съемкой оператором',
                'value' => 10500,
                'weekdaysValue' => 9500,
                'productCategogy_id' => 2],
        ]);
    }
}
