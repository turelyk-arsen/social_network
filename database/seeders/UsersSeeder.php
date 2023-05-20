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
                'photo' => 'photos/5MNAF4d5Qnfa1PPF15f1kYwAbxQNvm1jCNEGit7x.jpg',
                'role' => 'admin',
                'password' => Hash::make('11111111'),
            ],
            [
                'name' => 'moderator',
                'email' => 'moderator@example.com',
                'photo' => 'photos/qdCoYaxzZjXqqvWtQECInA6DARx9e7nRlweK3CFy.jpg',
                'role' => 'moderator',
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'photo' => 'photos/eZMrXExo1NZUCFPAExuwQjY1QMPNnfVmYXOs7Pkp.jpg',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'photo' => 'photos/x7fyd7eufLRpuRUBRy33g2ywME2J8xIr8pAfLyzb.jpg',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Arsen',
                'email' => 'arsen@example.com',
                'photo' => 'photos/apAoko8mmtWdJdxKDATSAGMktSWHQolAvyAzYEx0.jpg',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Vika',
                'email' => 'vika@example.com',
                'photo' => '',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@example.com',
                'photo' => '',
                'role' => 'user',
                'password' => Hash::make('asdfasdf'),
            ],
            
        ]);
    }
    }