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
            ItemCategorySeeder::class,
            ItemSubCategorySeeder::class,
            ServiceSeeder::class,
            CollectionTermSeeder::class,
            ClientSeeder::class,
            SalesRankSeeder::class,
            BaseClientSalesSeeder::class,
            BaseClientServiceSeeder::class,
        ]);
    }
}
