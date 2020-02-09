<?php

use Illuminate\Database\Seeder;

/**
 * Class CategoriesTableSeeder
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'slug' => 'auto',
                'en'=>[ 'type' => 'Automobile'],
                'ru'=>[ 'type' => 'Авто'],
            ],
            [
                'en'=>[ 'type' => 'Rentails'],
                'ru'=>[ 'type' => 'Недвижимость'],
                'slug' => 'rent'
            ],
            [
                'en'=>[ 'type' => 'Service'],
                'ru'=>[ 'type' => 'Услуги'],
                'slug' => 'service'
            ],
            [
                'en'=>[ 'type' => 'Jobs',],
                'ru'=>[ 'type' => 'Работа'],
                'slug' => 'job'
            ],

        ];

        foreach($categories as $category){
            \App\Category::create($category);
        }

    }
}
