<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('11111111'),
            ],
            [
                'name' => 'moderator',
                'email' => 'moderator@example.com',
                'role' => 'moderator',
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Arsen',
                'email' => 'arsen@example.com',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Vika',
                'email' => 'vika@example.com',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@example.com',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            
        ]);
    }
    }

