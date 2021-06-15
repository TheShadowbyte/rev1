<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

        User::truncate();
        Category::truncate();
        Post::truncate();

         $user = User::factory()->create();

         $sports = Category::create([
             'name' => 'Sports',
             'slug' => 'sports'
         ]);

        $movies = Category::create([
            'name' => 'Movies',
            'slug' => 'movies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $sports->id,
            'title' => 'Raptors',
            'slug' => 'raptors',
            'excerpt' => 'blah',
            'body' => 'Lorem ipsum'
        ]);

    }
}
