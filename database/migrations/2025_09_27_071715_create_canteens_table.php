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
        Schema::create('canteens', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // 食堂名 (例: センターゾーン食堂)
            $table->text('description')->nullable(); // 説明
            $table->string('location')->nullable(); // 場所
            $table->time('opening_time'); // 営業時間 (開始)
            $table->time('closing_time'); // 営業時間 (終了)
            $table->boolean('is_open')->default(true); // 現在営業中か
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canteens');
    }
};
