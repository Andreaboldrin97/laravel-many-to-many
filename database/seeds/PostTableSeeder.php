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
        $myUserId = User::WHERE('email', 'root@gmail.com')->get();

        $newMyPost = new Post();
        $newMyPost->category_id = $faker->randomElement($category)->id;
        $newMyPost->user_id = $myUserId->id;
        $newMyPost->title = 'My Tutor';
        $newMyPost->description = 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nunc augue, vehicula non tincidunt nec, pretium at tellus. Nam posuere nulla erat, ut tincidunt mauris scelerisque nec. Vestibulum porttitor dui vitae quam volutpat porta. Curabitur non elit diam. Donec non orci quam. Fusce in volutpat lectus. Aenean eget ante lacus.';
        $newMyPost->image_url = 'https://ca.slack-edge.com/T91QPE3BP-U02HYRKL8E5-ca77aa4493a4-72';
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
