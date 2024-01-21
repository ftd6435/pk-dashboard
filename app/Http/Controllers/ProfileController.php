<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\VarDumper\VarDumper;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(['message' => "Les données ont été modifié avec succès", 'status' => "success"]);
    }

    /**
     * Update the user's avatar
     */
    public function avatar(Request $request){
        $validate = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg,png|max:2098'
        ]);

        $user = $request->user();

        $avatar = time() . '.' . $request->avatar->extension();
        if(Storage::disk('public')->exists('/images/users/' . $user->avatar)){
            Storage::disk('public')->delete('/images/users/' . $user->avatar);
        }

        $request->avatar->storeAs('public/images/users/', $avatar);
        $validate['avatar'] = $avatar;

        $user->update(['avatar' => $avatar]);

        return Redirect::route('profile.edit')->with(['message' => "Votre avatar a été modifié avec succès", 'status' => "success"]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
