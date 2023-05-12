<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
<!-- Location change element -->
<div {!! $attributes->merge(['class' => 'float-left relative -translate-x-2']) !!}>
    <select onchange="location.href=this.value" name="lang" id="lang"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        <option on value="{{ asset('/setlocale/pl') }}" @if (app()->getLocale() == 'pl') selected @endif>pl</option>
        <option value="{{ asset('/setlocale/en') }}" @if (app()->getLocale() == 'en') selected @endif>en</option>
    </select>
</div>
