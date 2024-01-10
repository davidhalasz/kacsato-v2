<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Event;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getEvents() {
        $currentDate = now()->toDateString();

        $currentDate = now()->toDateString();

        $events = Event::where(function ($query) use ($currentDate) {
            $query->whereNotNull('end_date')
                ->whereDate('start_date', '<=', $currentDate)
                ->whereDate('end_date', '>=', $currentDate);
        })
        ->orWhereDate('start_date', '>=', $currentDate)
        ->get();
        
        
        $kacsatavi = $events->filter(function($event) {
            return $event['category'] === 'kacsato';
        });

        $szarvas = $events->filter(function($event) {
            return $event['category'] === 'szarvas';
        });

        $cervinus = $events->filter(function($event) {
            return $event['category'] === 'cervinus';
        });


        return view('esemenynaptar', compact(['events', 'kacsatavi', 'szarvas', 'cervinus']));
    }

    public function getAlbums() {
        $albums = Album::with('images')->get();

        foreach ($albums as $album) {
            $album->imageUrls =  $album->images->map(function ($data) {
                                           return URL::asset('storage/' . $data->filepath);
                                       })
                                       ->toArray();
        }

        return view('galeria', compact(['albums']));
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


        $imageURLs = [];

        foreach ($images as $image) {
            array_push($imageURLs, URL::asset($image));
        }

        return view('szarvas-latnivalok', compact(['imageURLs']));
    }
}
