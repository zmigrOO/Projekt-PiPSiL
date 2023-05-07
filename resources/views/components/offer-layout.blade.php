{{-- @props(['offer']) --}}
<x-noauth>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    {{-- TODO This Layout is made do display a single offer and its details, pictures and other stuff. Maybe there will also be like "other offers from this seller" stuff so there is still much to do --}}
    <div class="container mx-auto py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-img-carousel :images="$offer->images" />
                    <div class="relative top-5">
                        <h1 class="text-2xl font-bold mb-2 dark:text-slate-50">{{ $offer->name }}</h1>
                        <p class="text-gray-600 mb-4 dark:text-gray-400">Condition: {{ $offer->condition }}</p>
                        <p class="text-gray-600 mb-4 dark:text-gray-400">Seller: {{ $offer->seller->name }}</p>

                        <div class="flex items-center mb-4">
                            <span class="text-lg font-bold mr-2 dark:text-slate-50">Price: ${{ $offer->price }}</span>
                        </div>

                        {{-- @if (Auth::user()->id == $offer->user_id) @auth --}}
                        <div class="absolute right-5 top-1">
                            <a style="cursor: pointer;"
                                onclick="watchOffer({{ $offer->id }}, document.getElementById('img{{ $offer->id }}'))">
                                <img id="img{{ $offer->id }}" class="dark:invert"
                                    src="@if ($offer->watched == true) /fav.svg @else /nfav.svg @endif" alt="favourite"
                                    class="w-5 h-5">
                            </a>
                        </div>
                        {{-- @endauth @endif --}}

                    </div>
            </div>

            <div>
                <p class="text-gray-600 mb-4 dark:text-slate-50">Description:</p>
                <p class="text-gray-600 mb-4 dark:text-slate-50">{{ $offer->description }}</p>
                <ul class="list-disc list-inside dark:text-gray-300">
                    <li>A place</li>
                    <li>For features </li>
                    <li>That are specific</li>
                    <li>to certain categories</li>
                </ul>

                <h2 class="text-lg font-bold mt-8 mb-2 dark:text-gray-300">Product Reviews</h2>
                {{-- TODO: place the reviews in the foreach loop --}}
                @if ($offer->opinions != null)
                @foreach ($offer->opinions as $opinion)
                <div class="border rounded-xl p-4">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <span class="font-bold dark:text-gray-300">John Doe</span>
                            <span class="text-gray-600 dark:text-gray-300">- May 5, 2023</span>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non faucibus
                        purus.</p>
                </div>
                @endforeach
                @endif
                <div class="border rounded-xl p-4">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <span class="font-bold dark:text-gray-300">John Doe</span>
                            <span class="text-gray-600 dark:text-gray-300">- May 5, 2023</span>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non faucibus
                        purus.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function watchOffer(offerId, img) {
            fetch('/watch/' + offerId)
                .then(function(response) {
                    return response.json();
                })
                .then(function(response) {
                    // update the image src based on the response
                    if (response.watched == true) {
                        img.src = '/fav.svg';
                        // console.log('fav.svg');
                    } else {
                        img.src = '/nfav.svg';
                        // console.log('nfav.svg');
                    }
                });
        }
    </script>
</x-noauth>
