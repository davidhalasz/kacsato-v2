<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Event;
use App\Models\Album;

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

        return view('galeria', compact(['photos', 'albums']));
    }
}
