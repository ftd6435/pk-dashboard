<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateUpdateCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::latest()->get();

        return view('pages/admin/category', ['categories' => $categories]);
    }

    public function store(RequestCreateUpdateCategory $request){
        $validate = $request->validated();

        Category::create($validate);
        return redirect('/categories')->with(['message' => 'Catégorie créée avec succès', 'status' => 'success']);
    }

    public function edit($id){
        if(Auth::user()->role !== "admin" && Auth::user()->role !== "editer"){
            return redirect('/categories')->with(["message" => "Vous n'êtes pas autorisé a éditer une catégorie. Merci de contacter l'administrateur ou l'éditeur.", "status" => "error"]);
        }

        $category = Category::findOrFail($id);

        return view('pages/admin/editCategory', ['category' => $category]);
    }

    public function update(Category $category, RequestCreateUpdateCategory $request){
        $validate = $request->validated();

        $category->update($validate);
        return redirect('/categories')->with(['message' => 'Catégorie modifié avec succès', 'status' => 'success']);
    }

    public function destroy(Category $category){
        if(Auth::user()->role !== "admin"){
            return redirect('/categories')->with(["message" => "Vous n'êtes pas autorisé a supprimer une catégorie. Merci de contacter l'administrateur.", "status" => "error"]);
        }

        $category->delete();

        return redirect('/categories')->with(['message' => 'Catégorie supprimé avec succès', 'status' => 'success']);
    }
}
