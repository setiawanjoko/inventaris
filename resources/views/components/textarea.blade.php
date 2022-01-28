@props(['disabled' => false])

@php($defClass = ' border-gray-300 focus:border-indigo-300 focus:ring-indigo-200')

@error($attributes['name'])
    @php($defClass = ' border-rose-400 focus:border-rose-600 focus:ring-pink-200')
@enderror

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm focus:ring focus:ring-opacity-50' . $defClass]) !!}>{{ $slot }}</textarea>
