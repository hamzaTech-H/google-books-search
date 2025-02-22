<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">{{ $book['volumeInfo']['title'] ?? 'Unknown Title' }}</h1>
            @if(isset($book['volumeInfo']['authors']))
            <p class="text-lg text-gray-600">By {{ implode(', ', $book['volumeInfo']['authors']) }}</p>
            @endif
        </section>

        <div class="grid md:grid-cols-2 gap-10">
            <div class="flex justify-center">
                @if(isset($book['volumeInfo']['imageLinks']['medium']))
                <img src="{{ $book['volumeInfo']['imageLinks']['medium'] }}" alt="Book Cover" class="w-[120] h-[400px] object-cover rounded-lg shadow-lg">
                @elseif(isset($book['volumeInfo']['imageLinks']['thumbnail']))
                <img src="{{ $book['volumeInfo']['imageLinks']['thumbnail'] }}" alt="Book Cover" class="w-[120] h-[400px] object-cover rounded-lg shadow-lg">
                @else
                <p class="text-gray-500">No Image Available</p>
                @endif
            </div>

            <div class="space-y-4">
                @if(isset($book['volumeInfo']['publisher']))
                <p><strong>Publisher:</strong> {{ $book['volumeInfo']['publisher'] }}</p>
                @endif

                @if(isset($book['volumeInfo']['publishedDate']))
                <p><strong>Published Date:</strong> {{ $book['volumeInfo']['publishedDate'] }}</p>
                @endif

                @if(isset($book['volumeInfo']['pageCount']))
                <p><strong>Pages:</strong> {{ $book['volumeInfo']['pageCount'] }}</p>
                @endif

                @if(isset($book['volumeInfo']['categories']))
                <p><strong>Categories:</strong> {{ implode(', ', $book['volumeInfo']['categories']) }}</p>
                @endif

                @if(!empty($book['volumeInfo']['description']))
                <div class="max-h-60 overflow-y-auto">
                    <p class="text-gray-700"><strong>Description:</strong> {{ $book['volumeInfo']['description'] }}</p>
                </div>
                @endif

                @if(isset($book['volumeInfo']['previewLink']))
                <a href="{{ $book['volumeInfo']['previewLink'] }}" target="_blank" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">Preview on Google Books</a>
                @endif
            </div>
        </div>
    </div>
</x-layout>