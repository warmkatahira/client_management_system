<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            BaseSeeder::class,
            UserSeeder::class,
            IndustrySeeder::class,
            CompanyTypeSeeder::class,
            AccountTypeSeeder::class,
            RegionSeeder::class,
            PrefectureSeeder::class,
            ClientItemSeeder::class,
            ClientServiceSeeder::class,
            ClientSeeder::class,
            SalesRankSeeder::class,
            BaseClientSeeder::class,
            BaseClientSalesSeeder::class,
            ClientClientItemSeeder::class,
            ClientClientServiceSeeder::class,
        ]);
    }
}
