<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_instance;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function allData()
    {
        $brands = Item::select('brand')->distinct()->get();
        $models = Item::select('model')->distinct()->get();
        $items = Item::all();
        $itemInstances = Item_instance::all();

        return view('admin', ["brands" => $brands, "models" => $models, "items" => $items, "itemInstances" => $itemInstances]);
    }
}
