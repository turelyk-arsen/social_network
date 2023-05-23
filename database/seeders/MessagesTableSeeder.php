<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::find(1);
        $user2 = User::find(2);

        $user2 = User::find(2);
        $user3 = User::find(3);

        $user3 = User::find(3);
        $user4 = User::find(4);

        $user4 = User::find(4);
        $user5 = User::find(5);

        $user5 = User::find(5);
        $user6 = User::find(6);

        $user6 = User::find(6);
        $user7 = User::find(7);

        $messages = [
            [
                'from_user_id' => $user1->id,
                'to_user_id' => $user2->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user2->id,
                'to_user_id' => $user1->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user1->id,
                'to_user_id' => $user2->id,
                'content' => 'I am doing great, thanks!',
            ],

            [
                'from_user_id' => $user2->id,
                'to_user_id' => $user3->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user3->id,
                'to_user_id' => $user2->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user2->id,
                'to_user_id' => $user3->id,
                'content' => 'I am doing great, thanks!',
            ],

            [
                'from_user_id' => $user3->id,
                'to_user_id' => $user4->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user4->id,
                'to_user_id' => $user3->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user3->id,
                'to_user_id' => $user4->id,
                'content' => 'I am doing great, thanks!',
            ],

            [
                'from_user_id' => $user4->id,
                'to_user_id' => $user5->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user5->id,
                'to_user_id' => $user4->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user4->id,
                'to_user_id' => $user5->id,
                'content' => 'I am doing great, thanks!',
            ],

            [
                'from_user_id' => $user5->id,
                'to_user_id' => $user6->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user6->id,
                'to_user_id' => $user5->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user5->id,
                'to_user_id' => $user6->id,
                'content' => 'I am doing great, thanks!',
            ],

            [
                'from_user_id' => $user6->id,
                'to_user_id' => $user7->id,
                'content' => 'Hello! How are you?',
            ],
            [
                'from_user_id' => $user7->id,
                'to_user_id' => $user6->id,
                'content' => 'Hi! I am good. How about you?',
            ],
            [
                'from_user_id' => $user6->id,
                'to_user_id' => $user7->id,
                'content' => 'I am doing great, thanks!',
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }

        // DB::table('messages')->truncate();

    }
}

 // php artisan db:seed --class=MessagesTableSeeder
