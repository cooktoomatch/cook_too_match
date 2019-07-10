<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Cook_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'name' => ['和食', '洋食', '中華料理', 'インド料理', 'タイ料理', '韓国料理', 'スペイン料理', '寿司', '海鮮料理', '蕎麦', 'うどん', 'うなぎ', '焼き鳥', 'とんかつ', '串揚げ', '天ぷら', 'お好み焼き', 'もんじゃ焼き', '沖縄料理', 'フレンチ', 'イタリアン', 'パスタ', 'ピザ', 'ステーキ', 'ハンバーグ', 'ハンバーガー', 'ラーメン', 'カレー', '焼肉', '鍋', 'パン', 'スイーツ'],
        ];

        for ($i = 0; $i < count($datas["name"]); $i++) {
            DB::table("cook_categories")->insert([
                "name" => $datas["name"][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
