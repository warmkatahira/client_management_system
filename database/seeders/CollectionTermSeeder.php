<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\CollectionTerm;

class CollectionTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollectionTerm::create([
            'collection_term'   => 25,
            'sort_order'        => 1,
        ]);
        CollectionTerm::create([
            'collection_term'   => 30,
            'sort_order'        => 2,
        ]);
        CollectionTerm::create([
            'collection_term'   => 35,
            'sort_order'        => 3,
        ]);
        CollectionTerm::create([
            'collection_term'   => 40,
            'sort_order'        => 4,
        ]);
    }
}
