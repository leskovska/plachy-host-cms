<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('index', [
            'videos' => $videos
        ]);
    }
}
