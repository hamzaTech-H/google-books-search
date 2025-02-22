<x-layout>

    <div class="space-y-10">
        <section class="pt-6">
            <div class="flex items-center space-x-4 justify-center">
                <h1 class="font-bold text-4xl">Let's Find Your Book</h1>
                <x-search-tooltip />
            </div>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Search freely or narrow results with Search Tips!" value="{{ request('q')}}" />
            </x-forms.form>
        </section>

        <form action="/search" method="GET" class="text-center">
            @foreach(request()->all() as $key => $value)
                @if($key !== 'orderBy' && $key !== 'printType') <!-- Prevent duplicate filter input -->
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach

            <label class="inline-flex items-center">
                <input type="checkbox" name="orderBy" value="newest" onchange="this.form.submit()"
                    {{ request('orderBy') == 'newest' ? 'checked' : '' }}>
                <span class="ml-2">Newest</span>
            </label>

            <label for="printType" class="ml-4">Filter by:</label>
            <select name="printType" id="printType" class="text-black" onchange="this.form.submit()">
                <option value="all" {{ request('printType') == 'all' ? 'selected' : '' }}>All</option>
                <option value="books" {{ request('printType') == 'books' ? 'selected' : '' }}>Books</option>
                <option value="magazines" {{ request('printType') == 'magazines' ? 'selected' : '' }}>Magazines</option>
            </select>
        </form>

        <x-page-heading>Results</x-page-heading>

        <div class="mt-6 space-y-3">
            @foreach($books as $book)
            <x-book-card-wide :book="$book['volumeInfo']" :bookId="$book['id']" />
            @endforeach
        </div>
        <div>
            {{ $books->links() }}
        </div>
    </div>

</x-layout>