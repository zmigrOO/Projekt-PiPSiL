@props(['offer'])
<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->



    <div class="flex font-sans py-2" style="height: 25vh">
        <div class="flex-none w-56 relative " style="max-width: 30vw">
            <a href="/offers/{{ $offer->id }}">
                <img src="/images/samolot.bmp" alt=""
                    class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
            </a>
        </div>
        <form class="flex-auto px-6">
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
                    {{ __('available:') }} {{ $offer->quantity }}
                </div>
                @if ($offer->auth != null)
                    @if ($offer->auth != $offer->seller_id)
                        <div class="absolute right-0 bottom-0">
                            <a style="cursor: pointer;"
                                onclick="watchOffer({{ $offer->id }}, document.getElementById('img{{ $offer->id }}'))">
                                <img id="img{{ $offer->id }}" class="dark:invert"
                                    src="@if ($offer->watched == true) fav.svg @else nfav.svg @endif"
                                    alt="favourite" class="w-5 h-5">
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </form>
    </div>
</div>
<script>
    console.log({{ $offer->auth }} + ' ' + {{ $offer->seller_id }});

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
