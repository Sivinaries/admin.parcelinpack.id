<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $post = Cache::remember('posts', now()->addMinutes(60), fn() =>
        Post::orderBy('created_at')->get());

        if (request()->is('api/*')) {
            return response()->json($post);
        }

        return view("post", compact("post"));
    }

    public function create()
    {
        return view('addpost');
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'post' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);

        $post['img'] = $request->file('img')->storeAs('posts', $request->file('img')->getClientOriginalName(), 'public');

        Cache::forget('posts');

        Post::create($post);

        return redirect(route('post'))->with('success', 'Post Berhasil Dibuat !');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json(['post' => $post], 200);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('editpost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = $request->validate([
            'post' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);
    
        $postModel = Post::findOrFail($id);
    
        // Jika ada gambar baru diunggah, simpan dan update
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->storeAs('posts', $request->file('img')->getClientOriginalName(), 'public');
            $post['img'] = $imagePath;
        } else {
            $post['img'] = $postModel->img;
        }
    
        Cache::forget('posts');
    
        $postModel->update($post);
    
        return redirect(route('post'))->with('success', 'Post Berhasil Diupdate !');
    }
    
    public function destroy($id)
    {
        Post::destroy($id);

        Cache::forget('posts');

        return redirect(route('post'))->with('success', 'Post Berhasil Dihapus !');
    }
}
