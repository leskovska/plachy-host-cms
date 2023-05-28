@if($concerts)
    <section id="concerts"
             :class="{ 'hidden' : active_tab != 'concerts' }"
             class="bg-section_brown flex flex-col items-center gap-y-10 py-5 px-8 text-white md:px-10 md:py-12">
        @foreach($concerts as $concert)
            <div class="max-w-2xl">
                <h2 class="font-bold">{{ $concert->title }}</h2>
                <p class="font-bold">{{ \Carbon\Carbon::parse($concert->date)->format('j. n. Y') }}</p>
                {{ $concert->getFirstMedia('concerts') }}
            </div>
        @endforeach
    </section>
@endif
