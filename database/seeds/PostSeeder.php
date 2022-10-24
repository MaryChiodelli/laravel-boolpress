<?php

use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryIds = Category::all()->pluck('id');
        $tags = Tag::all()->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->title = $faker->words(rand(5, 10), true);
            $post->content = $faker->paragraphs(rand(10, 20), true);
            $post->slug = Str::slug($post->title);
            $post->category_id = $faker->optional()->randomElement($categoryIds);
            
            $post->save();

            $tagIds = $faker->optional()->randomElements($tags, 3);
            $post->tags()->sync($tagIds);
        }
    }
}
