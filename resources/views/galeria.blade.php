<x-guest-layout>
    <div class="container mx-auto flex min-h-screen flex-col pt-[100px]">
        <h1 class="text-blue-400 font-bold boldPoppins text-2xl">Galéria</h1>
        @foreach ($albums as $album)
            <div x-data="{ openModal: false, images: [], currentImgIndex: 0, currentTitle: '{{ addslashes($album->album_name) }}' }" x-init="images = JSON.parse(decodeURIComponent('{!! htmlspecialchars(json_encode($album->imageUrls)) !!}'))" class="py-10 border-b px-2">
                <h2 class="font-bold text-xl mb-4">{{ $album->album_name }}</h2>
                <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-5">
                    @foreach ($album->imageUrls as $index => $imageUrl)
                        <img class="object-cover object-center aspect-[4/3]" src="{{ $imageUrl }}" alt=""
                            @click="openModal = true; currentImgIndex = {{ $index }};">
                    @endforeach
                </div>

                <div x-show="openModal"
                    class="z-[400] fixed top-0 left-0 bottom-0 h-screen w-screen backdrop-blur-sm bg-black/70"
                    id="modalScrollable" tabindex="-1" aria-labelledby="modalScrollableLabel" aria-hidden="true">

                    <div class="sm:h-[calc(100%-3rem)] w-full relative py-6 px-4 mx-auto">
                        <div
                            class="border-none shadow-lg flex flex-col w-full rounded-md">
                            <div class="flex justify-between items-center justify-center p-4 rounded-t-md">
                                <h5 x-text="currentTitle" class="text-2xl text-white text-center"
                                    id="modalScrollableLabel">
                                </h5>

                                <button @click="openModal = false" id="modalButton" type="button"
                                    class="text-white font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex w-full justify-between mb-10">
                                <div class="flex items-center w-full h-full justify-between gap-4 container mx-auto">
                                    <div class="w-16">
                                        <button x-show="currentImgIndex > 0"
                                            @click="currentImgIndex = (currentImgIndex - 1 + images.length) % images.length"
                                            class="prev-button text-white font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div id="modalContent" class="image-container">
                                        <img x-bind:src="images[currentImgIndex]" class="modal-image" alt="">
                                    </div>

                                    <div class="w-10">
                                        <button x-show="currentImgIndex < images.length - 1"
                                            @click="currentImgIndex = (currentImgIndex + 1) % images.length"
                                            class="next-button text-white font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-guest-layout>
