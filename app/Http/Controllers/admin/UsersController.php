<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{   
    
    public function index(){
        $users = User::all();

        return view('pages/admin/users', ['users' => $users]);
    }

    public function create(){
        if(Auth::user()->role !== "admin" && Auth::user()->role !== "editer"){
            return redirect('/users')->with(["message" => "Vous n'êtes pas autorisé a créer un user. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
        }

        return view('pages/admin/createUser');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2098'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->symbols()]
        ]);

        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        if($request->avatar){
            $avatar = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/images/users/', $avatar);
            $validate['avatar'] = $avatar;

            $newUser['avatar'] = $validate['avatar'];
        }

        User::create($newUser);
        return redirect('/users')->with(['message' => "Un utilisateur a été ajouté avec succès, maintenant vous pouvez modifier son role", 'status' => 'success']);
    }

    public function alterUser(User $user, Request $request){
        dd($request);
    }

    public function role(Request $request){
        if(Auth::user()->role !== "admin"){
            return back()->with(["message" => "Vous n'êtes pas autorisé a modifier le role d'un user. Merci de contacter l'administrateur.", "status" => "error"]);
        }

        $user = User::findOrFail($request->id);
        $user->update(['role' => $request->role]);

        return back()->with(['message' => 'Le role a été modifié avec succès', 'status' => 'success']);
    }

    public function destroy(User $user){
        if(Auth::user()->role !== "admin"){
            return redirect('/users')->with(["message" => "Vous n'êtes pas autorisé a supprimer un user. Merci de contacter l'administrateur.", "status" => "error"]);
        }

        $user->delete();

        return back()->with(['message' => 'L\'utilisateur a été supprimé avec succès', 'status' => 'success']);
    }

}
