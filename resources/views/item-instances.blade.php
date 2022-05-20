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
                    @foreach ($itemInstances as $i)
                        <form method="POST" id="{{ $i->id }}_form" action="/item/{{ $item->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id" value="{{ $i->id }}" />
                        </form>
                    @endforeach
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Damage</th>
                                <th class="text-left">Notes</th>
                                <th class="text-left">Status</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemInstances as $itemInstance)
                                <tr class="hover:bg-black hover:text-white cursor-pointer">
                                    <td>{{ $itemInstance->id }}</td>
                                    <td><input name="damage" form="{{ $itemInstance->id }}_form"
                                            class="border-0 text-black focus:border-0" type="text"
                                            value={{ $itemInstance->damage }}></td>
                                    {{-- <td>{{ $itemInstance->damage === '' ? '/' : $itemInstance->damage }}</td> --}}
                                    <td><input name="notes" form="{{ $itemInstance->id }}_form"
                                            class="border-0 text-black focus:border-0" type="text"
                                            value={{ $itemInstance->notes }}></td>
                                    <td>
                                        <select name="status" form="{{ $itemInstance->id }}_form"
                                            class="text-black">
                                            <option value="available"
                                                @if ($itemInstance->status == 'available') selected="selected" @endif>available
                                            </option>
                                            <option value="lent"
                                                @if ($itemInstance->status == 'lent') selected="selected" @endif>lent
                                            </option>
                                            <option value="reserved"
                                                @if ($itemInstance->status == 'reserved') selected="selected" @endif>reserved
                                            </option>
                                            <option value="repair"
                                                @if ($itemInstance->status == 'repair') selected="selected" @endif>repair
                                            </option>
                                            <option value="unavailable"
                                                @if ($itemInstance->status == 'unavailable') selected="selected" @endif>unavailable
                                            </option>
                                        </select>
                                    </td>
                                    <td class="text-right">
                                        <input
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            type="submit" form="{{ $itemInstance->id }}_form" value="Save">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
