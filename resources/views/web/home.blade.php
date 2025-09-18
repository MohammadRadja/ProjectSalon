<x-app-layout>
    <x-slot name="mainLogoRoute">
        {{ route('home') }}
    </x-slot>


    <div class="relative">
        <section class="relative bg-cover bg-center bg-no-repeat "
            style="background-image: url({{ asset('images/salon1.png') }}" ;>
            <div
                class="absolute inset-0 bg-gradient-to-r from-white/95 to-white/0 ltr:bg-gradient-to-r rtl:bg-gradient-to-l sm:bg-transparent sm:from-white/95 sm:to-white/0">
            </div>

            <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
                <div class="max-w-xl text-left ltr:sm:text-left rtl:sm:text-right">
                    <h1 class="text-3xl font-extrabold sm:text-5xl text-neutral-700">
                        Temukan Pengalaman Salon Terbaik di
                        <strong class="block font-extrabold text-pink-500">
                            Sunny Salon.
                        </strong>
                    </h1>

                    <p class="mt-4 max-w-lg sm:text-xl/relaxed">
                        Perawatan rambut & kecantikan untuk semua kalangan. Harga terjangkau, hasil maksimal.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4 text-center">
                        <a href="{{ route('services') }}"
                            class="block w-full rounded bg-pink-500 px-12 py-3 text-lg font-medium text-white shadow hover:bg-pink-700 focus:outline-none focus:ring active:bg-pink-500 sm:w-auto">
                            Pesan Sekarang
                        </a>
                        <a href="{{ route('services') }}"
                            class="block w-full rounded bg-white px-12 py-3 text-lg font-medium text-pink-500 shadow hover:text-pink-600 focus:outline-none focus:ring-offset-pink-400 active:text-pink-500 sm:w-auto">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Categories --}}
        @include('web.categories')

        {{-- Popular Service --}}
        @include('web.popular-service')

        <section class=" w-3/4 p-3 mx-auto pt-5">
            <div>
                <div class="text-center text-4xl font-semibold text-pink-500 m-2">Offers</div>
            </div>
            <div class="flex gap-10 ">
                @if ($deals->count() > 0)
                    @foreach ($deals as $deal)
                        @if ($deal->is_hidden == false)
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $deal->name }}
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 ">{{ $deal->description }}</p>
                                <a href="https://wa.me/6285280289862" target="_blank"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300">
                                    Book Now
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="mx-auto text-center block text-gray-700 md:mb-12 md:pb-0">
                        No Deals Found
                    </p>
                @endif
            </div>
        </section>

        {{-- Gallery --}}
        @include('web.gallery')

        {{-- Testimonials --}}
        @include('web.testimonial')

        <section class="mb-12" id="offer-banner">
            <div
                class="bg-pink-600 alert alert-dismissible fade show fixed bottom-0 right-0 left-0 z-[1030] w-full py-4 px-6 text-white md:flex justify-between items-center text-center md:text-left">
                <div class="mb-4 md:mb-0 flex items-center flex-wrap justify-center md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mr-2">
                        <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                        <path fill="currentColor"
                            d="M216 23.86c0-23.8-30.65-32.77-44.15-13.04C48 191.85 224 200 224 288c0 35.63-29.11 64.46-64.85 63.99-35.17-.45-63.15-29.77-63.15-64.94v-85.51c0-21.7-26.47-32.23-41.43-16.5C27.8 213.16 0 261.33 0 320c0 105.87 86.13 192 192 192s192-86.13 192-192c0-170.29-168-193-168-296.14z" />
                    </svg>
                    <strong class="mr-1">Limited offer!</strong> Get massive discounts now before it's to late
                </div>
                <div class="flex items-center justify-center">
                    <a class="inline-block px-6 py-2.5 bg-white text-gray-700 font-semibold text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-100 hover:shadow-lg focus:bg-gray-100 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-200 active:shadow-lg transition duration-150 ease-in-out mr-4"
                        href="#" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Claim
                        offer</a>
                    <div class="text-white" data-bs-dismiss="alert" aria-label="Close" id="offer-banner-close">
                        <svg class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                            <path fill="currentColor"
                                d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer container -->
        @include('web.footer')

        <script>
            // hide offer-banner when user clicks on close
            document.getElementById("offer-banner-close").addEventListener("click", function() {
                document.getElementById("offer-banner").style.display = "none";
            });
        </script>

</x-app-layout>
