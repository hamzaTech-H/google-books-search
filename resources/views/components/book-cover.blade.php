@props(['imageUrl', 'width' => 90])

<img src="{{ asset($imageUrl) }}" alt="" class="rounded-xl" width="{{ $width }}" >