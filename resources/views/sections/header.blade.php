<div class="relative">
    <header class="absolute w-full bottom-0 bg-black/50">
        <nav class="sticky text-white text-md font-medium tracking-tighter uppercase font-semibold">
            <ul class="flex flex-row flex-wrap items-center place-content-evenly gap-1 m-2 md:gap-5 md:place-content-start md:mx-10 md:my-3 md:text-xl">
                <li class="hover:text-logo hover:cursor-pointer"
                    :class="{ 'text-logo' : active_tab === 'main' }">
                    <a x-on:click="active_tab = 'main'">Kdo jsme</a>
                </li>
                <li class="hover:text-logo hover:cursor-pointer"
                    :class="{ 'text-logo' : active_tab === 'concerts' }">
                    <a x-on:click="active_tab = 'concerts'">Koncerty</a>
                </li>
                <li class="hover:text-logo hover:cursor-pointer"
                    :class="{ 'text-logo' : active_tab === 'videos' }">
                    <a x-on:click="active_tab = 'videos'">Videa</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="absolute top-4 left-0 right-0 sm:top-8 lg:top-16">
        <div class="flex flex-row items-center place-content-end mr-8 gap-2 lg:gap-4">
            <img src="/images/logo.png" alt="logo" class="h-6 sm:h-8 lg:h-12">
            <span class="text-white tracking-wider text-xl sm:text-2xl md:text-3xl lg:text-4xl">Plachý host</span>
        </div>
    </div>
    @if($introduction)
        {{ $introduction->getFirstMedia('introduction') }}
    @endif
</div>
