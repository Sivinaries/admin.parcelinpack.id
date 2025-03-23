<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Subproduct;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        //TOTAL POST
        $total_product = Subproduct::count();

        //TOTAL PROJECT
        $total_project = Project::count();

        //TOTAL POST
        $total_post = Post::count();

        //TOTAL USER
        $total_user = User::where('level', 'Writer')->count();

        $projects = Project::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%M') as month_name, MONTH(created_at) as month_number")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('count', 'month_name');

        $labels1 = $projects->keys();
        $data1 = $projects->values();

        $posts = Post::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%M') as month_name, MONTH(created_at) as month_number")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('count', 'month_name');

        $labels2 = $posts->keys();
        $data2 = $posts->values();

        $sub = Subproduct::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%M') as month_name, MONTH(created_at) as month_number")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('count', 'month_name');

        $labels3 = $sub->keys();
        $data3 = $sub->values();

        return view('dashboard', [
            'total_product' => $total_product,
            'total_post' => $total_post,
            'total_project' => $total_project,
            'total_user' => $total_user,
            'labels1' => $labels1,
            'data1' => $data1,
            'labels2' => $labels2,
            'data2' => $data2,
            'labels3' => $labels3,
            'data3' => $data3,
        ]);
    }

    public function profil()
    {

        return view('profil');
    }

    public function search(Request $request)
    {

        $query = $request->input('search');

        //POST SEARCH
        $postResults = Post::where('post', 'LIKE', '%' . $query . '%')
            ->orWhere('desc1', 'LIKE', '%' . $query . '%')
            ->get();

        //PROJECT SEARCH
        $proResults = Project::where('project', 'LIKE', '%' . $query . '%')
            ->orWhere('desc1', 'LIKE', '%' . $query . '%')
            ->get();

        //SUB SEARCH
        $subResults = Subproduct::where('subproduct', 'LIKE', '%' . $query . '%')
            ->orWhere('desc1', 'LIKE', '%' . $query . '%')
            ->get();

        return view('search', compact('subResults', 'proResults', 'postResults'));
    }
}
