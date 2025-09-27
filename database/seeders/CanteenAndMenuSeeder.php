<?php

namespace Database\Seeders;

use App\Models\Canteen;
use Illuminate\Database\Seeder;

class CanteenAndMenuSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 食堂データの作成 (例: 九州大学 伊都キャンパス)
        $centerCanteen = Canteen::create([
            'name' => 'センターゾーン食堂',
            'description' => '伊都キャンパス最大の食堂。定番メニューが豊富。',
            'location' => 'センターゾーン 2F',
            'opening_time' => '11:00:00',
            'closing_time' => '20:00:00',
        ]);

        $eastCanteen = Canteen::create([
            'name' => 'イーストゾーン食堂',
            'description' => '健康志向のメニューが多い食堂。',
            'location' => 'イーストゾーン 1F',
            'opening_time' => '11:30:00',
            'closing_time' => '19:30:00',
        ]);

        // 2. メニューデータの作成 (センターゾーン食堂)
        $centerCanteen->menus()->createMany([
            [
                'name' => '九大定食A',
                'price' => 580,
                'category' => '定食',
                'calories' => 750,
                'is_daily_special' => true, // 日替わりとして設定
            ],
            [
                'name' => '特製カツ丼',
                'price' => 650,
                'category' => '丼',
                'calories' => 890,
                'allergens' => '卵, 小麦',
            ],
        ]);

        // 3. メニューデータの作成 (イーストゾーン食堂)
        $eastCanteen->menus()->create([
            'name' => '野菜たっぷりヘルシー麺',
            'price' => 480,
            'category' => '麺類',
            'calories' => 420,
        ]);
    }
}