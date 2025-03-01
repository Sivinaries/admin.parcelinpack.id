<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subproduct;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function profil()
    {

        return view('profil');
    }

    public function search(Request $request)
    {

        $query = $request->input('search');

        //SUB SEARCH
        $subResults = Subproduct::where('subproduct', 'LIKE', '%' . $query . '%')
            ->orWhere('desc1', 'LIKE', '%' . $query . '%')
            ->get();


        //USER SEARCH
        $proResults = Project::where('project', 'LIKE', '%' . $query . '%')
            ->orWhere('desc1', 'LIKE', '%' . $query . '%')
            ->get();

        return view('search', compact('subResults', 'proResults'));
    }
}
