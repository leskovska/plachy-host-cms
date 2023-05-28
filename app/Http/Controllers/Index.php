<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Introduction;
use App\Models\Video;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $introduction = Introduction::latest()->first();
        $concerts = Concert::all();
        $videos = Video::all();
        return view('index', [
            'introduction' => $introduction,
            'concerts' => $concerts,
            'videos' => $videos,
        ]);
    }
}
