<?php

use App\Models\tag;
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
            $newTag = new tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
