@props(['options'])

@foreach ($options as $option)
    <input value="{{ $option }}" {{!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}}>
    <label for="{{ $option }}" class="font-medium text-sm text-gray-700" > {{ $option }} </label>
@endforeach