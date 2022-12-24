<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(50)->create()->each(function (Post $post) {
            $categories = Category::inRandomOrder()->limit(random_int(1, 4))->get()->pluck('id')->toArray();
            $tags = Tag::inRandomOrder()->limit(random_int(1, 4))->get()->pluck('id')->toArray();
            $post->categories()->sync($categories);
            $post->tags()->sync($tags);
            $faker = Factory::create();
            $post->image()->create([
                'url' => $faker->imageUrl(),
                'type' => 'lg',
            ]);
        });
    }
}
