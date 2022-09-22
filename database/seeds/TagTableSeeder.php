<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsName = ['#BOOLEAN', '#INSTAFOOD', '#MICCOFANS', '#FOLLOWFORFOLLOW', '#LAZZA', '#POYO', '#INSTAPIC', '#REBIX', '#LIKEFORLIKE', '#LATTESANO'];

        foreach ($tagsName as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
