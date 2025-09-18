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

        <a href="{{ route('services') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded">
            View All Services
        </a>
    </div>
</section>
