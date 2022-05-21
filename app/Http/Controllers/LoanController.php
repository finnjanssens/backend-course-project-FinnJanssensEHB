<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;

class LoanController extends Controller
{
    public function getUserLoansAndReservations()
    {
        $user = User::find(auth()->id());
        $itemInstances = $user->item_instances()->get();
        return view('dashboard', ["itemInstances" => $itemInstances]);
    }
}
