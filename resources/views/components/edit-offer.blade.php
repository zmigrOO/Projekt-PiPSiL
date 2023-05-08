<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action='/edit/{{$offer->id}}'>
                        @csrf
                        <input type="hidden" name="id" value="{{$offer->id}}">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$offer->name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('category')" />
                            <x-select-option :options="$attributes['categories']" :current="$offer->category->name" :name="'category'" required />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('description')" />
                            <x-text-input onsubmit="descTrim()" id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="$offer->description" required />
                            <div class="mt-2 text-sm text-gray-500">
                                <span id="description-counter">0</span> / 50 {{__('characters_entered')}}
                            </div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <script>
                            function descTrim() {
                                descriptionInput.value = descriptionInput.value.trim();
                            }
                            const descriptionInput = document.querySelector('#description');
                            const descriptionCounter = document.querySelector('#description-counter');

                            descriptionInput.addEventListener('input', () => {
                                const descriptionLength = descriptionInput.value.trim().length;
                                const remainingChars = 50 - descriptionLength;
                                descriptionCounter.textContent = descriptionLength;
                                descriptionCounter.style.color = remainingChars > 0 ? '' : '#009917';
                                descriptionInput.setCustomValidity(remainingChars <= 0 ? '' :
                                    `Please enter at least ${remainingChars} more characters`);
                            });
                        </script>

                        <!-- Condition -->
                        <div class="mt-4">
                            <x-input-label for="condition" :value="__('condition')" />
                            <x-select-option :options="$attributes['conditions']" :current="$offer->condition" :name="'condition'" required />
                            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                        </div>

                        <!-- Quantity -->
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity" :value="$offer->quantity" required />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01"
                                min="1" name="price" :value="$offer->price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <!-- Phone number -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('phone number')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" placeholder="xxx-xxx-xxx" pattern="[0-9]{9}"
                                :value="$offer->phone_number" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                          </div>
                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city" :value="__('city')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                          :value="$offer->city" required autofocus autocomplete="city" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
