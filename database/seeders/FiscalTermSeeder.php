<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\FiscalTerm;
// その他
use Carbon\CarbonImmutable;

class FiscalTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1期の開始年
        $first_term_start_year = 2004;
        // 22期分作成
        for($i = 1; $i <= 22; $i++){
            // 追加する情報を取得
            $term_number = $i;
            $start_year  = $first_term_start_year + ($i - 1);
            $end_year    = $start_year + 1;
            $term_start = $start_year . '-10';
            $term_end   = $end_year . '-09';
            // レコードを追加
            FiscalTerm::create([
                'term_number' => $term_number,
                'term_start'  => $term_start,
                'term_end'    => $term_end,
            ]);
        }
    }
}
