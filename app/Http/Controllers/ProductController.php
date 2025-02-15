<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        if (request()->is('api/*')) {
            return response()->json($product);
        }

        return view("product", compact("product"));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view("addproduct", compact('kategori'));
    }

    public function store(Request $request)
    {
        $product = $request->validate([
            'kategori_id' => 'required',
            'product' => 'required',
            'desc' => 'required',
        ]);

        Product::create($product);

        return redirect(route('product'))->with('success', 'Product Berhasil Dibuat !');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product], 200);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $kategori = Kategori::all();
        return view('editproduct', [
            'product' => $product,
            'kategori' => $kategori,
    ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'product' => 'required',
            'desc' => 'required',
        ]);

        $data = $request->only([
            'kategori_id',
            'product',
            'desc',
    ]);

        Product::where('id', $id)->update($data);

        return redirect(route('product'))->with('success', 'Product Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect(route('product'))->with('success', 'Product Berhasil Dihapus !');
    }
}
