<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'service_name'       => '保管',
            'sort_order'         => 1,
        ]);
        Service::create([
            'service_name'       => '入出庫',
            'sort_order'         => 2,
        ]);
        Service::create([
            'service_name'       => '荷役',
            'sort_order'         => 3,
        ]);
        Service::create([
            'service_name'       => 'システム',
            'sort_order'         => 4,
        ]);
        Service::create([
            'service_name'       => '地代家賃',
            'sort_order'         => 5,
        ]);
    }
}
