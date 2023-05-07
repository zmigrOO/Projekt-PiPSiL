@props(['options', 'name'])
<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <select id="{{$name}}" name="{{$name}}"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        required>
        <option value="" disabled selected> </option>
        @foreach ($options as $option)
            <option value="@if(isset($option->id)){{ $option->id }}">{{$option->name}} @else {{$option}}">{{ $option }}@endif</option>
        @endforeach
    </select>
</div>
