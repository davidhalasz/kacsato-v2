<x-guest-layout>
    <section class="mt-[64px] w-full relative">
        <div class="">
            <div class="hero-image" x-data="{
                activeSlide: 1,
                slides: [1, 2, 3, 4, 5, 6, 7],
                init() {
                    setInterval(() => {
                        if (this.activeSlide < this.slides.length) {
                            this.activeSlide++;
                        } else {
                            this.activeSlide = 1;
                        }
                    }, 4000);
                }
            }">
                <div class="w-full h-full relative flex">

                    <div class="z-20 self-center items-center justify-content-center text-center mx-auto p-4">
                        <h1 class="text-6xl text-white tracking-wider font-bold items-center justify-center">Kacsa tó
                        </h1>
                    </div>

                    <img class="absolute w-full h-full object-cover object-bottom" x-show="activeSlide === 1"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0062.jpg') }}" alt="Kőrös folyó csónakkal">


                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 2"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0114.jpg') }}" alt="Kacsa tó ősszel">
                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 3"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0119.jpg') }}" alt="Kacsa tó">
                    <img class="absolute w-full h-full object-cover object-bottom" x-show="activeSlide === 4"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0130.jpg') }}" alt="Csigaház a tenyeren">
                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 5"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0136.jpg') }}" alt="Járdaút Szavason">
                    <img class="absolute w-full h-full object-cover object-top" x-show="activeSlide === 6"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0142.jpg') }}" alt="Kosárlabdapálya Szarvason">
                    <img class="absolute w-full h-full object-cover object-top" x-show="activeSlide === 7"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0160.jpg') }}"
                        alt="Kacsa tó, háttérben házakkal">
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full container mx-auto my-24 flex flex-wrap px-2">
                <div class="w-full mb-24">
                    <div  id="rolunk">
                        <h1 class="text-greenText font-semibold text-xl md:text-4xl">Szarvasi Kacsa tó</h1>
                        <div class="grid grid-cols-3 gap-8">
                            <div class="col-span-3 md:col-span-2">
                                <p class="mt-6">A Kacsa tó egy mesterséges tó Magyarországon, a Békés vármegyei Szarvas
                                    város közigazgatási területén.</p>
                                <p class="mt-4">Szarvas város legfrekventáltabb idegenforgalmi célterülete mellett a Holt-Körös
                                    partvonalától csupán pár méterre helyezkedik el a Kacsa tó. Jelentős, 8000 m2-es
                                    területe számos növény és állatfajnak nyújt menedéket. A tóba a terület átadásával
                                    együtt a Holt-Körösben is honos halak kerülnek betelepítésre: kárász, keszeg,
                                    törpeharcsa, csuka, busa és ponty.</p>
                                <p class="mt-4">A tóban fürödni és horgászni nem engedélyezett, védve ezzel a halállományt és a halak
                                    ívóhelyeit. A környezet kialakításánál, növények telepítésénél fontos szempont volt,
                                    hogy a helyieket és az ide látogatókat is egy természetközeli hely fogadja, mely
                                    lehetőséget nyújt a madarak és a víziállatok tanulmányozására, megfigyelésére.</p>
                                <p class="mt-4">
                                    A terület ugyan hosszú múltra tekint vissza, mégsem volt eddig teljes mértékben
                                    kihasználva. A TOP-1-2.1-16-BS1-2020-00011 „Fenntartható turizmusfejlesztés Szarvason –
                                    a Kacsa tó és környezetének komplex fejlesztése” című projekt keretein belül a Kacsa tó
                                    és környezete egy komplex turisztikai attrakcióbővítésen esik át. A település elsődleges
                                    húzóereje az aktív turizmus, elsődleges látogatócsoportja pedig a kis- és nagyobb
                                    gyermekes családok, valamint a fiatal párok. A Kacsa tó és környezete, valamint a
                                    „teknős” rendezvénycsarnok, optimális elhelyezkedése és kialakítása miatt képes széles
                                    körben megszólítani a településre érkező vendégeket: helyszínt biztosít olyan programok
                                    és rendezvények számára, mely a kisgyermekektől kezdve egészen az idősebb generációig
                                    szinte mindenkit érdekel. A fejlesztés célja a meghatározott célcsoportok (kis- és
                                    nagyobb gyermekes családok; fiatal párok; diákcsoportok, osztálykirándulók), valamint a
                                    helyi- és környékbeli lakosság igényeinek kielégítése, kiszolgálása
                                    termékösszekapcsolásokkal: előadások, tudományos előadások, kiállítások, vásárok,
                                    gyermekeknek szánt programok és rendezvények által, mindezt a célcsoporttípusnak
                                    megfelelő kommunikációs csatornán keresztül. A park újragondolása során fontos szempont
                                    volt egy modern, új játszótér, továbbá a felnőttekre is gondolva egy fitneszpark
                                    kialakítása
                                </p>
                                <p class="mt-4">
                                    A városunk fő elhivatottsága az, hogy az itt élők és az idelátogatók minél kellemesebb
                                    környezetben tudják a szabadidejüket eltölteni.
                                </p>
                                <p class="mt-4">
                                    Látogasson el hozzánk!
                                </p>
                            </div>
                            <div class="col-span-3 md:col-span-1 flex flex-col w-full gap-8">
                                <img class="rounded-md w-full object-fit" src="{{URL::asset('/images/covers/kacsatoprojekt1.jpg')}}" alt="Kacsa tó látványterve 1">
                                <img class="rounded-md w-full object-fit" src="{{URL::asset('/images/covers/kacsatoprojekt2.jpg')}}" alt="Kacsa tó látványterve 2">
                                <img class="rounded-md w-full object-fit" src="{{URL::asset('/images/covers/kep4.jpg')}}" alt="Kacsa tó látványterve 2">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="w-full mb-24">
                    <div class="flex flex-wrap gap-4">
                        <div id="megkozelites" class="w-full mb-6">
                            <h2 class="text-greenText font-semibold text-xl md:text-4xl">Kacsa tó megközelíthetősége</h2>
                            <p class="mt-4">Budapesttől 165, Békéscsabától 47 kilométerre, a Hármas-Körös holtágának
                                partján (kákafoki holtág)
                                fekszik Szarvas város. A Kacsa tó a város nyugati felén, a (Szarvasi) Holt-Körös mellett
                                helyezkedik el
                                az Üdülő sétánynál. <br> <br>
                                - Autóval a Nyárfa utcai játszótérig tudunk behajtani. <br>
                                - Tömegközlekedés: a Szabadság úton elhelyezkedő Szarvas, főiskola buszmegálló
                                megállóhely felől gyalog mintegy 250 -re északra található
                            </p>
                        </div>
                        <div class="w-full">
                            <img class="rounded-sm" src="{{ URL::asset('/images/fooldal/megerkezes.jpg') }}"
                                alt="Kacsa tó megközelíthetősége">
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <div class="flex flex-wrap gap-4">
                        <div id="parkolas" class="w-full mb-6">
                            <h2 class="text-greenText font-semibold text-xl md:text-4xl">Parkolás</h2>
                            <p class="mt-4">Az idelátogatók ingyenesen igénybe vehetik az üdülősétányon 34 db és a Strand utcában 3 db parkolót. További parkolási lehetőségek kialakítása várható a közelben 2024-ben.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed bottom-0 right-0">
            <img class="max-h-52" src="{{ URL::asset('images/fooldal/szech-logo.png') }}" alt="">
        </div>
    </section>
</x-guest-layout>
