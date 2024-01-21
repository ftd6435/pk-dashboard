<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateService;
use App\Http\Requests\RequestEditService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index(){
        $services = Service::latest()->paginate(10);

        return view('pages/admin/service', ['services' => $services]);
    }

    public function store(Service $service, RequestCreateService $request){
        $validate = $request->validated();
        $file_name = rand(1, 10) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->image->getClientOriginalName();
        $request->image->storeAs('public/images/services', $file_name);
        $validate['image'] = $file_name;

        Service::create($validate);

       return redirect('/services')->with(['message' => 'Service ajouté avec success', 'status' => "success"]);
    }

    public function edit($id){
        if(Auth::user()->role !== "admin" && Auth::user()->role !== "editer"){
            return redirect('/services')->with(["message" => "Vous n'êtes pas autorisé a éditer un service. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
        }

        $service = Service::findOrFail($id);

        return view('pages/admin/editService', ['service' => $service]);
    }

    public function update(Service $service, RequestEditService $request){
        $validate = $request->validated();

        if($request->image){
            // IF THE IMAGE EXISTS THEN DELETE IT 
            if(Storage::disk('public')->exists('/images/services/' . $service->image)){
                Storage::disk('public')->delete('/images/services/' . $service->image);
            }

            $file_name = rand(1, 10) . '-' . date('d-m-Y') . '-' . time() . '' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/services', $file_name);
            $validate['image'] = $file_name;
        }
        
        $service->update($validate);
        return redirect('/services')->with(['message' => 'Service modifié avec success', 'status' => "success"]);
    }

    public function destroy(Service $service){
        if(Auth::user()->role !== "admin"){
            return redirect('/services')->with(["message" => "Vous n'êtes pas autorisé a supprimer un service. Merci de contacter l'administrateur.", "status" => "error"]);
        }

        $service->delete();
        return redirect('/services')->with(['message' => 'Service supprimé avec success', 'status' => "success"]);
    }
}
