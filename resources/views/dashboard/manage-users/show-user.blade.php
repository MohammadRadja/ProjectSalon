<x-dashboard>
    <div class="container mx-auto p-1 max-sm:px-2">
        <div class="pb-2 mb-3">
            <div class="bg-white p-3 shadow-sm rounded-sm" x-data="{ showFullInfo: false }">

                {{-- Profile --}}
                <div class="my-2 flex flex-col items-center text-center max-sm:items-start max-sm:text-left">
                    <img class="h-16 w-16 max-sm:h-14 max-sm:w-14 rounded-full mx-auto max-sm:mx-0"
                        src="{{ $user->profile_photo_url }}" alt="">
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 max-sm:text-base max-sm:mt-2">
                        {{ $user->name }}
                    </h1>
                    <h3 class="text-gray-600 font-semibold leading-6 max-sm:text-sm">
                        {{ $user->role->name }}
                    </h3>
                </div>

                {{-- Basic Info --}}
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm max-sm:grid-cols-1 max-sm:gap-y-1">
                        <div class="grid grid-cols-2 max-sm:grid-cols-1 max-sm:mb-2">
                            <div class="px-4 py-2 font-semibold max-sm:px-2 max-sm:py-1">Phone No.</div>
                            <div class="px-4 py-2 max-sm:px-2 max-sm:py-1">{{ $user->phone_number }}</div>
                        </div>
                        <div class="grid grid-cols-2 max-sm:grid-cols-1">
                            <div class="px-4 py-2 font-semibold max-sm:px-2 max-sm:py-1">Email</div>
                            <div class="px-4 py-2 max-sm:px-2 max-sm:py-1 break-words">
                                <a class="text-blue-800" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                        </div>
                    </div>

                    {{-- Info List --}}
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm text-sm max-sm:text-xs">

                        {{-- Common Items --}}
                        <li class="py-3">
                            <div class="flex flex-col sm:flex-row justify-between gap-1">
                                <span>Status</span>
                                @if ($user->status == 1)
                                    <span><span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm max-sm:text-xs">Active</span></span>
                                @else
                                    <span><span
                                            class="bg-red-500 py-1 px-2 rounded text-white text-sm max-sm:text-xs">Inactive</span></span>
                                @endif
                            </div>
                        </li>

                        <li class="py-3">
                            <div class="flex flex-col sm:flex-row justify-between gap-1">
                                <span>Joined Date</span>
                                <span>{{ $user->created_at->toDateString() }}</span>
                            </div>
                        </li>

                        <li class="py-3">
                            <div class="flex flex-col sm:flex-row justify-between gap-1">
                                <span>Last Appointment</span>
                                <span>
                                    {{ $appointments->where('status', true)->sortByDesc('date')->where('date', '<=', \Carbon\Carbon::today()->toDateString())->first()?->service->name }}
                                </span>
                            </div>
                        </li>

                        <li class="py-3">
                            <div class="flex flex-col sm:flex-row justify-between gap-1">
                                <span>Last Appointment Date</span>
                                <span>
                                    {{ $appointments->where('status', true)->sortByDesc('date')->first()?->date }}
                                </span>
                            </div>
                        </li>

                        {{-- Hidden Detail Info --}}
                        <template x-if="showFullInfo">
                            <div>
                                <li class="py-3">
                                    <div class="flex flex-col sm:flex-row justify-between gap-1">
                                        <span>Last Purchase</span>
                                        <span>
                                            {{ $appointments->where('status', true)->sortByDesc('created_at')->first()?->service->name }}
                                        </span>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex flex-col sm:flex-row justify-between gap-1">
                                        <span>Last Purchase Date</span>
                                        <span>
                                            {{ $appointments->where('status', true)->sortByDesc('created_at')->first()?->created_at->toDateString() }}
                                        </span>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex flex-col sm:flex-row justify-between gap-1">
                                        <span>Last Purchase Amount</span>
                                        <span>IDR
                                            {{ $appointments->where('status', true)->sortByDesc('created_at')->first()?->total }}</span>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex flex-col sm:flex-row justify-between gap-1">
                                        <span>Total Purchases</span>
                                        <span>IDR {{ $appointments->where('status', true)?->sum('total') }}</span>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex flex-col sm:flex-row justify-between gap-1">
                                        <span>Last Cancellation</span>
                                        <span>
                                            {{ $appointments->where('status', false)->sortByDesc('created_at')->first()?->service->name }}
                                        </span>
                                    </div>
                                </li>
                            </div>
                        </template>
                    </ul>
                </div>

                {{-- Toggle Button --}}
                <div class="mt-4 text-center max-sm:text-left">
                    <button x-on:click="showFullInfo = !showFullInfo"
                        class="text-blue-800 text-sm max-sm:text-xs font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs px-4 py-2">
                        <span x-text="showFullInfo ? 'Hide Full Information' : 'Show Full Information'"></span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Appointment Section --}}
        <div class="w-full">
            <livewire:manage-appointments :user-id="$user->id" :select-filter="'upcoming'" />
        </div>
    </div>
</x-dashboard>
