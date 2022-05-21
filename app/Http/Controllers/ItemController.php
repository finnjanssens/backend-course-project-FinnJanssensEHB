<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_instance;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function allData()
    {
        $items = Item::all();
        $lentItems = Item_instance::where('status', 'lent')->get();
        $lateItems = Item_instance::where('status', 'late')->get();
        $reservedItems = Item_instance::where('status', 'reserved')->get();

        return view('admin', ["items" => $items, "lentItems" => $lentItems, "lateItems" => $lateItems, "reservedItems" => $reservedItems]);
    }
}
