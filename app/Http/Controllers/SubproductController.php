<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SubproductController extends Controller
{
    public function index()
    {
        $subproducts = Cache::remember('subproducts', now()->addMinutes(60), fn() => 
        Subproduct::with('tags')->orderBy('created_at')->get());

        if (request()->is('api/*')) {
            return response()->json($subproducts);
        }

        return view("subproduct", compact("subproducts"));
    }

    public function create()
    {
        $product = Product::all();

        return view("addsubproduct", compact('product'));
    }

    public function store(Request $request)
    {
        $subproduct = $request->validate([
            'product_id' => 'required',
            'subproduct' => 'required',
            'price' => 'required|numeric',
            'min' => 'required|integer',
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);

        // Simpan gambar ke penyimpanan (storage)
        $subproduct['img1'] = $request->file('img1')->storeAs('images', $request->file('img1')->getClientOriginalName(), 'public');
        $subproduct['img2'] = $request->file('img2')->storeAs('images', $request->file('img2')->getClientOriginalName(), 'public');
        $subproduct['img3'] = $request->file('img3')->storeAs('images', $request->file('img3')->getClientOriginalName(), 'public');

        Cache::forget('subproducts');

        Subproduct::create($subproduct);

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Dibuat!');
    }

    public function show($id)
    {
        $subproduct = Subproduct::with(['product'])->findOrFail($id);
        return response()->json(['subproduct' => $subproduct], 200);
    }

    public function edit($id)
    {
        $product = Product::all();
        $subproduct = Subproduct::find($id);

        return view('editsubproduct', compact('subproduct', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'subproduct' => 'required',
            'price' => 'required',
            'min' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);

        $data = $request->only([
            'product_id',
            'subproduct',
            'price',
            'min',
            'img1',
            'img2',
            'img3',
            'desc1',
            'desc2',
            'desc3',
        ]);

        Cache::forget('subproducts');

        Subproduct::where('id', $id)->update($data);

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Subproduct::destroy($id);

        Cache::forget('subproducts');

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Dihapus !');
    }
}
