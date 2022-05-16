<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_instance;
use App\Models\Item;

class Item_instanceController extends Controller
{
    public function getItemInstances($id)
    {
        $itemInstances = Item_instance::where('item_id', $id)->get();
        $item = Item::where('id', $id)->first();
        return view('item-instances', ['itemInstances' => $itemInstances, 'item' => $item]);
    }
}
