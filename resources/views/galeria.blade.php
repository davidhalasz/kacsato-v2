<x-guest-layout>
    <div class="container mx-auto flex min-h-screen flex-col pt-[100px]">
        @foreach ($albums as $album)
            <div class="py-10 border-b">
                <h2 class="font-bold text-xl mb-4">{{ $album->album_name }}</h2>
                <div class="grid grid-cols-6 gap-5">
                    @foreach ($photos as $photo)
                        @if ($photo->album_name == $album->album_name)
                            <img class="object-cover object-center aspect-[4/3]"
                                src="{{ URL::asset('storage/' . $photo->filepath) }}" alt="" srcset="">
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
