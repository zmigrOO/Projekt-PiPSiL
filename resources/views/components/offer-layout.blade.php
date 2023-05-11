{{-- @props(['offer']) --}}
<x-noauth>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    {{-- TODO This Layout is made do display a single offer and its details, pictures and other stuff. Maybe there will also be like "other offers from this seller" stuff so there is still much to do --}}
    <div class="container mx-auto py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-img-carousel :images="$offer->images" />
                <div class="relative top-5">
                    @if ($offer->active == false)
                        <div
                            class="w-full h-fit border-orange-700 border-solid border-4 rounded-lg p-4 bg-opacity-50 bg-orange-500 form-textarea">
                            {{ __('Deactivated') }}</div>
                    @endif
                    <h1 class="text-2xl font-bold mb-2 dark:text-slate-50">{{ $offer->name }}</h1>
                    <p class="text-gray-600 mb-4 dark:text-gray-400">{{ __('condition') }}: {{ $offer->condition }}</p>
                    <p class="text-gray-600 mb-4 dark:text-gray-400">{{ __('seller') }} {{ $offer->seller->name }}</p>
                    <p class="text-gray-600 mb-4 dark:text-gray-400">{{ __('city') }}: {{ $offer->city }}</p>
                    <p class="text-gray-600 mb-4 dark:text-gray-400">{{ __('phone_number') }}:
                        {{ substr($offer->phone_number, 0, 3) }}-{{ substr($offer->phone_number, 3, 3) }}-{{ substr($offer->phone_number, 6, 3) }}
                    </p>



                    <div class="flex items-center mb-4">
                        <span class="text-lg font-bold mr-2 dark:text-slate-50">{{ __('price') }}:
                            ${{ $offer->price }}</span>
                    </div>
                    @if ($offer->auth != null && $offer->active == true)
                        @if ($offer->auth != $offer->seller_id)
                            <div class="absolute right-5 top-1 transition-all active:scale-50">
                                <a style="cursor: pointer;"
                                    onclick="watchOffer({{ $offer->id }}, document.getElementById('img{{ $offer->id }}'))">
                                    <img class="dark:invert relative transition-all hover:scale-110 z-20"
                                        src="/nfav.svg" alt="favourite">
                                    <img id="img{{ $offer->id }}" src="/fav.svg"
                                        class="absolute z-10 top-0 transition-all hover:scale-110 @if ($offer->watched != true) opacity-0 @endif">
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div>
                <p class="text-gray-600 mb-4 dark:text-slate-50"> {{ __('description') }}:</p>
                <p class="text-gray-600 mb-4 dark:text-slate-50">{{ $offer->description }}</p>
                <ul class="list-disc list-inside dark:text-gray-300">
                    @if (isset($offer->attribs))

                        @foreach ($offer->attribs as $key => $value)
                            <li>{{ $key }}: {{ $value }}</li>
                        @endforeach
                    @endif
                </ul>

                <h2 class="text-lg font-bold mt-8 mb-2 dark:text-gray-300">{{ __('product_reviews') }}:</h2>
                {{-- TODO: place the reviews in the foreach loop --}}
                @if ($offer->opinions != null)
                    @foreach ($offer->opinions as $opinion)
                        <div class="border rounded-xl p-4">
                            <div class="flex items-center mb-2">
                                <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                                <div>
                                    <span class="font-bold dark:text-gray-300">{{ $opinion->user->name }}</span>
                                    <span class="text-gray-600 dark:text-gray-300">- {{ $opinion->created_at }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300">{{ $opinion->content }}</p>
                        </div>
                    @endforeach
                @endif
                <form method="post" action='/opinion'>
                    @csrf
                    <div class="flex flex-col mt-8">
                        <label for="review" class="text-gray-600 dark:text-gray-300">{{ __('your_review') }}:</label>
                        <textarea name="review" id="review" cols="30" rows="4"
                            class="border rounded-xl p-4 mt-2 dark:bg-gray-700 dark:text-gray-300"></textarea>
                        <input type="hidden" name="user_id" value="{{ $offer->auth }}">
                        <input type="hidden" name="id" value="{{ $offer->seller_id }}">
                        <input type="hidden" name="id" value="{{ $offer->id }}">
                        <label for="rating" class="text-gray-600 dark:text-gray-300">{{ __('rating') }}:</label>
                        <input type="number" name="rating" id="rating" min="1" max="5" value="1"
                            class="border rounded-xl p-4 mt-2 dark:bg-gray-700 dark:text-gray-300">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl mt-4">{{ __('submit') }}</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script>
        console.log({{ $offer->seller_id }}{{ $offer->auth }})

        function watchOffer(offerId) {
            img = document.getElementById('img' + offerId);
            fetch('/watch/' + offerId)
                .then(function(response) {
                    return response.json();
                })
                .then(function(response) {
                    // update the image src based on the response
                    if (response.watched == true) {
                        img.classList.remove('opacity-0');
                        // console.log('fav.svg');
                    } else {
                        img.classList.add('opacity-0');
                        // console.log('nfav.svg');
                    }
                });
        }
    </script>
</x-noauth>
