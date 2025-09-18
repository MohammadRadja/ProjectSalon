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
                    <a href="https://maps.app.goo.gl/B9fSkh4aMThuPZTc9" class="text-neutral-600 dark:text-neutral-200"
                        target="_blank" rel="noopener noreferrer">
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
