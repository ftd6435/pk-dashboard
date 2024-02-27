<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    
    public function send(Contact $contact, Request $request){
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'subject' => 'nullable|string|min:3|max:255',
            'message' => 'required|string|min:8',
        ]);

        $mail = $contact->create($validated);
        $adminEmail = User::select('email')->where('role', 'admin')->get();
        
        Mail::to($adminEmail[0]->email)->send(new ContactMail($mail));

        return back()->with(['message' => "Votre message a été bien envoyé. Merci de patienter, vous serez répondu le plutôt que possible.", 'status' => 'success']);
    }

}
