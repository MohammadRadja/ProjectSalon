<x-app-layout>

    <div class="md:w-9/12 w-full mx-auto">
        <div
            class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">


            <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                <div class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->name . ' image' }}"
                        class="object-cover object-center">
                    <p>{{ asset($service->image) }}</p>
                </div>

                <div class="sm:col-span-8 lg:col-span-7">
                    <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{ $service->name }}</h2>
                    <span class="text-gray-600"> Category : {{ $service->category->name }}</span>

                    <section aria-labelledby="information-heading" class="mt-2">
                        <h3 id="information-heading" class="sr-only">Product information</h3>

                        <p class="text-2xl text-gray-900">IDR {{ number_format($service->price, 2, '.', ',') }}
                        </p>


                        @if (Auth::user()?->role_id == 1 || Auth::user()?->role_id == 2)

                            <a href="{{ route('manageservices') }}?search={{ $service->slug }}">
                                <x-button class="px-5 py-2 text-white bg-pink-500 rounded-md hover:bg--600">
                                    Manage
                                </x-button>
                            </a>

                            <div class="bg-gray-100 px-3 py-2 my-2 ">
                                <span class="font-semibold"> Analytics insights </span>
                                <table class="border-collapse w-full">
                                    <thead>
                                        <tr>
                                            <th class="border p-2">Metric</th>
                                            <th class="border p-2">Last Week</th>
                                            <th class="border p-2">Change <span class="text-sm block">Last Week</span>
                                            </th>
                                            <th class="border p-2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border p-2">Views</td>
                                            <td class="border p-2">{{ $viewsLastWeek }}</td>
                                            <td class="border p-2">
                                                @if ($percentageViewsChangeLastWeek === 'N/A')
                                                    {{ $percentageViewsChangeLastWeek }}
                                                @elseif($percentageViewsChangeLastWeek > 0)
                                                    <span class="text-green-800"><span class="text-2xl">↑</span>
                                                        {{ $percentageViewsChangeLastWeek }} %</span>
                                                @elseif ($percentageViewsChangeLastWeek < 0)
                                                    <span class="text-red-800"><span class="text-2xl">↓</span>
                                                        {{ $percentageViewsChangeLastWeek }} %</span>
                                                @else
                                                    {{ $percentageViewsChangeLastWeek }} %
                                                @endif
                                            </td>
                                            <td class="border p-2">{{ $views }}</td>
                                        </tr>

                                        <tr>
                                            <td class="border p-2">Appointments</td>
                                            <td class="border p-2">{{ $appointmentsLastWeek }}</td>
                                            <td class="border p-2">
                                                @if ($percentageAppointmentsChangeLastWeek === 'N/A')
                                                    {{ $percentageAppointmentsChangeLastWeek }}
                                                @elseif($percentageAppointmentsChangeLastWeek > 0)
                                                    <span class="text-green-800"><span class="text-2xl">↑</span>
                                                        {{ $percentageAppointmentsChangeLastWeek }} %</span>
                                                @elseif ($percentageAppointmentsChangeLastWeek < 0)
                                                    <span class="text-red-800"><span class="text-2xl">↓</span>
                                                        {{ $percentageAppointmentsChangeLastWeek }} %</span>
                                                @else
                                                    {{ $percentageAppointmentsChangeLastWeek }} %
                                                @endif
                                            </td>
                                            <td class="border p-2">{{ $appointmentsTotal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border p-2">Appointments (Last Month)</td>
                                            <td class="border p-2">{{ $appointmentsLastMonth }}</td>
                                            <td class="border p-2">
                                                @if ($percentageAppointmentsChangeLastMonth === 'N/A')
                                                    {{ $percentageAppointmentsChangeLastMonth }}
                                                @elseif($percentageAppointmentsChangeLastMonth > 0)
                                                    <span class="text-green-800"><span class="text-2xl">↑</span> <span
                                                            class="text-2xl">{{ $percentageAppointmentsChangeLastMonth }}
                                                            %</span></span>
                                                @elseif ($percentageAppointmentsChangeLastMonth < 0)
                                                    <span class="text-red-800"><span class="text-2xl">↓</span> <span
                                                            class="text-2xl">{{ $percentageAppointmentsChangeLastMonth }}
                                                            %</span></span>
                                                @endif
                                                <span class="text-[12px] block">Monthly</span>
                                            </td>
                                            <td class="border p-2"></td>
                                        </tr>
                                        <tr>
                                            <td class="border p-2">Revenue</td>
                                            <td class="border p-2"> IDR
                                                {{ number_format($totalRevenueLastWeek, 2, '.', ',') }}</td>
                                            <td class="border p-2">
                                                @if ($percentageRevenueChangeLastWeek === 'N/A')
                                                    {{ $percentageRevenueChangeLastWeek }}
                                                @elseif($percentageRevenueChangeLastWeek > 0)
                                                    <span class="text-green-800"><span class="text-2xl">↑</span>
                                                        {{ $percentageRevenueChangeLastWeek }} %</span>
                                                @elseif ($percentageRevenueChangeLastWeek < 0)
                                                    <span class="text-red-800"><span class="text-2xl">↓</span>
                                                        {{ $percentageRevenueChangeLastWeek }} %</span>
                                                @endif
                                            </td>
                                            <td class="border p-2">IDR {{ number_format($totalRevenue, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border p-2">Revenue (Last Month)</td>
                                            <td class="border p-2">IDR
                                                {{ number_format($totalRevenueLastMonth, 2, '.', ',') }}</td>
                                            <td class="border p-2">
                                                @if ($percentageRevenueChangeLastMonth === 'N/A')
                                                    {{ $percentageRevenueChangeLastMonth }}
                                                @elseif($percentageRevenueChangeLastMonth > 0)
                                                    <span class="text-green-800"><span class="text-2xl">↑</span> <span
                                                            class="text-2xl">{{ $percentageRevenueChangeLastMonth }}
                                                            %</span></span>
                                                @elseif ($percentageRevenueChangeLastMonth < 0)
                                                    <span class="text-red-800"><span class="text-2xl">↓</span> <span
                                                            class="text-2xl">{{ $percentageRevenueChangeLastMonth }}
                                                            %</span></span>
                                                @endif
                                                <span class="text-[12px] block">Monthly</span>
                                            </td>
                                            <td class="border p-2"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div>
                                    <h2 class="font-medium text-md my-2">Most Popular Time Slots Last Week</h2>
                                    <table class="border-collapse w-full">
                                        <thead>
                                            <tr>
                                                <th class="border p-2">Time Slot</th>
                                                <th class="border p-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($timeSlotsStatsLastWeek as $timeSlotStat)
                                                <tr>

                                                    <td class="border p-2">
                                                        {{ date('g:i a', strtotime($timeSlotStat['time_slot']->start_time)) . ' - ' . date('g:i a', strtotime($timeSlotStat['time_slot']->end_time)) }}
                                                    </td>
                                                    <td class="border p-2">{{ $timeSlotStat['count'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>

                                <div>
                                    <h2 class="font-medium text-md my-2">Most Popular Time Slots</h2>
                                    <table class="border-collapse w-full">
                                        <thead>
                                            <tr>
                                                <th class="border p-2">Time Slot</th>
                                                <th class="border p-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($timeSlotsStats as $timeSlotStat)
                                                <tr>
                                                    <td class="border p-2">
                                                        {{ date('g:i a', strtotime($timeSlotStat['time_slot']->start_time)) . ' - ' . date('g:i a', strtotime($timeSlotStat['time_slot']->end_time)) }}
                                                    </td>
                                                    <td class="border p-2">{{ $timeSlotStat['count'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>



                            </div>

                        @endif
                    </section>
                    <section>
                        <div class="mt-6">
                            <h4 class="sr-only">Description</h4>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    {{ $service->description }}
                                </div>
                            </div>
                        </div>
                    </section>
                    @if ($service->benefits)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg  font-medium">Benefits</h4>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        {{ $service->benefits }}
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    @if ($service->cautions)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">Cautions</h4>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        {{ $service->cautions }}
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    @if ($service->allegens)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">Allergens</h4>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        {{ $service->allergens }}
                                    </div>
                                </div>
                            </div>
                        </section @endif
                        @if ($service->aftercare_tips)
                            <section>
                                <div class="mt-6">
                                    <h4 class="text-lg font-medium">After Care Tips</h4>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            {{ $service->aftercare_tips }}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif

                        <livewire:adding-service-to-cart :service="$service" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
