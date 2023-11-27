<x-guest-layout>
    <section class="overflow-hidden">
        <div class="parallax-image">
            <img class="imageWithBg" src="{{ URL::asset('images/covers/makett-hatterrel.jpeg') }}" />
            <h2 class="main-title boldPoppins">Szarvasi Kacsa-tó</h2>
            <img class="imageWithoutBg" src="{{ URL::asset('images/covers/makett.png') }}" />
        </div>
        <div class="content py-8">
            <div class="content-images">
                <h2 class="text-center text-2xl boldPoppins">Lorem Ipsum dolor et</h2>
            </div>
        </div>
    </section>

    <script>
        let controller = new ScrollMagic.Controller();
        let timeline = new TimelineMax();

        timeline
            .to(".imageWithoutBg", 3, { y: -300 })
            .fromTo(".main-title", { scale:  1}, {scale: 3}, '-=3')
            .to(".main-title", { left:  '50%'}, '-=3')
            .to(".main-title", { top:  '20%'}, '-=3')
            .fromTo(".imageWithBg", { y: 0 }, {y: 0 }, "-=3")
            .to(".content", 3, { top: '0%'},  '-=3');

            let scene = new ScrollMagic.Scene({
                triggerElement: "section",
                duration: "100%",
                triggerHook: 0,
            }).setTween(timeline).setPin('section').addTo(controller);
    </script>
</x-guest-layout>
