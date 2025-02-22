<x-layout>
    <div class="space-y-10">

        <section class="pt-6">
            <div class="flex items-center space-x-4 justify-center">

                <h1 class="font-bold text-4xl">Let's Find Your Book</h1>
                <x-search-tooltip/>
            </div>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Search freely or narrow results with Search Tips!" />
            </x-forms.form>
        </section>


        <section>
            <x-section-heading>Subjects</x-section-heading>
            <div class="mt-6 space-x-2">
                @foreach($subjects as $subject)
                <x-tag :subject="$subject" />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>