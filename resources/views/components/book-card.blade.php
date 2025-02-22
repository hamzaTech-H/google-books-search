@props(['book'])

<div class='p-4 bg-white/5 rounded-xl flex flex-col items-center text-center border border-transparent hover:border-blue-800 group transition-colors duration-300'>
    
    <div class="mt-4">
        <x-book-cover :imageUrl="$book['image_link']" :width="100"/>
    </div>


    <div class="py-4">
        <h3 class="group-hover:text-blue-600 text-l font-bold transition-colors duration-300 line-clamp-2">
            <a href="{{ $book['previewLink'] }}" target="_blank">{{ $book['title'] }}</a>
        </h3>
        
    </div>

</div>
