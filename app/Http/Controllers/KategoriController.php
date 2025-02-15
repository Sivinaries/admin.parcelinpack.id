<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

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

        Kategori::where('id', $id)->update($data);

        return redirect(route('kategori'))->with('success', 'Category Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return redirect(route('kategori'))->with('success', 'Category Berhasil Dihapus !');
    }
}
