{{-- Layout utama --}}
<x-app-layout>

    {{-- Container halaman detail layanan --}}
    <div class="md:w-9/12 w-full mx-auto">
        <div
            class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">

            {{-- Grid layout antara gambar dan detail --}}
            <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">

                {{-- Gambar layanan --}}
                <div class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                    <img src="{{ asset('images/services/' . $service->image) }}" alt="{{ $service->name . ' image' }}"
                        class="object-cover object-center">
                </div>

                {{-- Detail layanan --}}
                <div class="sm:col-span-8 lg:col-span-7">
                    <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{ $service->name }}</h2>
                    <span class="text-gray-600"> Category : {{ $service->category->name }}</span>

                    {{-- Informasi harga --}}
                    <section aria-labelledby="information-heading" class="mt-2">
                        <h3 id="information-heading" class="sr-only">Product information</h3>
                        <p class="text-2xl text-gray-900">IDR {{ number_format($service->price, 2, '.', ',') }}</p>

                        {{-- Admin & Staff Only: Menu Manage + Statistik --}}
                        @if (Auth::user()?->role_id == 1 || Auth::user()?->role_id == 2)

                            {{-- Tombol Manage --}}
                            <a href="{{ route('manageservices') }}?search={{ $service->slug }}">
                                <x-button class="px-5 py-2 text-white bg-pink-500 rounded-md hover:bg--600">
                                    Manage
                                </x-button>
                            </a>

                            {{-- Statistik Analytics --}}
                            <div class="bg-gray-100 px-3 py-2 my-2 ">
                                <span class="font-semibold"> Analytics insights </span>

                                {{-- Tabel performa layanan --}}
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
                                        {{-- Baris Views --}}
                                        <tr>
                                            <td class="border p-2">Views</td>
                                            <td class="border p-2">{{ $viewsLastWeek }}</td>
                                            <td class="border p-2">
                                                {{-- Cek perubahan view minggu lalu --}}
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

                                        {{-- Appointments dan Revenue --}}
                                        {{-- (struktur yang sama seperti views, jadi tidak diulang semua komentarnya) --}}

                                    </tbody>
                                </table>

                                {{-- Slot waktu populer minggu ini --}}
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

                                {{-- Slot waktu populer total --}}
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

                    {{-- Deskripsi layanan --}}
                    <section>
                        <div class="mt-6">
                            <h4 class="sr-only">Description</h4>
                            <div class="flex items-center">
                                {{ $service->description }}
                            </div>
                        </div>
                    </section>

                    {{-- Manfaat layanan jika ada --}}
                    @if ($service->benefits)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">Benefits</h4>
                                <div class="flex items-center">
                                    {{ $service->benefits }}
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- Perhatian / cautions --}}
                    @if ($service->cautions)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">Cautions</h4>
                                <div class="flex items-center">
                                    {{ $service->cautions }}
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- Alergen --}}
                    @if ($service->allegens)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">Allergens</h4>
                                <div class="flex items-center">
                                    {{ $service->allergens }}
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- Aftercare tips --}}
                    @if ($service->aftercare_tips)
                        <section>
                            <div class="mt-6">
                                <h4 class="text-lg font-medium">After Care Tips</h4>
                                <div class="flex items-center">
                                    {{ $service->aftercare_tips }}
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- Komponen "Add to Cart" HANYA untuk customer --}}
                    @if (Auth::check() && Auth::user()->role_id == 3)
                        <livewire:adding-service-to-cart :service="$service" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
