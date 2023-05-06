<?php

namespace Database\Seeders;

use App\Models\Posts;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts  = [
            ['title' => 'Hello World', 'description' => 'hi'],
            ['title' => 'Hello World', 'description' => 'hi'],
            ['title' => 'hello-world', 'description' => 'hi'],
        ];

        foreach ($posts as $post) {
            Posts::create($post);
        }
    }
}
