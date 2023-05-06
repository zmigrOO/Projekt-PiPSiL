@props(['offer'])
<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    {{-- <div>
        <div class="mt-4">
            {{ $offer->name }}
        </div>
    </div> --}}
    {{-- <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="float-left">
                    <img src="images\samolot.bmp" alt="offer image" class="w-48 h-36">
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{ $offer->name }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 float-left">
                    Price: {{ $offer->price }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Quantity: {{ $offer->quantity }}
                </div>
            </div>
        </div>
    </div> --}}




    <div class="flex font-sans py-2 h-40 sm:h-fit">
        <div class="flex-none w-56 relative " style="max-width: 30vw">
            <a href="/offers/{{ $offer->id }}">
                <img src="/images/samolot.bmp" alt=""
                    class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
            </a>
        </div>
        <form class="flex-auto p-6">
            <div class="flex flex-wrap relative">
                <h1 class="flex-auto font-medium text-4xl pb-6 text-gray-900 dark:text-gray-100 ">
                    <a href="/offers/{{ $offer->id }}">
                        {{ $offer->name }}
                    </a>
                </h1>
                <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                    ${{ $offer->price }}
                </div>
                <div class="text-sm font-medium text-slate-400">
                    Available: {{ $offer->quantity }}
                </div>
                {{-- @if(Auth::user()->id == $offer->user_id) @auth --}}
                <div class="absolute right-0 bottom-0">
                        <a style="cursor: pointer;"
                            onclick="watchOffer({{ $offer->id }}, document.getElementById('img{{ $offer->id }}'))">
                            <img id="img{{ $offer->id }}" class="dark:invert"
                                src="@if ($offer->watched == true) fav.svg @else nfav.svg @endif" alt="favourite"
                                class="w-5 h-5">
                        </a>
                    </div>
                 {{-- @endauth @endif --}}
            </div>
        </form>
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
                    img.src = 'fav.svg';
                    // console.log('fav.svg');
                } else {
                    img.src = 'nfav.svg';
                    // console.log('nfav.svg');
                }
            });
    }
</script>
