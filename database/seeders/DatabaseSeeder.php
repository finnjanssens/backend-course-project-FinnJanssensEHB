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

        $csv = fopen(base_path("database/data/items copy.csv"), "r");
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

        $itemsToLoan = [17, 22, 33, 45];
        $itemsToReserve = [18, 23, 34, 46];

        $user = User::find(1);
        $user->item_instances()->sync(array_merge($itemsToLoan, $itemsToReserve));

        foreach ($itemsToLoan as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "lent";
            $instance->save();
        }
        foreach ($itemsToReserve as $index) {
            $instance = Item_instance::find($index);
            $instance->status = "reserved";
            $instance->save();
        }

        $userLoans = Loan::where('user_id', 1)->get();

        foreach ($userLoans as $loan) {
            $loan->ends_at = Carbon::now()->addDays(5)->toDateTimeString();
            $loan->save();
        }
    }
}
