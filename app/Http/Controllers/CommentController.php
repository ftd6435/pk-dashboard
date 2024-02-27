<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
            'content' => 'required|string|min:8',
            'post_id' => 'required|integer',
            'parent_id' => 'nullable|integer'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'post_id' => $request->post_id
        ];

        if($request->parent_id){
            $data['parent_id'] = $request->parent_id;
        }

        Comment::create($data);

        return back()->with(['message' => "Merci d'avoir laissé un commentaire", 'status' => 'success']);
    }

}
