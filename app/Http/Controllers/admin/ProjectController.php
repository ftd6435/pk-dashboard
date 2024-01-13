<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateProject;
use App\Http\Requests\RequestEditProject;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::latest()->paginate(10);

        return view('pages/admin/project', ['projects' => $projects]);
    }

    public function show($id){
        $project = Project::findOrFail($id);

        // dd($project);
        return view('pages/admin/showProject', ['project' => $project]);
    }

    public function create(){
        $clients = Client::all();

        return view("pages/admin/createEditProject", ['clients' => $clients]);
    }

    public function store(RequestCreateProject $request)
    {
        $validate = $request->validated();

        Project::create($validate);
        return redirect('/projects')->with(['message' => 'Le projet a été ajouté avec succès', 'status' => 'success']);
    }

    public function edit($id){
        $project = Project::findOrFail($id);
        $clients = Client::all();

        return view("pages/admin/createEditProject", ['clients' => $clients, 'project' => $project]);
    }

    public function update(Project $project, RequestEditProject $request){
        $validate = $request->validated();

        $project->update($validate);
        return redirect('/projects')->with(['message' => 'Le projet a été modifié avec succès', 'status' => 'success']);
    }

    public function status(Project $project, Request $request){
        $validate = $request->validate([
            'status' => 'string|min:6'
        ]);

        $project->update($validate);
        return redirect()->back();
    }

    public function testimonial(Project $project, Request $request){
        $validate = $request->validate([
            'testimonial' => 'sometimes|string|min:10'
        ]);

        $project->update($validate);
        return redirect()->back();
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect('/projects')->with(['message' => 'Le projet a été supprimé avec succès', 'status' => 'success']);
    }
}
