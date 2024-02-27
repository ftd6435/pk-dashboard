<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateProject;
use App\Http\Requests\RequestEditProject;
use App\Models\Client;
use App\Models\Image;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function index(){
        $projects = Project::latest()->paginate(10);

        return view('pages/admin/project', ['projects' => $projects]);
    }

    public function show($id){
        $project = Project::findOrFail($id);
        $arrayImages = Image::select()->where('project_id', $id)->get();

        if(count($arrayImages) > 0){
            $images = explode('|', $arrayImages[0]['images']);
            $images_id = $arrayImages[0]['id'];
        }

        return view('pages/admin/showProject', [
            'project' => $project, 
            'images' => $images ?? "", 
            'images_id' => $images_id ?? ""
        ]);
    }

    public function create(){
        if(Auth::user()->role !== "admin" && Auth::user()->role !== "editer"){
            return redirect('/projects')->with(["message" => "Vous n'êtes pas autorisé a créer un projet. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
        }

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
        if(Auth::user()->role !== "admin" && Auth::user()->role !== "editer"){
            return redirect('/projects')->with(["message" => "Vous n'êtes pas autorisé a éditer ce projet. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
        }

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
        if($request->user_id !== $project->user_id || $project->user->role !== "admin"){
            return back()->with(['message' => "Vous n'êtes pas autorisé a éffectuer cette modification.", 'status' => "error"]);
        }

        $validate = $request->validate([
            'status' => 'string|min:6'
        ]);

        $project->update($validate);
        return redirect()->back();
    }

    public function testimonial(Project $project, Request $request){
        if($request->user_id !== $project->user_id || $project->user->role !== "admin"){ 
            return back()->with(['message' => "Vous n'êtes pas autorisé a éffectuer cette modification.", 'status' => "error"]);
        }

        $validate = $request->validate([
            'testimonial' => 'sometimes|string|min:10'
        ]);

        $project->update($validate);
        return redirect()->back();
    }

    public function destroy(Project $project){
        if(Auth::user()->role !== "admin"){
            return redirect('/projects')->with(["message" => "Vous n'êtes pas autorisé a supprimer un projet. Merci de contacter l'administrateur.", "status" => "error"]);
        }

        $project->delete();
        return redirect('/projects')->with(['message' => 'Le projet a été supprimé avec succès', 'status' => 'success']);
    }
}
