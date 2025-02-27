<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    public function index()
    {
        $tag = Cache::remember('tags', now()->addMinutes(60), fn () => 
        Tag::with('subproducts')->orderBy('created_at')->get());

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

        Cache::forget('tags');

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

        $data = $request->only(['tag']);

        Cache::forget('tags');

        Tag::where('id', $id)->update($data);

        return redirect(route('tag'))->with('success', 'Tag Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        Cache::forget('tags');

        return redirect(route('tag'))->with('success', 'Tag Berhasil Dihapus !');
    }
}
