<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Trick;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tricks = Trick::latest()->take(8)->get();
        return view('frontend.index', compact('tricks'));
    }

    public function about()
    {
        $about = Page::where('slug', 'about')->firstOrFail();
        return view('frontend.about', compact('about'));
    }
}
