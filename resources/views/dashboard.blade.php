<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h2 class="font-bold text-xl text-black leading-tight">Reserve Item</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/reserve" class="w-full">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="item">
                                Item
                            </label>
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="item" name="item">
                                @foreach ($availableItemInstances as $i)
                                    <option value={{ $i->id }}>{{ $i->item->brand }} -
                                        {{ $i->item->model }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="pickupMoment">
                                Pickup Moment
                            </label>
                            <input type="datetime-local" name="pickupMoment" id="pickupMoment"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit" value="Reserve">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
