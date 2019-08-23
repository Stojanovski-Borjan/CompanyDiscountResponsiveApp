<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(array(
            array(
                'id' => '1',
                'title' => 'Производи',
            ),            array(
                'id' => '2',
                'title' => 'Услуги',
            ),            array(
                'id' => '3',
                'title' => 'Ресторани',
            ),            array(
                'id' => '4',
                'title' => 'Фитнес Центри',
            ),            array(
                'id' => '5',
                'title' => 'Едукација',
            ),            array(
                'id' => '6',
                'title' => 'Кариера',
            ),
        ));
    }
}
