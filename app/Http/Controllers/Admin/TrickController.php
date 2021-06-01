<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrickRequest;
use App\Models\PhotoTrick;
use App\Models\Trick;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    private $trickObject;

    public function __construct()
    {
        $this->trickObject = new Trick();
    }

    public function index()
    {
        $tricks = Trick::latest()->get();
        return view('backend.admin.tricks.index', compact('tricks'));
    }

    public function create()
    {
        return view('backend.admin.tricks.create');
    }

    public function store(TrickRequest $request)
    {
        $this->trickObject->storeTrick($request);
        return back();
    }

    public function show($id)
    {
        $trick = Trick::findOrFail($id);
        $photos = PhotoTrick::where('trick_id', $id)->get();
        return view('backend.admin.tricks.show', compact('trick', 'photos'));
    }

    public function edit($id)
    {
        $trick = Trick::findOrFail($id);
        $photos = PhotoTrick::where('trick_id', $id)->get();
        return view('backend.admin.tricks.edit', compact('trick', 'photos'));
    }

    public function update(TrickRequest $request, $id)
    {
        $this->trickObject->updateTrick($request, $id);
        return redirect()->route('admin.tricks.index');
    }

    public function destroy($id)
    {
        $this->trickObject->destroyTrick($id);
        return back();
    }

    public function photo(Request $request)
    {
        $id = $request->id;
        $photoTrick = PhotoTrick::where('id', $id)->select('photo')->firstOrFail();
        if (file_exists($photoTrick->photo)) unlink($photoTrick->photo);
        PhotoTrick::where('id', $id)->delete();
    }


}
