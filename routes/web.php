<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 追加
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\OwnerShopController;
use App\Http\Controllers\Owner\OwnerPetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/owner/profile', [ProfileController::class, 'edit'])->name('owner.profile.edit');
    Route::patch('/owner/profile', [ProfileController::class, 'update'])->name('owner.profile.update');
    Route::delete('/owner/profile', [ProfileController::class, 'destroy'])->name('owner.profile.destroy');
});

/**
 * オーナー管理画面
 */
Route::prefix('owner')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [OwnerController::class, 'index'])->name('owner.index');
    // Route::get('/pets', [OwnerController::class, 'pets'])->name('owner.pets');
    // // ショップ一覧を表示するルート
    Route::get('/shop', [OwnerShopController::class, 'index'])->name('owner.shop.index');
    // // ショップ情報登録処理へのルート
    Route::post('/shop', [OwnerShopController::class, 'store'])->name('owner.shop.store');
    // // ショップ情報登録画面へのルート
    Route::get('/shop/create', [OwnerShopController::class, 'create'])->name('owner.shop.create');
    Route::get('/shop/{id}', [OwnerShopController::class, 'edit'])->name('owner.shop.edit');
    Route::put('/shop/{id}', [OwnerShopController::class, 'update'])->name('owner.shop.update');
    Route::delete('/shop/{id}', [OwnerShopController::class, 'destroy'])->name('owner.shop.destroy');
    // // 各ショップの生体投稿index
    Route::get('/shop/{id}/pet', [OwnerPetController::class, 'index'])->name('owner.shop.pet.index');
    // // 各ショップの生体投稿作成
    Route::get('/shop/{id}/pet/create', [OwnerPetController::class, 'create'])->name('owner.shop.pet.create');
    Route::post('/shop/{id}/pet/', [OwnerPetController::class, 'store'])->name('owner.shop.pet.store');
    // // 各ショップの生体投稿編集
    Route::get('/shop/{id}/pet/{pet_id}', [OwnerPetController::class, 'edit'])->name('owner.shop.pet.edit');
    Route::put('/shop/{shop_id}/pet/{pet_id}', [OwnerPetController::class, 'update'])->name('owner.shop.pet.update');
    // // 各ショップの生体投稿削除
    Route::delete('/shop/{shop_id}/pet/{pet_id}', [OwnerPetController::class, 'destroy'])->name('owner.shop.pet.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');