<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">My Currently Loaned Out Items</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Category</th>
                                <th class="text-left">Instance #</th>
                                <th class="text-left">Loan Date</th>
                                <th class="text-left">Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemInstances as $itemI)
                                @if ($itemI->status == 'lent')
                                    <tr>
                                        <td>{{ $itemI->item->brand }}</td>
                                        <td>{{ $itemI->item->model }}</td>
                                        <td>{{ $itemI->item->category }}</td>
                                        <td>{{ $itemI->id }}</td>
                                        <td>{{ Str::substr($itemI->current_loan_starts_at, 0, 10) }}</td>
                                        <td>{{ Str::substr($itemI->current_loan_ends_at, 0, 10) }}</td>
                                    </tr>
                                @endif
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
                <h2 class="font-bold text-xl text-black leading-tight">My Reserved Items</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Model</th>
                                <th class="text-left">Category</th>
                                <th class="text-left">Instance #</th>
                                <th class="text-left">Reserved For</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemInstances as $itemI)
                                @if ($itemI->status == 'reserved')
                                    <tr>
                                        <td>{{ $itemI->item->brand }}</td>
                                        <td>{{ $itemI->item->model }}</td>
                                        <td>{{ $itemI->item->category }}</td>
                                        <td>{{ $itemI->id }}</td>
                                        <td>{{ Str::substr($itemI->reserved_for, 0, 16) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
