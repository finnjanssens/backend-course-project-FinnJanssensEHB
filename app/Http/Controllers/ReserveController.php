<?php

namespace App\Http\Controllers;

use App\Models\Item_instance;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public static function reserve(Request $request)
    {
        $itemI = Item_instance::find($request->item);
        error_log($request->pickupMoment);
        error_log($request->item);
        $itemI->reserved_for = Carbon::createFromFormat('Y-m-d\TH:i', $request->pickupMoment)->toDateTimeString();
        $itemI->status = 'reserved';
        User::find(auth()->id())->item_instances()->attach($itemI);
        $itemI->save();
        return back();
    }
}
