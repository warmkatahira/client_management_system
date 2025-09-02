<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientClientItem;

class ClientClientItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientClientItem::create([
            'client_id'         => 1,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 2,
            'client_item_id'    => 2,
        ]);
        ClientClientItem::create([
            'client_id'         => 3,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 4,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 4,
            'client_item_id'    => 5,
        ]);
        ClientClientItem::create([
            'client_id'         => 5,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 6,
            'client_item_id'    => 4,
        ]);
        ClientClientItem::create([
            'client_id'         => 7,
            'client_item_id'    => 5,
        ]);
        ClientClientItem::create([
            'client_id'         => 8,
            'client_item_id'    => 6,
        ]);
        ClientClientItem::create([
            'client_id'         => 9,
            'client_item_id'    => 3,
        ]);
        ClientClientItem::create([
            'client_id'         => 10,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 10,
            'client_item_id'    => 3,
        ]);
        ClientClientItem::create([
            'client_id'         => 11,
            'client_item_id'    => 3,
        ]);
        ClientClientItem::create([
            'client_id'         => 12,
            'client_item_id'    => 1,
        ]);
        ClientClientItem::create([
            'client_id'         => 13,
            'client_item_id'    => 4,
        ]);
    }
}
