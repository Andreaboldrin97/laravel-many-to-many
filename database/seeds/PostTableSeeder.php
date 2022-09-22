<?php

use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::all();
        $category = Category::all();
        $myUser = User::WHERE('email', 'root@gmail.com')->first();


        $newMyPost = new Post();
        $newMyPost->category_id = $faker->randomElement($category)->id;
        $newMyPost->user_id = $myUser->id;
        $newMyPost->title = 'My Tutor';
        $newMyPost->description = 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nunc augue, vehicula non tincidunt nec, pretium at tellus. Nam posuere nulla erat, ut tincidunt mauris scelerisque nec. Vestibulum porttitor dui vitae quam volutpat porta. Curabitur non elit diam. Donec non orci quam. Fusce in volutpat lectus. Aenean eget ante lacus.';
        $newMyPost->image_url = 'https://ca.slack-edge.com/T91QPE3BP-U02HYRKL8E5-ca77aa4493a4-72';
        $newMyPost->sale_date  = '2022-07-22 08:00:00';
        $newMyPost->save();

        $newMyPost = new Post();
        $newMyPost->category_id = $faker->randomElement($category)->id;
        $newMyPost->user_id = $myUser->id;
        $newMyPost->title = 'My Tutor 2';
        $newMyPost->description = 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nunc augue, vehicula non tincidunt nec, pretium at tellus. Nam posuere nulla erat, ut tincidunt mauris scelerisque nec. Vestibulum porttitor dui vitae quam volutpat porta. Curabitur non elit diam. Donec non orci quam. Fusce in volutpat lectus. Aenean eget ante lacus.';
        $newMyPost->image_url = 'data:image/jpeg;base64,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';
        $newMyPost->sale_date  = '2022-07-22 08:00:00';
        $newMyPost->save();


        for ($i = 1; $i <= 20; $i++) {
            $newPost = new Post();
            $newPost->category_id = $faker->randomElement($category)->id;
            $newPost->user_id = $faker->randomElement($user)->id;
            $newPost->title = $faker->realText(35);
            $newPost->description = $faker->paragraph(3, true);
            $newPost->image_url = $faker->imageUrl(350, 350, 'post');
            $newPost->sale_date = $faker->dateTimeThisYear();
            $newPost->save();
        }
    }
}
