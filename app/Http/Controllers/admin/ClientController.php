<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateClient;
use App\Http\Requests\RequestEditClient;
use App\Models\Client;
use Illuminate\Http\Request;
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
        return view('pages/admin/createEditClient');
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
        $client = Client::findOrFail($id);

        return view('pages/admin/createEditClient', ['client' => $client]);
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
        $client->delete();
        return redirect('/clients')->with(['message' => 'Le client a été supprimé avec succès', 'status' => 'success']);
    }
}
