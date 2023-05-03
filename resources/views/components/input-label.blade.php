@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-teal-500 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
