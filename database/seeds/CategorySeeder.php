<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Film', 'Serie TV', 'Food', 'Moda', 'Digitale', 'Sport'];

        foreach($categories as $name) {
            $category = new Category();
            $category->name = $name;
            $category->slug = str_replace(' ', '-', $category->name);
            $category->save();
        }
    }
}
