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
        Schema::create('pets', function (Blueprint $table) {
            // デフォルト
            $table->id();
            $table->timestamps();
            // 外部キー制約を設定
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            // 画像
            $table->string('pet_image1')->nullable();
            $table->string('pet_image2')->nullable();
            $table->string('pet_image3')->nullable();
            $table->string('pet_image4')->nullable();
            // 公開フラグ
            $table->boolean('public_flag')->default(true);
            // 必須入力項目
            $table->string('title');
            $table->string('category');
            // 自由入力項目
            $table->string('species')->nullable();
            $table->string('morph')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('price')->nullable();
            $table->date('arrival_day')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
