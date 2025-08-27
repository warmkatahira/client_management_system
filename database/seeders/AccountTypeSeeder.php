<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountType::create([
            'account_type_name'         => '売掛',
            'sort_order'                => 1,
        ]);
        AccountType::create([
            'account_type_name'         => '買掛',
            'sort_order'                => 2,
        ]);
        AccountType::create([
            'account_type_name'         => '売掛/買掛',
            'sort_order'                => 3,
        ]);
    }
}
