<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\CompanyType;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyType::create([
            'company_type_name'         => '株式会社',
            'company_type_short_name'   => '前株',
            'position'                  => 'front',
            'sort_order'                => 1,
        ]);
        CompanyType::create([
            'company_type_name'         => '株式会社',
            'company_type_short_name'   => '後株',
            'position'                  => 'back',
            'sort_order'                => 1,
        ]);
        CompanyType::create([
            'company_type_name'         => '有限会社',
            'company_type_short_name'   => '前有',
            'position'                  => 'front',
            'sort_order'                => 1,
        ]);
        CompanyType::create([
            'company_type_name'         => '有限会社',
            'company_type_short_name'   => '後有',
            'position'                  => 'back',
            'sort_order'                => 1,
        ]);
    }
}
