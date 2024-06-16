<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Shop;


class OwnerShopController extends Controller
{
    // indexページ
    public function index()
    {
        $shops = Auth::user()->shops;
        return view('owner.shop.index', compact('shops'));
    }

    // ショップ情報登録画面表示
    public function create()
    {
        return view('owner.shop.create');
    }

    // ショップ情報保存処理
    public function store(Request $request)
    {
        // dd($request);
        $validationRules = $this->validateRules();
        $validatedData = $request->validate($validationRules);
        // dd($validatedData);

        // ログインユーザーのIDと一緒にデータを保存
        $userID = auth()->user()->id;
        $shop = auth()->user()->shops()->create($validatedData);
        $shopID = $shop->id;

        for ($i = 1; $i <= 4; $i++) {
            $imageField = "shop_image{$i}";
            if ($request->hasFile($imageField)) {
                $imagePath = $request->file($imageField)->store("{$userID}/{$shopID}", 'public');
                // 保存した画像のパスを対応する shop_image カラムに保存
                $shop->update([$imageField => $imagePath]);
            }
        }

        return redirect()->route('owner.shop.index')->with('success', 'ショップ情報が登録されました');
    }

    // ショップ情報画面
    public function edit($id)
    {
        // 現在ログインしているユーザーに紐付けられたショップのみを取得
        $shop = Auth::user()->shops()->findOrFail($id);
        return view('owner.shop.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $validationRules = $this->validateRules();
        $validatedData = $request->validate($validationRules);

        // ログインユーザーに紐づくショップ情報を取得
        $userID = auth()->user()->id;
        $shop = auth()->user()->shops()->findOrFail($id);
        // 画像を更新するかチェック
        for ($i = 1; $i <= 4; $i++) {
            $imageField = "shop_image{$i}";
            if ($request->hasFile($imageField)) {
                // 古い画像を削除する
                if ($shop->{$imageField}) {
                    Storage::disk('public')->delete($shop->{$imageField});
                }
                $imagePath = $request->file($imageField)->store("{$userID}/{$id}", 'public');
                $validatedData[$imageField] = $imagePath;
            }
        }

        // データの更新
        $shop->update($validatedData);
        return redirect()->route('owner.shop.index')->with('success', 'ショップ情報が更新されました');
    }

    public function destroy($id)
    {
        $userID = auth()->id();
        $directoryPath = "/{$userID}/{$id}";
        Storage::disk("public")->deleteDirectory($directoryPath);
        $shop = auth()->user()->shops()->findOrFail($id);
        $shop->delete();
        return redirect()->route('owner.shop.index')->with('success', 'ショップが削除されました');
    }

    public function validateRules()
    {
        return [
            'shop_name' => 'required|string|max:255', // required
            'business_hours' => 'nullable|string|max:255',
            'regular_holiday' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'access_method' => 'nullable|string',
            'postal_code' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'pref' => 'required|string|max:255', // required
            'map' => 'nullable|string',
            'animal_handler' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'handling_goods' => 'nullable|string',
            'handling_pets'=> 'nullable|string',
            'handling_live_feeds'=> 'nullable|string',
            'handling_frozen_feeds'=> 'nullable|string',
            'handling_dried_feeds'=> 'nullable|string',
            'handling_artificial_feeds'=> 'nullable|string',
            'shop_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'shop_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'shop_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'shop_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|string|max:255',
            'public_flag' => 'required|boolean', // required
        ];
    }
}
