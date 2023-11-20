<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Event;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getEvents() {
        $events = Event::all();

        return view('esemenynaptar', compact(['events']));
    }
}
