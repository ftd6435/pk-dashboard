<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateClient;
use App\Http\Requests\RequestEditClient;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    
    public function index(){
        $clients = Client::latest()->paginate();

        return view('pages/admin/client', ['clients' => $clients]);
    }

    public function show($id){
        $client = Client::findOrFail($id);

        return view('pages/admin/showClient', ['client' => $client]);
    }

    public function create(){
        if(Auth::user()->role === "admin" || Auth::user()->role === "editer"){
            return view('pages/admin/createEditClient');
        }

        return redirect('/clients')->with(["message" => "Vous n'êtes pas autorisé a créer un client. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
    }

    public function store(RequestCreateClient $request){
        $validate = $request->validated();

        if($request->image){
            $imageName = rand(1, 100) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/clients', $imageName);
            $validate['image'] = $imageName;
        }

        Client::create($validate);
        return redirect('/clients')->with(['message' => 'Le client a été ajouté avec succès', 'status' => 'success']);
    }

    public function edit($id){
        if(Auth::user()->role === "admin" || Auth::user()->role === "editer"){
            $client = Client::findOrFail($id);

            return view('pages/admin/createEditClient', ['client' => $client]);
        }

        return redirect('/clients')->with(["message" => "Vous n'êtes pas autorisé a éditer un client. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
    }

    public function update(Client $client, RequestEditClient $request){
        $validate = $request->validated();

        if($request->image){
            if(Storage::disk('public')->exists('/images/clients/' . $client->image)){
                Storage::disk('public')->delete('/images/clients/'. $client->image);
            }

            $imageName = rand(1, 100) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/clients', $imageName);
            $validate['image'] = $imageName;
        }

        $client->update($validate);
        return redirect('/clients')->with(['message' => 'Le client a été modifié avec succès', 'status' => 'success']);
    }

    public function destroy(Client $client){
        if(Auth::user()->role === "admin"){
            $client->delete();
            return redirect('/clients')->with(['message' => 'Le client a été supprimé avec succès', 'status' => 'success']);
        }
        
        return redirect('/clients')->with(["message" => "Vous n'êtes pas autorisé a supprimer un client. Merci de contacter l'administrateur.", "status" => "error"]);
    }
}
