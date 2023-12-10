<x-guest-layout>
    <div class="container mx-auto flex min-h-screen flex-col pt-[100px]">
        <h1 class="text-greenText font-bold boldPoppins text-2xl">Galéria</h1>
        <div class="w-full py-10 border-b px-2">
            <h2 class="font-bold text-xl mb-4">Szarvas Kacsa tó projekt</h2>
            <div class="aspect-video w-1/2">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/iAJck_kZ5a8" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        @foreach ($albums as $album)
            <div x-data="{
                imageGalleryOpened: false,
                imageGalleryActiveUrl: null,
                imageGalleryImageIndex: null,
                imageGallery: [],
                imageGalleryOpen(event) {
                    this.imageGalleryImageIndex = event.target.dataset.index;
                    this.imageGalleryActiveUrl = event.target.src;
                    this.imageGalleryOpened = true;
                },
                imageGalleryClose() {
                    this.imageGalleryOpened = false;
                    setTimeout(() => this.imageGalleryActiveUrl = null, 300);
                },
                imageGalleryNext(){
                    this.imageGalleryImageIndex = (this.imageGalleryImageIndex == this.imageGallery.length) ? 1 : (parseInt(this.imageGalleryImageIndex) + 1);
                    this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
                },
                imageGalleryPrev() {
                    this.imageGalleryImageIndex = (this.imageGalleryImageIndex == 1) ? this.imageGallery.length : (parseInt(this.imageGalleryImageIndex) - 1);
                    this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
                }
            }"
            @image-gallery-next.window="imageGalleryNext()"
            @image-gallery-prev.window="imageGalleryPrev()"
            @keyup.right.window="imageGalleryNext();"
            @keyup.left.window="imageGalleryPrev();"
            x-init="imageGallery = JSON.parse(decodeURIComponent('{!! htmlspecialchars(json_encode($album->imageUrls)) !!}'))"
            class="w-full h-full select-none mb-8">
                <h2 class="font-bold text-xl mb-4">{{ $album->album_name }}</h2>
                <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
                    <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
                        <template x-for="(image, index) in imageGallery">
                            <li><img x-on:click="imageGalleryOpen" :src="image" :data-index="index+1" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"></li>
                        </template>
                    </ul>
                </div>
                <template x-teleport="body">
                    <div
                    x-show="imageGalleryOpened"
                    x-transition:enter="transition ease-in-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:leave="transition ease-in-in duration-300"
                    x-transition:leave-end="opacity-0"
                    @click="imageGalleryClose"
                    @keydown.window.escape="imageGalleryClose"
                    x-trap.inert.noscroll="imageGalleryOpened"
                    class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out" x-cloak>
                        <div class="relative flex items-center justify-center w-11/12 xl:w-4/5 h-10/12">
                            <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')" class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            </div>
                            <div class="h-screen flex flex-col pb-20">
                                <h2 class="text-xl py-4 font-bold text-white text-center">{{$album->album_name}}</h2>
                                <img
                                x-show="imageGalleryOpened"
                                x-transition:enter="transition ease-in-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-50"
                                x-transition:leave="transition ease-in-in duration-300"
                                x-transition:leave-end="opacity-0 transform scale-50"
                                class="object-contain object-center w-full h-full select-none cursor-zoom-out" :src="imageGalleryActiveUrl" alt="" style="display: none;">
                            </div>
                            
                            <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');" class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        @endforeach
    </div>

</x-guest-layout>
