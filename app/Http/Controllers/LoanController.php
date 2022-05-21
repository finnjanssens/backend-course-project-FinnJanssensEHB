<?php

namespace App\Http\Controllers;

use App\Models\Item_instance;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;

class LoanController extends Controller
{
    public function getUserLoansAndReservations()
    {
        $user = User::find(auth()->id());
        $itemInstances = $user->item_instances()->get();
        $availableItemInstances = Item_instance::where('status', 'available')->get();
        return view('dashboard', ["itemInstances" => $itemInstances, "availableItemInstances" => $availableItemInstances]);
    }
}
