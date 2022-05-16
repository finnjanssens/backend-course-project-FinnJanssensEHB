<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-4">
                        <h2 class="font-bold text-xl text-black leading-tight">{{ $item->brand }} -
                            {{ $item->model }}</h2>
                        <h3>{{ $item->description }}</h3>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Damage</th>
                                <th class="text-left">Notes</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemInstances as $itemInstance)
                                <tr class="hover:bg-black hover:text-white cursor-pointer">
                                    <td>{{ $itemInstance->id }}</td>
                                    <td><input class="border-0 text-black" type="text"
                                            value={{ $itemInstance->damage }}></td>
                                    {{-- <td>{{ $itemInstance->damage === '' ? '/' : $itemInstance->damage }}</td> --}}
                                    <td>{{ $itemInstance->notes === '' ? '/' : $itemInstance->notes }}</td>
                                    <td>{{ $itemInstance->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
