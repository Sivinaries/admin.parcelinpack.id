<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subproduct;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        //TOTAL POST
        $total_product = Subproduct::count();

        //TOTAL PROJECT
        $total_project = Project::count();

        $sub = Subproduct::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%M') as month_name, MONTH(created_at) as month_number")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('count', 'month_name');

        $labels1 = $sub->keys();
        $data1 = $sub->values();

        $projects = Project::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%M') as month_name, MONTH(created_at) as month_number")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('count', 'month_name');

        $labels2 = $projects->keys();
        $data2 = $projects->values();

        return view('dashboard', [
            'total_product' => $total_product,
            'total_project' => $total_project,
            'labels1' => $labels1,
            'data1' => $data1,
            'labels2' => $labels2,
            'data2' => $data2,
        ]);
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
