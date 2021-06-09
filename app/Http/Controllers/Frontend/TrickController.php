<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PhotoTrick;
use App\Models\Trick;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    public function index()
    {
        $tricks = Trick::latest()->take(8)->get();
        return view('frontend.tricks', compact('tricks'));
    }

    public function trick($id, $title)
    {
        $trick       = Trick::findOrFail($id);
        $photoTricks = PhotoTrick::where('trick_id', $id)->get();
        return view('frontend.trick', compact('trick', 'photoTricks'));
    }
}
