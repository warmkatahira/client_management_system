<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 'katahira',
            'last_name' => 'システム管理者',
            'first_name' => '',
            'email' => 't.katahira@warm.co.jp',
            'password' => bcrypt('katahira134'),
            'status' => 1,
            'role_id' => 'system_admin',
        ]);
        User::create([
            'user_id' => 'user',
            'last_name' => 'テストユーザー',
            'first_name' => '',
            'email' => 'test@warm.co.jp',
            'password' => bcrypt('user1111'),
            'status' => 1,
            'role_id' => 'admin',
        ]);
    }
}