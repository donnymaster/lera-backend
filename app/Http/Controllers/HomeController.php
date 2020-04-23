<?php

namespace App\Http\Controllers;

// use Alaouy\Youtube\Facades\Youtube;
use Alaouy\Youtube\Youtube;
use Illuminate\Http\Request;
use App\Services\ServiceYoutube;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(ServiceYoutube::getStatusBroadcast('https://www.youtube.com/watch?v=lD6bmfelOIs'));
        // $youtube = new Youtube('AIzaSyB6lRUeS2fapblNl7K0-5bsFIRsSk0NNI0');
        // dd($youtube->getVideoInfo('9cYAvs9RrbA')->snippet);
        return view('user-side.index');
    }
}
