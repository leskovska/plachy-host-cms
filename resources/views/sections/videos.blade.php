<section id="videos"
         class="justify-evenly bg-yellow-800/70 flex flex-wrap gap-y-10 py-5 px-8 m-5
                border-solid border-yellow-600/50 border-2 rounded text-white
                md:px-10 md:mx-10 md:py-12 md:mx-20 lg:mx-40">
    @foreach($videos as $video)
        <div>
            <h2>{{ $video->title ?? "" }}</h2>
            <iframe class="w-full md:w-80"
                    src="https://www.youtube.com/embed/{{ $video->slug }}?rel=0&amp;showinfo=0" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
        </div>
    @endforeach
</section>
