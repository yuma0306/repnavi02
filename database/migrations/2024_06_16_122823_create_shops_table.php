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
        Schema::create('shops', function (Blueprint $table) {
            // デフォルト
            $table->id();
            $table->timestamps();
            // 追加
            $table->string('shop_name'); // 必須
            $table->string('business_hours')->nullable();
            $table->string('regular_holiday')->nullable();
            $table->string('phone')->nullable();
            $table->text('access_method')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('pref'); // 必須
            $table->text('map')->nullable();
            $table->string('animal_handler')->nullable();
            $table->text('description')->nullable();
            $table->text('handling_goods')->nullable();
            $table->text('handling_pets')->nullable();
            $table->text('handling_live_feeds')->nullable();
            $table->text('handling_frozen_feeds')->nullable();
            $table->text('handling_dried_feeds')->nullable();
            $table->text('handling_artificial_feeds')->nullable();
            $table->string('shop_image1')->nullable(); // 必須
            $table->string('shop_image2')->nullable();
            $table->string('shop_image3')->nullable();
            $table->string('shop_image4')->nullable();
            $table->string('website')->nullable();
            $table->boolean('public_flag')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
