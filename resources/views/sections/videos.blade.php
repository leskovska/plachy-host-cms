<section id="videos"
         :class="{ 'hidden' : active_tab != 'videos' }"
         class="justify-evenly bg-section_brown flex flex-wrap gap-y-10 py-5 px-8 text-white md:px-10 md:py-12">
    @foreach($videos as $video)
        <div class="max-w-2xl">
            <h3>{{ $video->title ?? "" }}</h3>
                <iframe width="560" height="315" class="w-full aspect-video"
                        src="https://www.youtube-nocookie.com/embed/{{ $video->slug }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
        </div>
    @endforeach
</section>
