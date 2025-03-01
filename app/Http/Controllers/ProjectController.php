<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Cache::remember('projects', now()->addMinutes(60), fn() =>
        Project::orderBy('created_at')->get());

        if (request()->is('api/*')) {
            return response()->json($project);
        }

        return view("project", compact("project"));
    }

    public function create()
    {
        return view('addproject');
    }

    public function store(Request $request)
    {
        $project = $request->validate([
            'project' => 'required',
            'img1' => 'required',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc1' => 'required',
            'desc2' => 'required',
        ]);

        $project['img1'] = $request->file('img1')->storeAs('projects', $request->file('img1')->getClientOriginalName(), 'public');
        $project['img2'] = $request->file('img2')->storeAs('projects', $request->file('img2')->getClientOriginalName(), 'public');

        Cache::forget('projects');

        Project::create($project);

        return redirect(route('project'))->with('success', 'Project Berhasil Dibuat !');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json(['project' => $project], 200);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('editproject', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = $request->validate([
            'project' => 'required',
            'img1' => 'required',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc1' => 'required',
            'desc2' => 'required',
        ]);

        $projectModel = Project::findOrFail($id);

        if ($request->hasFile('img1')) {
            $project['img1'] = $request->file('img1')->storeAs('projects', $request->file('img1')->getClientOriginalName(), 'public');
        }
        if ($request->hasFile('img2')) {
            $project['img2'] = $request->file('img2')->storeAs('projects', $request->file('img2')->getClientOriginalName(), 'public');
        }

        Cache::forget('projects');

        $projectModel->update($project);

        return redirect(route('project'))->with('success', 'Project Berhasil Diupdate !');
    }

    public function destroy($id)
    {
        Project::destroy($id);

        Cache::forget('projects');

        return redirect(route('project'))->with('success', 'Project Berhasil Dihapus !');
    }
}
