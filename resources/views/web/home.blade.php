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

        <div>
            <div class="text-center text-4xl font-semibold text-pink-500 m-2 mt-5">Categories</div>
            <div class="container flex gap-10 p-10 pt-3 justify-center mx-auto flex-wrap">
                <a href="#" class="flex flex-col items-center gap-2 duration-300 hover:scale-105">
                    <img class="w-60 h-60 rounded-xl object-cover" src="{{ asset('images/hair-cut.jpg') }}"
                        alt="">
                    <span class="text-pink-500 text-2xl text-center">Potong Rambut</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-2 duration-300 hover:scale-105">
                    <img class="w-60 h-60 rounded-xl object-cover" src="{{ asset('images/hair-care.jpg') }}"
                        alt="">
                    <span class="text-pink-500 text-2xl text-center">Perawatan Rambut</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-2 duration-300 hover:scale-105">
                    <img class="w-60 h-60 rounded-xl object-cover" src="{{ asset('images/hair-coloring.jpg') }}"
                        alt="">
                    <span class="text-pink-500 text-2xl text-center">Pewarnaan Rambut</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-2 duration-300 hover:scale-105">
                    <img class="w-60 h-60 rounded-xl object-cover" src="{{ asset('images/makeup.jpg') }}"
                        alt="">
                    <span class="text-pink-500 text-2xl text-center">Make Up & Hijab Styling</span>
                </a>
            </div>
        </div>

        <section class="pt-5 bg-white">
            <div class="md:w-4/5 mx-auto">
                <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
                    <h3 class="mb-6 text-3xl text-pink-500 font-bold">Popular Services</h3>
                    <p class="mb-6 pb-2 text-gray-700 md:mb-12 md:pb-0">
                        Services Popular among our customers.
                    </p>
                </div>

                <div class="flex flex-col md:flex-row mt-3 pb-7 h-max gap-4 flex-wrap justify-center">
                    @if ($popularServices->count() > 0)
                        @foreach ($popularServices as $service)
                            <x-service-card :service="$service" />
                        @endforeach
                    @else
                        <p class="mx-auto text-center block text-gray-700 md:mb-12 md:pb-0">
                            No Services Found
                        </p>
                    @endif
                </div>
            </div>

            <div class="flex justify-end mx-auto pb-5 gap-3 md:w-3/4">

                <a href="{{ route('services') }}"
                    class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded">
                    View All Services
                </a>
            </div>
        </section>

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
        <section class="pt-5 pb-5">
            <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
                <h3 class="text-3xl text-pink-500 font-bold">Gallery</h3>
            </div>
            <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                <div class="-m-1 flex flex-wrap md:-m-2">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                    src="{{ asset('images/Gallery/gallery' . $i . '.jpg') }}" />
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        {{-- Testimonials --}}
        <section class="bg-white pt-5">
            <div class="md:w-3/4 mx-auto">
                <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
                    <h3 class="mb-6 text-3xl text-pink-500 font-bold">Testimonials</h3>
                    <p class="mb-6 pb-2 text-gray-700 md:mb-12 md:pb-0">
                        Here are the testimonials from our customers who have visited our salon.
                    </p>
                </div>

                <div class="grid gap-6 text-center p-6 md:grid-cols-3 lg:gap-12">
                    <div class="mb-12 md:mb-0">
                        <div class="mb-6 flex justify-center">
                            <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(1).jpg"
                                class="w-32 rounded-full shadow-lg dark:shadow-black/30">
                        </div>
                        <h5 class="mb-4 text-xl font-semibold">Kim Wexler</h5>
                        <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
                            Lawyer
                        </h6>
                        <p class="mb-4 text-neutral-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                                <path
                                    d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z">
                                </path>
                            </svg>
                            I had the most amazing experience at Sunny Salon! The staff were so friendly and welcoming,
                            and my hair looked absolutely stunning. I received so many compliments after my appointment
                            and I can't wait to go back!
                        </p>
                        <ul class="mb-0 flex items-center justify-center">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg clip-rule="evenodd" fill-rule="evenodd" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500" stroke-linejoin="round" stroke-miterlimit="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m11.322 2.923c.126-.259.39-.423.678-.423.289 0 .552.164.678.423.974 1.998 2.65 5.44 2.65 5.44s3.811.524 6.022.829c.403.055.65.396.65.747 0 .19-.072.383-.231.536-1.61 1.538-4.382 4.191-4.382 4.191s.677 3.767 1.069 5.952c.083.462-.275.882-.742.882-.122 0-.244-.029-.355-.089-1.968-1.048-5.359-2.851-5.359-2.851s-3.391 1.803-5.359 2.851c-.111.06-.234.089-.356.089-.465 0-.825-.421-.741-.882.393-2.185 1.07-5.952 1.07-5.952s-2.773-2.653-4.382-4.191c-.16-.153-.232-.346-.232-.535 0-.352.249-.694.651-.748 2.211-.305 6.021-.829 6.021-.829s1.677-3.442 2.65-5.44zm.678 2.033v11.904l4.707 2.505-.951-5.236 3.851-3.662-5.314-.756z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-12 md:mb-0">
                        <div class="mb-6 flex justify-center">
                            <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(2).jpg"
                                class="w-32 rounded-full shadow-lg dark:shadow-black/30">
                        </div>
                        <h5 class="mb-4 text-xl font-semibold">Lisa Cudrow</h5>
                        <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
                            Graphic Designer
                        </h6>
                        <p class="mb-4 text-neutral-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                                <path
                                    d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z">
                                </path>
                            </svg>
                            "I had the best haircut of my life at Sunny Salon! The stylist listened to exactly what I
                            wanted and then gave me a haircut that exceeded my expectations. I felt so pampered and
                            taken care of throughout the whole process. I can't wait to come back for my next
                            appointment!
                        </p>
                        <ul class="mb-0 flex items-center justify-center">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-0">
                        <div class="mb-6 flex justify-center">
                            <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(4).jpg"
                                class="w-32 rounded-full shadow-lg dark:shadow-black/30">
                        </div>
                        <h5 class="mb-4 text-xl font-semibold">Jane Smith</h5>
                        <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
                            Marketing Specialist
                        </h6>
                        <p class="mb-4 text-neutral-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                                <path
                                    d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z">
                                </path>
                            </svg>
                            "I had a last-minute hair emergency and Sunny Salon saved the day! The staff were able to
                            fit me in right away and they did an amazing job. I can't thank them enough for their
                            professionalism and expertise. I will definitely be coming back!"
                        </p>
                        <ul class="mb-0 flex items-center justify-center">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    class="h-5 w-5 text-yellow-500" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                    </path>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
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
                        <svg class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 352 512">
                            <path fill="currentColor"
                                d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer container -->
        <footer class="bg-pink-500 text-center text-neutral-100 lg:text-left">
            <div class="flex items-center justify-center border-b-2 border-neutral-200 p-6 lg:justify-between">
                <div class="mr-12 hidden lg:block">
                    <span>Terhubunglah dengan kami di media sosial:</span>
                </div>
                <!-- Social network icons container -->
                <div class="flex justify-center">
                    <a href="https://www.instagram.com/sunny.beauty.sal0n/" target="_blank"
                        class="text-neutral-600 dark:text-neutral-200 text-xl mr-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Main container div: holds the entire content of the footer, including four sections (Tailwind Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
            <div class="mx-6 py-10 text-center md:text-left">
                <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Tailwind Elements section -->
                    <!-- Contact section -->

                    <div>
                        <h6 class="mb-4 flex items-center justify-center font-semibold text-xl md:justify-start">
                            <img class="w-10 h-10" src="{{ asset('images/logo.svg') }}" alt="">
                            Sunny Salon
                        </h6>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mr-3 h-5 w-5">
                                <path
                                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                <path
                                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                            <a href="https://maps.app.goo.gl/B9fSkh4aMThuPZTc9"
                                class="text-neutral-600 dark:text-neutral-200" target="_blank"
                                rel="noopener noreferrer">
                                Jl. Al Furqon, RT 002 / RW 003
                                Kelurahan Poris Plawad Utara
                                Kecamatan Cipondoh, Kota Tangerang
                            </a>
                        </p>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mr-3 h-5 w-5">
                                <path
                                    d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path
                                    d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                            </svg>
                            <a href="mailto:sunnysalon@gmail.com" target="_blank" rel="noopener noreferrer"
                                class="text-neutral-600 dark:text-neutral-200">
                                sunnysalon@gmail.com
                            </a>
                        </p>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mr-3 h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="https://wa.me/628970000600" target="_blank" rel="noopener noreferrer"
                                class="text-neutral-600 dark:text-neutral-200">
                                +62 897 000 0600
                            </a>
                        </p>

                    </div>

                    <!-- Categories section -->
                    <div class="">
                        <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                            Categories
                        </h6>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Potong Rambut</a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Perawatan Rambut</a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Pewarnaan Rambut</a>
                        </p>
                        <p>
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Makeup & Hijab
                                Styling</a>
                        </p>
                    </div>

                    <!-- Services section -->
                    <div class="">
                        <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                            Services
                        </h6>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Potong Rambut + Catok</a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Creambath</a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Bleaching</a>
                        </p>
                        <p>
                            <a href="#!" class="text-neutral-600 dark:text-neutral-200">Makeup Wisuda</a>
                        </p>
                    </div>

                </div>
            </div>

            <!--Copyright section-->
            <div class="bg-white p-2 text-center">
                <span class="text-neutral-500">© 2023 Copyright:</span>
                <a class="font-semibold text-neutral-600" href="/">Sunny Salon</a>
            </div>
        </footer>
        <script>
            // hide offer-banner when user clicks on close
            document.getElementById("offer-banner-close").addEventListener("click", function() {
                document.getElementById("offer-banner").style.display = "none";
            });
        </script>

</x-app-layout>
