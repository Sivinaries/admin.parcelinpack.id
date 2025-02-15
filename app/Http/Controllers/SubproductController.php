<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subproduct;
use Illuminate\Http\Request;

class SubproductController extends Controller
{
    public function index()
    {
        $subproducts = Subproduct::with('tags')->get();

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
            'price' => 'required',
            'min' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);

        Subproduct::create($subproduct);

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Dibuat !');
    }

    public function show($id)
    {
        $subproduct = Subproduct::with(['product'])->findOrFail($id);
        return response()->json(['subproduct' => $subproduct], 200);
    }

    public function edit($id)
    {
        $subproduct = Subproduct::find($id);
        return view('editsubproduct', ['subproduct' => $subproduct]);
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

        Subproduct::where('id', $id)->update($data);

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Subproduct::destroy($id);

        return redirect(route('subproduct'))->with('success', 'Subproduct Berhasil Dihapus !');
    }
}
