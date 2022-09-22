<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($posts as $post) {
            $randomTags = $faker->randomElements($tags, 3, false);
            foreach ($randomTags as $tag) {
                $post->tags()->attach($tag->id);
            }
        }
    }
}
