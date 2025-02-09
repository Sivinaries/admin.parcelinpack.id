<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return redirect()->route('dashboard')->with('auth_token', $token)->with('toast_success', 'Berhasil Login!');;
        }

        return back()->with('error', 'Password atau Email Salah !');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'level' => 'required|string|in:admin,writer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ]);

        $user->save(); 

        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect('/user')->with('toast_success', 'Registration successful!')
            ->with('access_token', $token);
    }


    public function logout()
    {
        if ($user = Auth::guard('web')->user()) {
            $user->save(); // Save the change to the database

            $user->tokens()->delete();
        }

        Auth::guard('web')->logout();
        return redirect()->route('login')->with('toast_success', 'Logged Out Successful!');;
    }
}
