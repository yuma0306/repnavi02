<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// model
use App\Models\Pet;
use App\Models\Shop;

class PetController extends Controller
{
    /**
     * 生体一覧
     */
   // indexページ
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $shop = $request->input('shop');
        if(isset($category)) {
            $query = Pet::query();
            $query->where('category', 'LIKE', "%{$category}%");
            $pets = $query->get();
            return view('pet.index', compact('pets', 'category'));
        }
        if(isset($keyword)) {
            $query = Pet::query();
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('species', 'LIKE', "%{$keyword}%");
            $pets = $query->get();
            return view('pet.index', compact('pets', 'keyword'));
        }
        if(isset($shop)) {
            $query = Pet::query();
            $shopModel = Shop::find($shop);
            $query->where('shop_id', 'LIKE', "%{$shop}%");
            $pets = $query->get();
            return view('pet.index', compact('pets', 'shopModel'));
        }
        $pets = Pet::all();
        return view('pet.index', compact('pets'));
    }
    /**
     * ショップ詳細
     */
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        if($pet && $pet->public_flag === 1) {
            return redirect()->route('pet.index');
        }
        return view('pet.show', compact('pet'));
    }
}
