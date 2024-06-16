<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pet;

class HomeController extends Controller
{
    public function index() {
        $pets = Pet::latest()->take(5)->get();
        return view('home', compact('pets'));
    }
}
