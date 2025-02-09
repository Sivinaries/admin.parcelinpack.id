<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::all();

        if (request()->is('api/*')) {
            return response()->json($tag);
        }

        return view('tag', compact('tag'));
    }

    public function create()
    {
        return view('addtag');
    }

    public function store(Request $request)
    {
        $tag = $request->validate([
            'tag' => 'required',
        ]);

        Tag::create($tag);

        return redirect(route('tag'))->with('success', 'Tag Berhasil Dibuat !');
    }

    public function show($id)
    {
        $tag = Tag::with(['products'])->findOrFail($id);

        return response()->json(['tag' => $tag], 200);
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('edittag', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        $tagdata = $request->only(['tag']);

        Tag::where('id', $id)->update($tagdata);

        return redirect(route('tag'))->with('success', 'Tag Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect(route('tag'))->with('success', 'Tag Berhasil Dihapus !');
    }
}
