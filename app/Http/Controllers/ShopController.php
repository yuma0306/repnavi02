<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Shop;
use App\Models\Pet;

class ShopController extends Controller
{
    /**
     * ショップ一覧
     */
    public function index(Request $request) {
        $pref = $request->input('pref');
        $keyword = $request->input('keyword');
        if(isset($pref)) {
            $query = Shop::query();
            $query->where('pref', $pref);
            $shops = $query->get();
            return view('shop.index', compact('shops', 'pref'));
        }
        if(isset($keyword)) {
            $query = Shop::query();
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
            $shops = $query->get();
            return view('shop.index', compact('shops', 'keyword'));
        }
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }
    /**
     * ショップ詳細
     */
    public function show(string $shop_id)
    {
        $pets = Pet::where('shop_id', $shop_id)->get();
        $shop = Shop::findOrFail($shop_id);
        if ($shop && $shop->public_flag === 1) {
            return redirect()->route('shop.index');
        }
        return view('shop.show', compact('shop', 'pets'));
    }
}
