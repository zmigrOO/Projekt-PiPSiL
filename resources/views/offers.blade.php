<x-no-auth>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('all_offers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($attributes['offers'] as $offer)
                        <x-offer :offer="$offer" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div
        class="fixed bottom-2 left-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-fit w-fit">
        <a class="cursor-pointer" onclick="openFiltersTab()">
            <img class="dark:invert m-2" src="filter.svg" alt="search">
        </a>
    </div>
    <div id="filters" class="fixed left-0 top-0 w-screen h-screen sm:w-4/12 bg-gray-50 opacity-90 dark:bg-gray-800 -translate-x-full transition-all">
        <div
            class="absolute bottom-2 left-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-fit w-fit">
            <a class="cursor-pointer" onclick="closeFiltersTab()">
                <img class="dark:invert m-2" src="filter_none.svg" alt="search">
            </a>
        </div>
        <div class="w-full p-6 mt-16">
            <h2 class="text-lg font-bold mb-2 dark:text-white">Filters</h2>

            <h3 class="text-sm font-semibold dark:text-white">Categories</h3>
            @foreach ($attributes['categories'] as $category)
            <label class="flex items-center dark:text-white">
                <input type="checkbox" name="category[]" value="{{$category->id}}" class="mr-1 dark:text-white">
                <span class="text-sm dark:text-white">{{$category->name}}</span>
            </label>
            @endforeach


            <h3 class="text-sm font-semibold mt-4 dark:text-white">Price</h3>
            <x-input-label for="price_min" :value="__('From:')" />
            <x-text-input name="price_min" type="number" step="0.01" placeholder="From" class="w-1/2" />
            <x-input-label for="price_max" :value="__('To:')" />
            <x-text-input name="price_max" type="number" step="0.01" placeholder="To" class="w-1/2" />

            <h3 class="text-sm font-semibold mt-4 dark:text-white">Condition</h3>
            @foreach ($attributes['conditions'] as $condition)
            <label class="flex items-center dark:text-white">
                <input type="checkbox" name="condition[]" value="{{$condition}}" class="mr-1 dark:text-white">
                <span class="text-sm dark:text-white">{{$condition}}</span>
            </label>
            @endforeach

        </div>

    </div>
    <script>
        function openFiltersTab() {
            document.getElementById('filters').classList.remove('-translate-x-full');
        }
        function closeFiltersTab() {
            document.getElementById('filters').classList.add('-translate-x-full');
        }
    </script>
</x-no-auth>
