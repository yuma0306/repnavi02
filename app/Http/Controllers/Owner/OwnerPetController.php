<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// 追加
use App\Models\Pet;
use App\Models\Shop;
use App\Models\User;

class OwnerPetController extends Controller
{
    public function index($id)
    {
        $pets = Pet::where('shop_id', $id)->get();
        $shop_name = Shop::where('id', $id)->value('shop_name');
        $shop_id = $id;
        return view('owner.shop.pet.index', compact('pets', 'shop_name', 'shop_id'));
    }

    public function create($id)
    {
        $shop_id = $id;
        $shop_name = Shop::where('id', $id)->value('shop_name');
        return view('owner.shop.pet.create', compact('shop_id', 'shop_name'));
    }


    // バリデーションのcreateよりさきにidを取得データにひもづける,
    // ルーティングの定義により、{id} というプレースホルダーが指定されているため、LaravelがURLの中のこの部分を検知し、その値を自動的に関数の引数として渡します。
    public function store(Request $request, $id)
    {
        $validation_rules = $this->validateRules();
        $validate_data = $request->validate($validation_rules);

        // ログインユーザーに紐づくショップ情報を取得
        $user = auth()->user();
        $shop = $user->shops()->findOrFail($id);
        // 生体情報をデータベースに保存し、shop_idを自動的に紐づける
        $pet = $shop->pets()->create($validate_data);
        // pet_images テーブルに pet_image1 から pet_image4 のファイルパスを保存
        for ($i = 1; $i <= 4; $i++) {
            $image_field = "pet_image{$i}";
            if ($request->hasFile($image_field)) {
                $image_path = $request->file($image_field)->store("{$user->id}/{$id}/{$pet->id}", 'public');
                $pet->update([$image_field => $image_path]);
            }
        }
        return redirect()->route('owner.shop.pet.index', ['id' => $id])->with('success', '生体情報が登録されました');
    }

    // 生体情報の更新
    public function edit($shop_id, $pet_id)
    {
        // dd($shop_id);
        // dd($pet_id);
        $shop = auth()->user()->shops()->findOrFail($shop_id);
        $pet = $shop->pets()->findOrFail($pet_id);
        return view('owner.shop.pet.edit', compact('shop', 'pet'));
    }

    // 生体情報の更新
    public function update(Request $request, $shop_id, $pet_id)
    {
        $validation_rules = $this->validateRules();
        // dd($validation_rules);
        $validated_data = $request->validate($validation_rules);
        // dd($validated_data);

        $user = auth()->user();
        $shop = $user->shops()->findOrFail($shop_id);
        $pet = $shop->pets()->findOrFail($pet_id);

        $directory_path = "/{$user->id}/{$shop_id}/{$pet_id}";
        // dd($directory_path);

        // 画像を更新するかチェック
        for ($i = 1; $i <= 4; $i++) {
            $image_field = "pet_image{$i}";
            if ($request->hasFile($image_field)) {
                // 古い画像を削除する
                if ($pet->{$image_field}) {
                    Storage::disk('public')->delete($pet->{$image_field});
                }
                $image_path = $request->file($image_field)->store("{$directory_path}", 'public');
                $validated_data[$image_field] = $image_path;
            }
        }

        // データの更新
        $pet->update($validated_data);
        return redirect()->route('owner.shop.pet.index', ['id' => $shop_id])->with('success', '生体情報が更新されました');
    }

    /**
     * 生体情報の削除
     */
    public function destroy($shop_id, $pet_id)
    {
        // 画像ファイルの削除
        $user_id = auth()->id();
        $directory_path = "/{$user_id}/{$shop_id}/{$pet_id}";
        Storage::disk("public")->deleteDirectory($directory_path);
        // データの削除
        $shop = auth()->user()->shops()->findOrFail($shop_id);
        $pet = $shop->pets()->findOrFail($pet_id);
        $pet->delete();
        return redirect()->route('owner.shop.pet.index', ['id' => $shop_id])->with('success', '生体情報が削除されました');
    }

    public function validateRules()
    {
        return [
            // 画像
            'pet_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pet_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pet_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pet_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 公開フラグ
            'public_flag' => 'required|boolean',
            // 必須項目
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            // 自由入力
            'species' => 'nullable|string|max:255',
            'morph' => 'nullable|string|max:255',
            'sex' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'arrival_day' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }
}
