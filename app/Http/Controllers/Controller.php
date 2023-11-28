<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Event;
use App\Models\Album;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getEvents() {
        $events = Event::all();
        
        $kacsatavi = Event::where('category', 'kacsato')->get();

        $szarvas = $events->filter(function($event) {
            return $event['category'] === 'szarvas';
        });

        $cervinus = $events->filter(function($event) {
            return $event['category'] === 'cervinus';
        });

        return view('esemenynaptar', compact(['events', 'kacsatavi', 'szarvas', 'cervinus']));
    }

    public function getAlbums() {
        $photos = Album::all();

        $albums = Album::select('album_name')->distinct()->get();

        foreach ($albums as $album) {
            $album->imageUrls = $photos->where('album_name', $album->album_name)
                                       ->pluck('filepath')
                                       ->map(function ($path) {
                                           return URL::asset('storage/' . $path);
                                       })
                                       ->toArray();
        }

        return view('galeria', compact(['photos', 'albums']));
    }

    public function getSzarvasImages() {
        $images = [
            'images/covers/001.JPG',
            'images/covers/002.jpeg',
            'images/covers/003.jpeg',
            'images/covers/004.jpg',
            'images/covers/005.jpeg',
            'images/covers/006.jpg',
            'images/covers/007.jpg',
            'images/covers/008.jpg',
            'images/covers/009.jpg',
            'images/covers/010.jpg',
            'images/covers/011.jpg',
            'images/covers/012.jpg',
            'images/covers/013.jpeg',
            'images/covers/014.jpg',
            'images/covers/015.jpeg',
            'images/szarvas-latnivalok/20231123-DSC_0001.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0003.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0004.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0017.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0019.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0026.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0033.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0038.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0044.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0046.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0055.jpg',
            'images/szarvas-latnivalok/20231123-DSC_0071.jpg', 
            'images/szarvas-latnivalok/20231123-DSC_0076.jpg',
            'images/szarvas-latnivalok/20231123-DSC_0085.jpg',
            'images/szarvas-latnivalok/20231123-DSC_0096.jpg',
            'images/szarvas-latnivalok/20231123-DSC_0097.jpg',
        ];

        return view('szarvas-latnivalok', compact(['images']));
    }
}
