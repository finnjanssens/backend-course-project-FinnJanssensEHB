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

    public static function updateItemInstance(Request $request)
    {
        error_log("Function called");
        $instance = Item_instance::find($request->id);
        if ($request->damage) {
            $instance->damage = $request->damage;
        }
        if ($request->notes) {
            $instance->notes = $request->notes;
        }
        $instance->status = $request->status;
        $instance->save();
        return back();
    }
}
