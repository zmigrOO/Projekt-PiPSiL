<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('my_offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (count($offers) === 0)
                        {{ __('dont_wait_add_first_offer') }}
                    @endif
                    @foreach ($offers as $offer)
                        <div class="mt-4">
                            <x-offer :offer="$offer"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
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
                    toggle.title = '{{ __('Deactivate') }}';
                } else {
                    img.src = 'activate.svg';
                    del.style.filter = 'grayscale(0%)';
                    toggle.title = '{{ __('Activate') }}';
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
</x-app-layout>
