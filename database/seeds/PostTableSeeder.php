<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->words(3,true);
            
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->content = $faker->text(500);
            $newPost->save();
        }
    }
}
