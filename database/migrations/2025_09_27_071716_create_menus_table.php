<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            // 外部キー: どの食堂のメニューか。食堂が削除されたらメニューも削除 (onDelete('cascade'))
            $table->foreignId('canteen_id')->constrained()->onDelete('cascade');

            $table->string('name'); // メニュー名
            $table->unsignedInteger('price'); // 価格 (円)
            $table->string('category'); // カテゴリー (定食, 丼, 麺類など)
            $table->text('description')->nullable(); // 商品説明

            // メニューの属性
            $table->boolean('is_daily_special')->default(false); // 日替わりメニュー
            $table->boolean('is_limited_time')->default(false); // 期間限定メニュー
            $table->string('photo_url')->nullable(); // 写真のURL/ファイルパス
            $table->unsignedSmallInteger('calories')->nullable(); // カロリー
            $table->text('allergens')->nullable(); // アレルギー情報

            $table->timestamps();

            // 同じ食堂内で同じ名前のメニューが重複しないようにユニーク制約を設定
            $table->unique(['canteen_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
