<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori =  Cache::remember('kategoris', now()->addMinutes(60), fn() =>
        Kategori::orderBy('created_at')->get());

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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'required',
        ]);

        $kategori['img'] = $request->file('img')->storeAs('kategoris', $request->file('img')->getClientOriginalName(), 'public');

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
        $kategori = $request->validate([
            'kategori' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'required',
        ]);

        $kategoriModel = Kategori::findOrFail($id);

        // Jika ada gambar baru diunggah, simpan dan update
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->storeAs('kategoris', $request->file('img')->getClientOriginalName(), 'public');
            $kategori['img'] = $imagePath;
        } else {
            $kategori['img'] = $kategoriModel->img;
        }

        Cache::forget('kategoris');

        $kategoriModel->update($kategori);

        return redirect(route('kategori'))->with('success', 'Category Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        Cache::forget('kategoris');

        return redirect(route('kategori'))->with('success', 'Category Berhasil Dihapus !');
    }
}
