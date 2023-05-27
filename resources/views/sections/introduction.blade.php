@if($introduction_text)
<section id="main" class="bg-yellow-800/70 flex flex-wrap justify-center gap-y-10 py-5 px-8 m-5
        border-solid border-yellow-600/50 border-2 rounded text-white
        md:px-10 md:mx-10 md:py-12 md:mx-20 lg:mx-40">
    <div class="text-white">
        {!! $introduction_text !!}
    </div>
</section>
@endif
