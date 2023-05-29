@if($introduction)
<section id="main"
         :class="{ 'hidden' : active_tab != 'main' }"
         class="bg-section_brown flex flex-wrap justify-center py-5 px-8 text-white
        md:px-10 md:py-12">
    <div class="text-white max-w-2xl">
        {!! $introduction->text !!}
    </div>
</section>
@endif
