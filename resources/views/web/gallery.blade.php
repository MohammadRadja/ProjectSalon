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
