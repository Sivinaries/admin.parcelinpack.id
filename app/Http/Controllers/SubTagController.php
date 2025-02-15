<?php

namespace App\Http\Controllers;

use App\Models\Subproduct;
use App\Models\SubTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class SubTagController extends Controller
{
    public function index()
    {
        $subtag = SubTag::with('subproduct', 'tag')->get();

        if (request()->is('api/*')) {
            return response()->json($subtag);
        }

        return view("subtag", compact("subtag"));
    }

    public function create()
    {
        $subproduct = Subproduct::all();
        $tag = Tag::all();

        return view("addsubtag", compact("subproduct","tag"));
    }

    public function store(Request $request)
    {
        $subtag = $request->validate([
            'subproduct_id' => 'required',
            'tag_id' => 'required',
        ]);

        SubTag::create($subtag);

        return redirect(route('subtag'))->with('success', 'Set Tag Berhasil Dibuat !');
    }

    public function show($id)
    {
        $subtag = SubTag::with(['subproduct', 'tag'])->findOrFail($id);

        return response()->json(['subtag' => $subtag], 200);
    }

    public function edit(SubTag $subTag)
    {
        
    }

    public function update(Request $request, SubTag $subTag)
    {
        //
    }

    public function destroy(SubTag $subTag)
    {
        //
    }
}
