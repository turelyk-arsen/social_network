<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $comments = [
        //     [
        //         'content' => 'Це перший коментар',
        //         'user_id' => 1,
        //         'post_id' => 1,
        //     ],
        //     [
        //         'content' => 'Це другий коментар',
        //         'user_id' => 2,
        //         'post_id' => 1,
        //     ],
        //     [
        //         'content' => 'Це третій коментар',
        //         'user_id' => 1,
        //         'post_id' => 2,
        //     ],
        // ];
        $comments = [];

        $users = User::inRandomOrder()->limit(7)->get();
        $posts = Post::inRandomOrder()->limit(10)->get();

        foreach ($posts as $post) {
            foreach ($users as $user) {
                $comments[] = [
                    'content' => "This is a comment from user #$user->id for this perfect post",
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ];
            }
        }

        DB::table('comments')->insert($comments);
        // DB::table('comments')->truncate();
    }
}
