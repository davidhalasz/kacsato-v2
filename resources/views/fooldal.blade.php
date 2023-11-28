<x-guest-layout>
    <section class="overflow-hidden">
        <div class="parallax-image">
            <img class="imageWithBg" src="{{ URL::asset('images/covers/makett-hatterrel.jpeg') }}" />
            <h2 class="main-title boldPoppins">Szarvasi Kacsa-tó</h2>
            <img class="imageWithoutBg" src="{{ URL::asset('images/covers/makett.png') }}" />
        </div>
        <div class="content">
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

            setInterval(nextSlide, 3000); // Change image every 3 seconds
        });
    </script>
</x-guest-layout>
