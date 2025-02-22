@props(['subject'])

@php
$classes = "bg-white/10 hover:bg-white/25 rounded-xl font-bold px-3 py-1 text-2xs";
@endphp

<a href="{{ url('/search?q=subject:' . strtolower($subject->value)) }}" class="{{ $classes }}"> 
    {{ $subject->value }} 
</a>