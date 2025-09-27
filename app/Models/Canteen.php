<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Canteen extends Model
{
    use HasFactory;

    // Mass Assignment 保護を無効化 (開発を簡易にするため。本番では必要なフィールドのみ設定推奨)
    protected $guarded = [];

    /**
     * この食堂が持つメニューを取得
     */
    public function menus(): HasMany
    {
        // 1つのCanteenは、複数のMenuを持つ
        return $this->hasMany(Menu::class);
    }
}
