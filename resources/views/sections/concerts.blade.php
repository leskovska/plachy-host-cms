@if($concerts)
<section id="concerts" class="bg-yellow-800/70 flex flex-wrap justify-center gap-y-10 py-5 px-8 m-5
        border-solid border-yellow-600/50 border-2 rounded text-white
        md:px-10 md:mx-10 md:py-12 md:mx-20 lg:mx-40">
    <div class="flex flex-col gap-y-16">
        @foreach($concerts as $concert)
            <div class="">
                <p class="font-bold">{{ \Carbon\Carbon::parse($concert->date)->format('j. n. Y') }}</p>
                <p class="font-bold">{{ $concert->title }}</p>
                {{ $concert->getFirstMedia('concerts') }}
            </div>
        @endforeach
    </div>
</section>
@endif
