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




    <div class="flex font-sans py-2">
        <div class="flex-none w-56 relative">
            <a href="/offers/{{ $offer->id }}">
            <img src="/images/samolot.bmp" alt="" class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
        </a>
        </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap">
      <h1 class="flex-auto font-medium text-4xl p-6 text-gray-900 dark:text-gray-100 ">
            <a href="/offers/{{ $offer->id }}">

        {{ $offer->name }}
    </a>
      </h1>
      <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
        ${{ $offer->price }}
      </div>
      <div class="text-sm font-medium text-slate-400">
        Available: {{ $offer->quantity }} items
      </div>
    </div>
    <div class="float-right flex space-x-4 mb-5 text-sm font-medium">
      {{-- <button class="float-right flex items-center justify-center w-9 h-9 rounded-full text-violet-600 bg-violet-50" type="button" aria-label="Like"> --}}
{{-- q: how to make this image a button that is adding offer to wishlist --}}

        <a href="/watch/{{ $offer->id }}"><img class="dark:invert" src="@if($offer->watched==true)fav.svg @else nfav.svg @endif" alt="favourite" class="w-5 h-5"></a>
      {{-- </button> --}}
    </div>

  </form>
</div>
</div>
