<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function allItems()
    {
        $brands = Item::select('brand')->distinct()->get();

        return view('dashboard', ["brands" => $brands]);
    }
}
