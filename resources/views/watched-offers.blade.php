<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('watched_offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($offers as $offer)
                        <x-offer :offer="$offer" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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
                        img.classList.remove('opacity-0');
                        // console.log('fav.svg');
                    } else {
                        img.classList.add('opacity-0');
                        // console.log('nfav.svg');
                    }
                });
        }

</script>
