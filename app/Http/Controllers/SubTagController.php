<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\SubTag;
use App\Models\Subproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SubTagController extends Controller
{
    public function index()
    {
        $subtag = Cache::remember('subtags', now()->addMinutes(60), fn () => 
        SubTag::with('subproduct', 'tag')->orderBy('created_at')->get());

        if (request()->is('api/*')) {
            return response()->json($subtag);
        }

        return view("subtag", compact("subtag"));
    }

    public function create()
    {
        $subproduct = Subproduct::all();
        $tag = Tag::all();

        return view("addsubtag", compact("subproduct", "tag"));
    }

    public function store(Request $request)
    {
        $subtag = $request->validate([
            'subproduct_id' => 'required',
            'tag_id' => 'required',
        ]);

        Cache::forget('subtags');

        Cache::forget('subproducts');

        SubTag::create($subtag);

        return redirect(route('subtag'))->with('success', 'Set Tag Berhasil Dibuat !');
    }

    public function show($id)
    {
        $subtag = SubTag::with(['subproduct', 'tag'])->findOrFail($id);

        return response()->json(['subtag' => $subtag], 200);
    }

    public function destroy($id)
    {
        SubTag::destroy($id);

        Cache::forget('subtags');

        Cache::forget('subproducts');

        return redirect(route('subtag'))->with('success', 'Subtag Berhasil Dihapus !');
    }
}
