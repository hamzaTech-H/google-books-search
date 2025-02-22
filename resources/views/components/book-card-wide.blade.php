@props(['book', 'bookId'])

<div class="p-4 bg-white/5 rounded-xl flex gap-x-6 border border-transparent hover:border-blue-800 group transition-colors duration-300">

    <div class="w-[120px] h-[150px] shrink-0 bg-gray-200 rounded-md overflow-hidden flex items-center justify-center">
        @if(!empty($book['imageLinks']['smallThumbnail']))
            <img src="{{ $book['imageLinks']['smallThumbnail'] }}" alt="{{ $book['title'] }}" class="w-full h-full object-cover">
        @else
            <span class="text-sm text-gray-500">No Image</span>
        @endif
    </div>

    <div class="flex flex-col justify-between flex-1 py-2">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            <a href="/books/{{ $bookId }}" target="_blank">{{ $book['title'] }}</a>
        </h3>
        <div class="mt-4 text-sm line-clamp-3">
         Authors : {{ isset($book['authors']) ? implode(', ', $book['authors']) : 'No author available.' }}
        </div>
        <div class="mt-4 text-sm line-clamp-3">
        Description : {{ $book['description'] ?? 'No description available.' }}
        </div>
    </div>
</div>
