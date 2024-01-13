<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreatePost;
use App\Http\Requests\RequestEditPost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(10);

        return view('pages/admin/blog', ['posts' => $posts]);
    }

    public function create(){
        $categories = Category::all();

        return view('pages/admin/createEditPost', ['categories' => $categories]);
    }

    public function store(RequestCreatePost $request){
        $validate = $request->validated();

        $imageName = rand(1, 100) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->image->getClientOriginalname();
        $request->image->storeAs('public/images/posts', $imageName);
        $validate['image'] = $imageName;

        Post::create($validate);
        return redirect('/blog')->with(['message' => "L'article a été ajouté avec succès", 'status' => 'success']);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('pages/admin/createEditPost', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Post $post, RequestEditPost $request){
        $validate = $request->validated();

        if($request->image){
            if(Storage::disk('public')->exists('/images/posts/' . $post->image)){
                Storage::disk('public')->delete('/images/posts/' . $post->image);
            }

            $imageName = rand(1, 100) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->image->getClientOriginalname();
            $request->image->storeAs('public/images/posts', $imageName);
            $validate['image'] = $imageName;
        }

        $post->update($validate);
        return redirect('/blog')->with(['message' => "L'article a été modifié avec succès", 'status' => 'success']);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/blog')->with(['message' => "L'article a été supprimé avec succès", 'status' => 'success']);
    }
}
