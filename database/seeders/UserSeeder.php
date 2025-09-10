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
            'is_active' => 1,
            'role_id' => 'system_admin',
            'profile_image_file_name' => 'katahira.png',
            'must_change_password' => 0,
        ]);
        User::create([
            'user_id' => 'user',
            'last_name' => 'テストユーザー',
            'first_name' => '',
            'email' => 'test@warm.co.jp',
            'password' => bcrypt('user1111'),
            'is_active' => 1,
            'role_id' => 'admin',
            'must_change_password' => 0,
        ]);
    }
}