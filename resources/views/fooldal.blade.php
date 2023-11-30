<x-guest-layout>
    <section class="w-full relative">
        <div class="">
            <div class="h-screen w-full" x-data="{
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
                        <h1 class="text-6xl text-white tracking-wider font-bold items-center justify-center">Kacsa tó</h1>
                    </div>
                    
                        <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 1"
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
                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 4"
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
                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 6"
                        x-transition:enter="transition ease-in-out duration-1000 transform"
                        x-transition:enter-start="-translate-x-5 opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0142.jpg') }}" alt="Kosárlabdapálya Szarvason">
                    <img class="absolute w-full h-full object-cover object-center" x-show="activeSlide === 7"
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
            <div class="w-full container mx-auto my-24 flex flex-wrap">
                <div class="w-full mb-24">
                    <div class="flex flex-wrap">
                        <div class="w-1/2">
                            <img class="rounded-3xl" src="{{ asset('/images/covers/kacsatoprojekt1.jpg') }}"
                                alt="">
                        </div>
                        <div class="pl-4 w-1/2">
                            <h1 class="text-blue-400 font-semibold text-4xl">Szarvasi Kacsa tó</h1>
                            <p class="mt-6">Szarvasi kacsatóról pár mondat, helyszín rövid bemutatása.....</p>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full mb-6">
                            <h2 class="text-blue-400 font-semibold text-4xl">Kacsa tó megközelíthetősége</h2>
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
            </div>
        </div>
        <div class="fixed bottom-0 right-0">
            <img class="max-h-52" src="{{URL::asset('images/fooldal/szechenyi-ka.png')}}" alt="">
        </div>
    </section>
</x-guest-layout>
