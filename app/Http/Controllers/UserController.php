<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index()
    {
        $user = Cache::remember('users', now()->addMinutes(60), fn() =>  
        User::where('level', 'Writer')->orderBy('created_at')->get());

        if (request()->is('api/*')) {
            return response()->json($user);
        }

        return view('user', compact('user'));
    }

    public function create()
    {
        return view('adduser');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|string|in:Admin,Writer',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->level = $validatedData['level'];
        $user->save();

        return redirect('/user')->with('success', 'User Berhasil Dibuat !');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('user'))->with('success', 'User Berhasil Dihapus !');
    }
}
