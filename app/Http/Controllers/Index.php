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
        $introductionText = Introduction::latest()->first() ? Introduction::latest()->first()->value('text') : '';
        $concerts = Concert::all();
        $videos = Video::all();
        return view('index', [
            'introduction_text' => $introductionText,
            'concerts' => $concerts,
            'videos' => $videos,
        ]);
    }
}
