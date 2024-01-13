<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $category = Category::findOrFail($id);

        return view('pages/admin/editCategory', ['category' => $category]);
    }

    public function update(Category $category, RequestCreateUpdateCategory $request){
        $validate = $request->validated();

        $category->update($validate);
        return redirect('/categories')->with(['message' => 'Catégorie modifié avec succès', 'status' => 'success']);
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect('/categories')->with(['message' => 'Catégorie supprimé avec succès', 'status' => 'success']);
    }
}
