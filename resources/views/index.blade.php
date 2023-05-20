<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plachý host</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-main bg-[-100px] sm:bg-left-top bg-no-repeat bg-fixed bg-cover">
        <header class="bg-slate-700 p-1 sticky w-full top-0 border-solid border-b-yellow-600/50 border-b-2">
            <nav class="text-white text-lg font-medium tracking-tighter uppercase">
                <ul class="flex flex-row flex-wrap items-center place-content-evenly gap-1 m-2
                           md:gap-5 md:place-content-start md:mx-10 md:my-3 md:text-xl">
                    <li><a href="/"><img src="/images/logo.png" alt="logo" class="h-8"></a></li>
                    <li class="hover:text-amber-500"><a href="#main">Plachý host</a></li>
                    <li class="hover:text-amber-500"><a href="#concerts">Koncerty</a></li>
                    <li class="hover:text-amber-500"><a href="#videos">Videa</a></li>
                </ul>
            </nav>
        </header>
        <section id="main">
            <div class="text-white">
                <h1>Plachý host</h1>
                <p>Akustická hudební vlna poezie všedního dne/noci.</p>
                <p>
                    Kapela autorsky převážně tvořena hudbou Martina Kostaše a poetickými texty Vlaďky Kudrnové, nemnoho
                    známé básnířky z Frýdku-Místku.
                    Působí v seskupení Pavel Kudrna - zpěv, kytara, Martin Kostaš - kytara,
                    Lukáš „Budha“ Krejčí - cajon a další perkuse, Radovan Leskovský - basa, Pavel Magnusek - Bicí
                </p>
                <p>
                    Zpěvák a hlas kapely <strong>Pavel Kudrna</strong>, bývalý zpěvák ostravských Starých blůz a pražsko-kosmopolitního
                    Volného stylu, vedeného Honzou Volným (kapela Vlasty Třešňáka), spolu s autorem a kytaristou
                    <strong>Martinem Kostašem</strong> (The Drinkers, Ženeva Dubská trio, Děti kapitána Morgana), hnáni touhou po autorském
                    sebevyjádření, oslovili další hudebníky k natočení alba Plachý host. Jako hosté tak byli přizváni Petr Kovařík –
                    kontrabas, baskytara, hammond organ, Ctibor Hliněnský – bicí, Ženeva Dubská, Jáno Sedal – hlasy.
                </p>
                <p>
                    Akustická hudební vlna poezie všedního dne/noci vás zve do svého prostoru, cestou skrz vrata kam
                    nikdo
                    nevchází, do skrytých zákoutí lidské duše, touhy, poezie a chtění, odkrývající stránku vědomí,
                    kterou
                    lze nazvat jen Plachý host.
                </p>
                <br>
                <h2>Proč na desce štěká pes?</h2>
                <p>
                    Chata v Beskydech předminulé léto, zkoušíme nový repertoár - znenadání u stolu pes, mele ocasem, tulí se
                    k nohám, známky na krku nemaje.
                    Odkládáme nástroje a vyhlížíme majitele, chodíme po okolních chalupách, ptáme se, voláme hlasem i telefonem.
                    Nic. Pes dostává vodu, kus jídla, lehá pod stůl a je v klidu.
                    Někdo vyřkne jméno Bára. Vnímá to. Hrajeme, blíží se večer, soumrak v srpnu, odcházíme do hostince.
                    Bára setrvává, leží na stejném místě do doby našeho pozdního návratu.
                    Ráno přijíždí chatař Petr - zachránce. Bára je spokojená, hlazená, přijatá........
                    byla s námi !
                </p>
            </div>
        </section>
        <section id="concerts">
            <div class="flex flex-col">
                <p class="font-bold">Přijďte na koncert 19. května 2023 v 19:00</p>
                <img src="/images/koncert.jpg" class="">
            </div>
        </section>
        <section id="videos"
                 class="justify-evenly">
            <div>
                <h2>Uvnitř</h2>
                <iframe class="w-full md:w-max"
                    src="https://www.youtube.com/embed/ht0770BHs1A?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            </div>
            <div>
                <h2>Živě Pjetka 15. 2. 2018</h2>
                <iframe class="w-full  md:w-80"
                    src="https://www.youtube.com/embed/efkrFccOQ3c?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            </div>
        </section>
        <footer></footer>
    </body>
</html>
