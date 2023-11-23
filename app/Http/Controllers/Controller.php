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
}
