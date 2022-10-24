<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Carne', 'Pesce', 'Legno', 'Vetro', 'Vegano', 'Senza Lattosio', 'Sicurezza', 'Audio'];
        
        foreach($tags as $name) {
            $tag = new Tag();

            $tag->name = $name;
            $tag->slug = Str::slug($name);

            $tag->save();
        }
    }
}
