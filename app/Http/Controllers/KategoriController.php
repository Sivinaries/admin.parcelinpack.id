<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori =  Cache::remember('kategoris', now()->addMinutes(60), function () {
            return Kategori::all();
        });

        if (request()->is('api/*')) {
            return response()->json($kategori);
        }

        return view('kategori', compact('kategori'));
    }

    public function create()
    {
        return view('addkategori');
    }

    public function store(Request $request)
    {
        $kategori = $request->validate([
            'kategori' => 'required',
            'desc' => 'required',
        ]);

        Cache::forget('kategoris');

        Kategori::create($kategori);

        return redirect(route('kategori'))->with('success', 'Category Berhasil Dibuat !');
    }

    public function show($id)
    {
        $kategori = Kategori::with(['products'])->findOrFail($id);
        return response()->json(['kategori' => $kategori], 200);
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('editkategori', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'desc' => 'required',
        ]);

        $data = $request->only([
            'kategori',
            'desc',
        ]);
    
        Cache::forget('kategoris');

        Kategori::where('id', $id)->update($data);

        return redirect(route('kategori'))->with('success', 'Category Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        Cache::forget('kategoris');

        return redirect(route('kategori'))->with('success', 'Category Berhasil Dihapus !');
    }
}
