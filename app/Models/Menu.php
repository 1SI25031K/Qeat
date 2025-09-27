<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    // Mass Assignment 保護を無効化
    protected $guarded = [];

    /**
     * このメニューが所属する食堂を取得
     */
    public function canteen(): BelongsTo
    {
        // 1つのMenuは、1つのCanteenに所属する
        return $this->belongsTo(Canteen::class);
    }
}