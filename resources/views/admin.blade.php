<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">Reserved Items</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">User</th>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Instance #</th>
                                <th class="text-left">Reserved For</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservedItems as $itemI)
                                <tr>
                                    <td>{{ $itemI->user->first()->name }}</td>
                                    <td>{{ $itemI->item->brand }}</td>
                                    <td>{{ $itemI->item->model }}</td>
                                    <td>{{ $itemI->id }}</td>
                                    <td>{{ $itemI->reserved_for }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">Lent Items</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">User</th>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Instance #</th>
                                <th class="text-left">Loan Started At</th>
                                <th class="text-left">Loan Ends At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lentItems as $itemI)
                                <tr>
                                    <td>{{ $itemI->user->first()->name }}</td>
                                    <td>{{ $itemI->item->brand }}</td>
                                    <td>{{ $itemI->item->model }}</td>
                                    <td>{{ $itemI->id }}</td>
                                    <td>{{ $itemI->current_loan_starts_at }}</td>
                                    @if (Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemI->current_loan_ends_at)->subHours(24)->greaterThanOrEqualTo(Carbon\Carbon::now()))
                                        <td>{{ $itemI->current_loan_ends_at }}</td>
                                    @else
                                        <td style="color: red">{{ $itemI->current_loan_ends_at }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">Late Items</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">User</th>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Instance #</th>
                                <th class="text-left">Loan Started At</th>
                                <th class="text-left">Loan Ends At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lateItems as $itemI)
                                <tr>
                                    <td>{{ $itemI->user->first()->name }}</td>
                                    <td>{{ $itemI->item->brand }}</td>
                                    <td>{{ $itemI->item->model }}</td>
                                    <td>{{ $itemI->id }}</td>
                                    <td>{{ $itemI->current_loan_starts_at }}</td>
                                    <td>{{ $itemI->current_loan_ends_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">All Items</h2>
                <p>Click on an item to see its instances</p>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Category</th>
                                <th class="text-left">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr class="hover:bg-black hover:text-white cursor-pointer"
                                    onclick="window.location='/item/{{ $item->id }}'">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
