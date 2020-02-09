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
                'type' => 'Авто',
                'slug' => 'auto'
            ],
            [
                'type' => 'Недвижимость',
                'slug' => 'rent'
            ],
            [
                'type' => 'Услуги',
                'slug' => 'service'
            ],
            [
                'type' => 'Работа',
                'slug' => 'job'
            ],

        ];

        foreach($categories as $category){
            \App\Category::firstOrCreate($category);
        }

    }
}
