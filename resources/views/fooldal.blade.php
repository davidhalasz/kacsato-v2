<x-guest-layout>
    <section class="overflow-hidden">
        <div class="parallax-image">
            <img class="imageWithBg" src="{{ URL::asset('images/covers/makett-hatterrel3.jpg') }}" />
            <h2 class="main-title boldPoppins text-blue-400">Szarvasi Kacsa-tó</h2>
            <img class="imageWithoutBg" src="{{ URL::asset('images/covers/makett2.png') }}" />
        </div>
        <div class="w-full content bg-gray-200">
            <div class="w-full container mx-auto my-24 flex flex-wrap">
                <div class="w-full mb-24">
                    <div class="flex flex-wrap">
                        <div class="w-1/2">
                            <img class="rounded-3xl" src="{{asset('/images/covers/kacsatoprojekt1.jpg')}}" alt="">
                        </div>
                        <div class="w-1/2">
                            <h1 class="text-blue-400 font-semibold text-4xl">Szarvasi Kacsa-tó</h1>
                            <p class="mt-6">Szarvasi kacsatóról pár mondat, helyszín rövid bemutatása.....</p>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex flex-wrap">
                        <div class="w-full mb-6">
                            <h2 class="text-blue-400 font-semibold text-4xl">Kacsató megközelíthetősége</h2>
                            <p class="mt-4">Budapesttől 165, Békéscsabától 47 kilométerre, a Hármas-Körös holtágának partján (kákafoki holtág) 
                                fekszik Szarvas város. A Kacsa tó a város nyugati felén, a (Szarvasi) Holt-Körös mellett helyezkedik el 
                                az Üdülő sétánynál. <br> <br>
                                - Autóval a Nyárfa utcai játszótérig tudunk behajtani. <br>
                                - Tömegközlekedés: a Szabadság úton elhelyezkedő Szarvas, főiskola buszmegálló megállóhely felől gyalog mintegy 250 -re északra található
                            </p>
                        </div>
                        <div class="w-full">
                            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1KJ3w1QaNJaClIUk0Fqr20aoC1OWnllE&ehbc=2E312F&noprof=1" width="100%" height="480"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="slider h-screen w-screen">
                <div class="slides w-full h-full">
                    <img class="w-full h-full object-cover object-center"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0062.jpg') }}" alt="Image 1">
                    <img class="w-full h-full object-cover object-center"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0114.jpg') }}" alt="Image 2">
                    <img class="w-full h-full object-cover object-center"
                        src="{{ URL::asset('images/fooldal/20231123-DSC_0119.jpg') }}" alt="Image 3">
                </div>
            </div>
        </div>
    </section>

    <script>
        let controller = new ScrollMagic.Controller();
        let timeline = new TimelineMax();

        timeline
            .to(".imageWithoutBg", 3, {
                y: -300
            })
            .fromTo(".main-title", {
                scale: 1
            }, {
                scale: 3
            }, '-=3')
            .to(".main-title", {
                left: '50%'
            }, '-=3')
            .to(".main-title", {
                top: '20%'
            }, '-=3')
            .fromTo(".imageWithBg", {
                y: 0
            }, {
                y: 0
            }, "-=3")
            .to(".content", 3, {
                top: '0%'
            }, '-=3');

        let scene = new ScrollMagic.Scene({
            triggerElement: "section",
            duration: "100%",
            triggerHook: 0,
        }).setTween(timeline).setPin('section').addTo(controller);

        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelector(".slides");
            const images = slides.getElementsByTagName("img");
            let index = 0;
            let translateX = 0;

            function nextSlide() {
                if (index < images.length - 1) {
                    index++;
                    translateX -= 100;
                } else {
                    index = 0;
                    translateX = 0;
                }
                slides.style.transform = `translateX(${translateX}%)`;
            }

            setInterval(nextSlide, 4000); // Change image every 3 seconds
        });
    </script>
</x-guest-layout>
