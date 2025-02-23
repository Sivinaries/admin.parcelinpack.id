<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function content()
    {

        return view('content');
    }

    public function works()
    {

        return view('works');
    }

    public function setting()
    {

        return view('setting');
    }
    
    public function profil()
    {

        return view('profil');
    }
    public function search(Request $request)
    {

        $query = $request->input('search');

        //POST SEARCH
        // $postResults = Post::where('judul', 'LIKE', '%' . $query . '%')
        //     ->orWhere('content', 'LIKE', '%' . $query . '%')
        //     ->get();

        //PROJECT SEARCH
        // $projectResults = Project::where('project', 'LIKE', '%' . $query . '%')
        //     ->orWhere('description', 'LIKE', '%' . $query . '%')
        //     ->get();

        //USER SEARCH
        // $userResults = User::where('name', 'LIKE', '%' . $query . '%')
        //     ->orWhere('email', 'LIKE', '%' . $query . '%')
        //     ->get();

        // return view('search', compact('postResults', 'projectResults', 'userResults'));
    }
}
