<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['frontend','backend','ux','design patters'];
        foreach($tags as $tag){
            $newTag= new Tag();
            $newTag->name=$tag;
            $newTag->slug=Str::of($newTag->name)->slug('-');
            $newTag->save();
        }
    }
}
