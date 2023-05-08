@props(['offer'])
<div class="rounded-lg border-solid border-gray-100 dark:border-gray-700 border-4">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->



    <div class="flex font-sans py-2" style="height: 25vh">
        <div class="flex-none w-56 relative rounded-lg overflow-hidden" style="max-width: 25vw">
            <a href="/offers/{{ $offer->id }}">
                <img src="/images/samolot.bmp" alt=""
                    class=".hover:scale-110 absolute inset-0 w-full h-full object-cover" loading="lazy" />
            </a>
        </div>
        <form class="flex-auto px-6 relative">
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
            @if (Route::currentRouteName() == 'my-offers')
                <div class="absolute right-5 bottom-5">
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{__('Edit')}}" href="/edit/{{$offer->id}}" style="cursor: pointer;">
                            <img src="edit.svg" alt="edit">
                        </a>
                    </div>
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{$offer->active ? __('Deactivate'): __('Activate')}}" onclick="toggleActive({{ $offer->id }}, this)" style="cursor: pointer">
                            <img id="soft{{ $offer->id }}"
                                src="@if ($offer->active == true) deactivate.svg @else activate.svg @endif"
                                alt="deactivate" style="cursor: pointer;">
                        </a>
                    </div>
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{__('Delete')}}" onclick="deleteOffer({{ $offer->id }}, '{{ __('You cannot delete an active offer') }}')"
                            style="cursor: pointer;">
                            <img id="delete{{ $offer->id }}" src="delete.svg" alt="delete"
                                @if ($offer->active == true) style="filter: grayscale(100%)" @endif>
                        </a>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
<script>
    function watchOffer(offerId) {
        img = document.getElementById('img' + offerId);
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

    function toggleActive(offerId, toggle) {
        img = document.getElementById('soft' + offerId);
        del = document.getElementById('delete' + offerId);
        fetch('/toggleActive/' + offerId)
            .then(function(response) {
                return response.json();
            })
            .then(function(response) {
                // update the image src based on the response
                if (response.active == true) {
                    img.src = 'deactivate.svg';
                    del.style.filter = 'grayscale(100%)';
                    toggle.title = '{{__('Deactivate')}}';
                    // console.log('fav.svg');
                } else {
                    img.src = 'activate.svg';
                    del.style.filter = 'grayscale(0%)';
                    toggle.title = '{{__('Activate')}}';
                    // console.log('nfav.svg');
                }
            });
    }

    function deleteOffer(offerId, message) {
        img = document.getElementById('delete' + offerId);
        if (img.style.filter == 'grayscale(100%)') {
            alert(message);
            return;
        }
        location.href = '/offer/delete/' + offerId;
    }
</script>
<style>
    a img:hover {
        transform: scale(1.1);
    }

    a img {
        transition: .5s;
    }
</style>
