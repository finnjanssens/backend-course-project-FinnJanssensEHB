<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\Item_instance;
use App\Models\Loan;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Error;

class CheckReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if any reservation pickup moments have bin surpassed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Item_instance::where('status', 'reserved')->get();
        foreach ($reservations as $r) {
            if (Carbon::createFromFormat('Y-m-d H:i:s', $r->reserved_for)->lessThanOrEqualTo(Carbon::now()->addHours(2))) {
                error_log("true");
                $r->status = 'lent';
                $r->current_loan_starts_at = Carbon::now()->addHours(2)->toDateTimeString();
                $r->current_loan_ends_at = Carbon::now()->addHours(2)->addDays(5)->toDateTimeString();
                $r->save();
            }
        }
    }
}
