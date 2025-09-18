<div>
    <div>
        {{-- Header --}}
        <div class="flex justify-between mx-7">
            <h2 class="text-2xl font-bold max-sm:text-lg max-sm:mb-1">
                @if ($selectFilter == 'upcoming')
                    Upcoming
                @elseif ($selectFilter == 'previous')
                    Previous
                @elseif ($selectFilter == 'cancelled')
                    Cancelled
                @endif
                Appointments
            </h2>
        </div>

        {{-- Alert Message --}}
        <div class="mt-4 max-sm:mx-2">
            @if (session()->has('message'))
                <div class="px-4 py-2 text-white bg-green-500 rounded-md max-sm:text-sm max-sm:px-2">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        {{-- Container Wrapper --}}
        <div class="rounded-lg border border-gray-200 shadow-md m-5 max-sm:m-2 max-sm:border max-sm:shadow-sm">

            {{-- Filter & Search Section --}}
            <div class="w-full m-4 flex max-sm:flex-col max-sm:gap-2 max-sm:m-2 max-sm:w-3/4">

                {{-- Search Section --}}
                <div class="w-1/2 mx-2 max-sm:w-3/4 max-sm:mx-0">
                    <label for="default-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" wire:model="search" id="default-search" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 max-sm:p-3 max-sm:pl-9 max-sm:text-sm"
                            placeholder="Search Appointments...">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2 max-sm:px-3 max-sm:py-1.5 max-sm:text-xs">
                            Search
                        </button>
                    </div>
                </div>

                {{-- Filter Dropdown --}}
                <select class="border text-gray-900 border-gray-300 rounded-lg max-sm:w-3/4 max-sm:text-sm max-sm:mt-1"
                    wire:model="selectFilter">
                    <option value="upcoming">Upcoming</option>
                    <option value="previous">Previous</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            {{-- Table Wrapper --}}
            <div class="w-full max-sm:w-full max-sm:px-2">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 max-sm:text-xs">
                    <thead class="bg-gray-50 max-sm:text-[11px]">
                        <tr>
                            <th class="pl-6 py-3 font-medium text-gray-900">Code</th>
                            <th class="px-4 py-3 font-medium text-gray-900">Service</th>
                            <th class="px-4 py-3 font-medium text-gray-900">Date</th>
                            <th class="px-4 py-3 font-medium text-gray-900">Time Slot</th>
                            <th class="px-4 py-3 font-medium text-gray-900 max-sm:hidden">Location</th>

                            @if (auth()->user()->role->name == 'Customer')
                                <th class="px-4 py-3 font-medium text-gray-900 max-sm:hidden">Address</th>
                                <th class="px-4 py-3 font-medium text-gray-900">Contact No</th>
                            @elseif (auth()->user()->role->name == 'Admin' || auth()->user()->role->name == 'Employee')
                                <th class="px-4 py-3 font-medium text-gray-900">Customer</th>
                                <th class="px-4 py-3 font-medium text-gray-900">Contact No</th>
                                <th class="px-4 py-3 font-medium text-gray-900 max-sm:hidden">Email</th>
                            @endif

                            <th class="px-4 py-3 font-medium text-gray-900">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @if ($appointments->count() == 0)
                            <tr class="text-center">
                                <td class="pl-6 py-4" colspan="9">No Appointments Found</td>
                            </tr>
                        @else
                            @foreach ($appointments as $appointment)
                                <tr class="max-sm:text-[11px]">
                                    <td class="pl-6 py-3">{{ $appointment->appointment_code }}</td>
                                    <td class="px-4 py-3">{{ $appointment->service->name }}</td>
                                    <td class="px-4 py-3">{{ $appointment->date }}</td>
                                    <td class="px-4 py-3">
                                        {{ $appointment->timeSlot->start_time }} -
                                        {{ $appointment->timeSlot->end_time }}
                                    </td>
                                    <td class="px-4 py-3 max-sm:hidden">{{ $appointment->location->name }}</td>

                                    @if (auth()->user()->role->name == 'Customer')
                                        <td class="px-4 py-3 max-sm:hidden">{{ $appointment->location->address }}</td>
                                        <td class="px-4 py-3">{{ $appointment->location->telephone_number }}</td>
                                    @elseif (auth()->user()->role->name == 'Admin' || auth()->user()->role->name == 'Employee')
                                        <td class="px-4 py-3">{{ $appointment->user->name }}</td>
                                        <td class="px-4 py-3">{{ $appointment->user->phone_number }}</td>
                                        <td class="px-4 py-3 max-sm:hidden">{{ $appointment->user->email }}</td>
                                    @endif

                                    {{-- Actions --}}
                                    <td class="px-4 py-3">
                                        <div class="flex gap-1 max-sm:flex-col max-sm:gap-2 max-sm:mt-1">
                                            @if ($selectFilter == 'upcoming')
                                                <x-danger-button
                                                    wire:click="confirmAppointmentCancellation({{ $appointment->id }})"
                                                    wire:loading.attr="disabled">
                                                    {{ __('Cancel') }}
                                                </x-danger-button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="p-5 max-sm:p-2 max-sm:text-sm">
                {{ $appointments->links() }}
            </div>

            {{-- Cancel Modal --}}
            <x-dialog-modal wire:model="confirmingAppointmentCancellation">
                <x-slot name="title">
                    {{ __('Cancel Appointment') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to cancel the appointment?') }}
                </x-slot>

                <x-slot name="footer">
                    <div class="flex gap-3 max-sm:flex-col max-sm:gap-2">
                        <x-secondary-button wire:click="$set('confirmingAppointmentCancellation', false)"
                            wire:loading.attr="disabled">
                            {{ __('Back') }}
                        </x-secondary-button>

                        <x-danger-button wire:click="cancelAppointment({{ $confirmingAppointmentCancellation }})"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-danger-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        </div>
    </div>
</div>
