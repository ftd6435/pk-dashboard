<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    
    public function uplaod($id){
        $project = Project::findOrFail($id);

        return view('pages.admin.imagesForm', compact('project'));
    }

    public function store(Request $request){
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $this->treatImages($request->file('images'));

        Image::create([
            'images' => $data,
            'project_id' => $request->project_id
        ]);

        return redirect('/projects')->with(['message' => 'Les images ont été ajouté avec succès.', 'status' => 'success']);
    }

    public function edit($id){
        $images = Image::findOrFail($id);
        $project_id = $images->project_id;

        $project = Project::findOrFail($project_id);

        $explodImages = explode('|', $images->images);
        
        return view('pages.admin.imagesForm', ['images' => $explodImages, 'project' => $project, 'images_id' => $images->id]);
    }

    public function update($id, Request $request){
        $images = Image::findOrFail($id);
        
        $explodImages = explode('|', $images->images);

        foreach($explodImages as $image){
            if(Storage::disk('public')->exists('/images/projects/' . $image)){
                Storage::disk('public')->delete('/images/projects/' . $image);
            }
        }

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $this->treatImages($request->file('images'));
        
        $images->update(['images' => $data]);
        return redirect('/projects')->with(['message' => 'Les images ont été modifié avec succès.', 'status' => 'success']);
    }

    protected function treatImages(array $data) : string{
        $imagesName = [];

        foreach($data as $image){
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images/projects', $imageName);
            $imagesName[] = $imageName;
        }

        $arrayImages = implode('|', $imagesName);

        return $arrayImages;
    }

}
