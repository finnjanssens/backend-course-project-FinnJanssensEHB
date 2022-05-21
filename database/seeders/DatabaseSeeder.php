<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Item;
use App\Models\Item_instance;
use App\Models\Loan;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $loan_types = [
            'school',
            'private',
            'campus',
        ];

        $TestAdmin = new User();
        $TestAdmin->name = "mikederycke";
        $TestAdmin->email = "mike.derycke@ehb.be";
        $TestAdmin->password = Hash::make('backendisawesome');
        $TestAdmin->is_admin = true;
        $TestAdmin->save();

        $TestUser = new User();
        $TestUser->name = "finnjanssens";
        $TestUser->email = "finn.janssens@student.ehb.be";
        $TestUser->password = Hash::make('backendisnotsoawesome');
        $TestUser->save();

        $csv = fopen(base_path("database/data/items.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csv, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                print_r($data);
                $item = new Item();
                $item->brand = $data['0'];
                $item->model = $data['1'];
                $item->category = $data['2'];
                $item->description = $data['3'];
                $item->loan_type = $loan_types[rand(0, 2)];
                $item->save();
            }
            $firstline = false;
        }

        fclose($csv);

        $items = Item::all();


        foreach ($items as $i) {
            for ($j = 0; $j < rand(1, 3); $j++) {
                $i->item_instances()->create([
                    'damage' => '',
                    'notes' => '',
                    'status' => 'available',
                ]);
            }
        }

        $itemsToLoanFinn = [17, 22, 33, 45];
        $itemsToReserveFinn = [18, 23, 34, 46];
        $itemsToLoanMike = [4, 13, 53, 36];
        $itemsToReserveMike = [61, 3, 21, 1];

        $userFinn = User::find(2);
        $userFinn->item_instances()->sync(array_merge($itemsToLoanFinn, $itemsToReserveFinn));

        foreach ($itemsToLoanFinn as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "lent";
            $start = Carbon::now()->subDays(rand(0, 8))->subSeconds(rand(0, 40000));
            $instance->current_loan_starts_at = $start->toDateTimeString();
            $instance->current_loan_ends_at = $start->addDays(5)->toDateTimeString();
            $instance->save();
        }
        foreach ($itemsToReserveFinn as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "reserved";
            $instance->reserved_for = Carbon::now()->addDays(rand(1, 8))->addSeconds(rand(0, 40000))->toDateTimeString();
            $instance->save();
        }

        $userMike = User::find(1);
        $userMike->item_instances()->sync(array_merge($itemsToLoanMike, $itemsToReserveMike));

        foreach ($itemsToLoanMike as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "lent";
            $start = Carbon::now()->subDays(rand(0, 8))->subSeconds(rand(0, 40000));
            $instance->current_loan_starts_at = $start->toDateTimeString();
            $instance->current_loan_ends_at = $start->addDays(5)->toDateTimeString();
            $instance->save();
        }
        foreach ($itemsToReserveMike as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "reserved";
            $instance->reserved_for = Carbon::now()->addDays(rand(2, 6))->addSeconds(rand(0, 40000))->toDateTimeString();
            $instance->save();
        }
    }
}
