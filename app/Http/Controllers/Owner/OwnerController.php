<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Pet;

class OwnerController extends Controller
{
    public function index()
    {
        $latestShops = Shop::latest()->take(3)->get();
        $latestPets = Pet::latest()->take(3)->get();
        return view('owner.index', compact('latestShops', 'latestPets'));
    }

    public function pets()
    {
        $pets = Pet::all();
        return view('owner.pets', compact('pets'));
    }
}
