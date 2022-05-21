<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item_instance;
use App\Models\Loan;
use Carbon\Carbon;

class CheckLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loans:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if loans ar past return date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Item_instance::where('status', 'lent')->get();
        foreach ($reservations as $r) {
            error_log($r->current_loan_ends_at);
            if (Carbon::createFromFormat('Y-m-d H:i:s', $r->current_loan_ends_at)->lessThanOrEqualTo(Carbon::now()->addHours(2))) {
                error_log("true");
                $r->status = 'late';
                Loan::where('active', true)->where('item_instance_id', $r->id)->first()->active = false;
                $r->save();
            }
        }
    }
}
