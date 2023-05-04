<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new offer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action='/submit-new'>
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')" required
                                          autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')"/>
                            <select id="category" name="category" class="block mt-1 w-full" required>
                                <option value="" disabled selected> </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')"/>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                          :value="old('description')" required/>
                            <div class="mt-2 text-sm text-gray-500">
                                <span id="description-counter">0</span> / 50 characters entered
                            </div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>

                        <script>
                            const descriptionInput = document.querySelector('#description');
                            const descriptionCounter = document.querySelector('#description-counter');

                            descriptionInput.addEventListener('input', () => {
                                const descriptionLength = descriptionInput.value.length;
                                const remainingChars = 50 - descriptionLength;
                                descriptionCounter.textContent = descriptionLength;
                                descriptionCounter.style.color = remainingChars >= 0 ? '' : '#009917';
                                descriptionInput.setCustomValidity(remainingChars < 0 ? '' : `Please enter at least ${remainingChars} more characters`);
                            });
                        </script>

                        <!-- Condition -->
                        <div class="mt-4">
                            <x-input-label for="condition" :value="__('Condition')"/>
                            <select id="condition" name="condition" class="block mt-1 w-full" required>
                                <option value="" disabled selected> </option>
                                <option value="brand_new" {{ old('condition') === 'brand_new' ? 'selected' : '' }}>Brand New</option>
                                <option value="good" {{ old('condition') === 'good' ? 'selected' : '' }}>Good</option>
                                <option value="used" {{ old('condition') === 'used' ? 'selected' : '' }}>Used</option>
                            </select>
                            <x-input-error :messages="$errors->get('condition')" class="mt-2"/>
                        </div>

                        <!-- Quantity -->
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('Quantity')"/>
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity"
                                          :value="old('quantity')" required/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')"/>
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" min="1"
                                          name="price" :value="old('price')" required/>
                            <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
