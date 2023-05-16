<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Post 1',
                'content' => 'This is content your 1 post',
                'image' => '/images/11.jpg',
                'user_id' => '1',
            ],
            [
                'title' => 'Post 2',
                'content' => 'This is content your 2 post',
                'image' => '/images/12.jpg',
                'user_id' => '1',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}