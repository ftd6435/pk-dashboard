<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        return view('emails.notification');
    }

    public function news(Request $request){
        $request->validate([
            'email' => 'required|string|lowercase|email|unique:newsletters,email|max:255'
        ]);

        Newsletter::create(['email' => $request->email]);
        return back()->with(['message' => 'Vous êtes abonné avec succès sur notre newsletter', 'status' => 'success']);
    }

    public function unsubscribe($id){
        $newsletter = Newsletter::findOrFail($id);

        return view('emails.unsubscribe', compact('newsletter'));
    }

    public function destroy($id){
        $newsletter = Newsletter::findOrFail($id);
    
        $newsletter->delete();

        return redirect('/');
    }
}
