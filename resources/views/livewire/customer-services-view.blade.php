<div class="bg-white">
    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col sm:flex-row sm:items-baseline sm:justify-between border-b border-gray-200 pb-6 pt-10 space-y-4 sm:space-y-0">
                <!-- Judul -->
                <h1 class="text-2xl sm:text-4xl font-bold tracking-tight text-pink-500">Services</h1>

                {{-- Search Section --}}
                <div class="w-full sm:w-1/3 px-4">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search Services...">
                        <button type="submit"
                            class="text-white absolute right-2 bottom-2 bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Sort Menu -->
                <div class="w-full sm:w-auto px-4">
                    <div x-data="{ showSortMenu: false, selectedSort: 'Most Popular' }" class="relative">
                        <button @click=" showSortMenu =! showSortMenu" type="button"
                            class="w-full sm:w-auto flex justify-between items-center text-sm font-medium text-gray-700 hover:text-gray-900 bg-white border border-gray-300 rounded-md px-4 py-2">
                            <span x-text="selectedSort"></span>
                            <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-cloak x-show="showSortMenu" @click.away="showSortMenu = false"
                            class="absolute right-0 z-10 mt-2 w-full sm:w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1 text-sm text-gray-700" role="menu" aria-orientation="vertical">
                                <a href="#" @click="selectedSort = 'Most Popular'; showSortMenu = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Most Popular</a>
                                <a href="#" @click="selectedSort = 'Best Rating'; showSortMenu = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Best Rating</a>
                                <a href="#" @click="selectedSort = 'Newest'; showSortMenu = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Newest</a>
                                <a href="#" @click="selectedSort = 'Price: Low to High'; showSortMenu = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Price: Low to High</a>
                                <a href="#" @click="selectedSort = 'Price: High to Low'; showSortMenu = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Price: High to Low</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pb-24 pt-6">
                <h2 id="products-heading" class="sr-only">Services</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                    aria-controls="filter-section-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Category</span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-1">
                                <div class="space-y-4">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center">
                                            <input id="filter-category-{{ $category->id }}" wire:model="categoryFilter"
                                                value="{{ $category->id }}" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-{{ $category->id }}"
                                                class="ml-3 text-sm text-gray-600">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3 flex flex-col flex-wrap gap-2  md:flex-row mt-3 pb-7 h-max bg-gray-50">
                        <!-- Your content -->
                        <div class="w-full">
                            <div class="flex justify-end mt-5 mx-2">
                                {{ $services->links() }}
                            </div>
                        </div>
                        @foreach ($services as $service)
                            @if ($service->is_hidden == false)
                                <x-service-card :service="$service" />
                            @endif
                        @endforeach
                        <div class="w-full">
                            <div class="flex justify-end mt-5 mx-2">
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
