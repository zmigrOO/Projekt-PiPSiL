@props(['offer'])
<div class="rounded-lg border-solid border-gray-100 dark:border-gray-700 border-4">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <div class="flex font-sans py-2" style="height: 25vh">
        <div class="flex-none w-56 relative rounded-lg overflow-hidden" style="max-width: 25vw">
            <a href="/offers/{{ $offer->id }}">
                <img src="/images/{{$offer->image_path}}" alt=""
                    class=".hover:scale-110 absolute inset-0 w-full h-full object-cover " loading="lazy" />
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
                        <div class="absolute bottom-0 right-0 transition-all active:scale-50">
                            <a style="cursor: pointer;"
                                onclick="watchOffer({{ $offer->id }}, document.getElementById('img{{ $offer->id }}'))">
                                <img class="dark:invert relative transition-all hover:scale-110 z-20" src="/nfav.svg"
                                    alt="favourite">
                                <img id="img{{ $offer->id }}" src="/fav.svg"
                                    class="absolute z-10 top-0 transition-all hover:scale-110 @if ($offer->watched != true) opacity-0 @endif">
                            </a>
                        </div>
                    @endif
                @endif
            </div>
            @if (Route::currentRouteName() == 'my-offers')
                <div class="absolute right-5 bottom-5">
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{ __('Edit') }}" href="/edit/{{ $offer->id }}" style="cursor: pointer;">
                            <img src="edit.svg" alt="edit" class="transition-all hover:scale-110">
                        </a>
                    </div>
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{ $offer->active ? __('Deactivate') : __('Activate') }}"
                            onclick="toggleActive({{ $offer->id }}, this)" style="cursor: pointer">
                            <img class="transition-all hover:scale-110" id="soft{{ $offer->id }}"
                                src="@if ($offer->active == true) deactivate.svg @else activate.svg @endif"
                                alt="deactivate" style="cursor: pointer;">
                        </a>
                    </div>
                    <div class=" h-1/3 w-fit float-left">
                        <a title="{{ __('Delete') }}"
                            onclick="deleteOffer({{ $offer->id }}, '{{ __('cannot_delete_active_offer') }}')"
                            style="cursor: pointer;">
                            <img class="transition-all hover:scale-110" id="delete{{ $offer->id }}"
                                class="dark:invert" src="delete.svg" alt="delete"
                                @if ($offer->active == true) style="filter: grayscale(100%)" @endif>
                        </a>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
