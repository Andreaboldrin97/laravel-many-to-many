<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            CategoryTableSeed::class,
            PostTableSeeder::class,
            TagTableSeeder::class,
            PostTagTableSeeder::class
        ]);
    }
}
