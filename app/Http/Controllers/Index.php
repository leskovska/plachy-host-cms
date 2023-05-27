<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use App\Models\Video;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $videos = Video::all();
        $introductionText = Introduction::latest()->first() ? Introduction::latest()->first()->value('text') : '';
        return view('index', [
            'videos' => $videos,
            'introduction_text' => $introductionText
        ]);
    }
}
