<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateTeamMember;
use App\Http\Requests\RequestUpdateTeamMember;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(){
        $team = TeamMember::latest()->paginate();

        return view('pages/admin/teamMember', ['team' => $team]);
    }

    public function show($id){
        $team = TeamMember::findOrFail($id);

        return view('pages/admin/showTeamMember', ['team' => $team]);
    }

    public function create(){
        return view('pages/admin/teamMemberCreateEdit');
    }

    public function store(RequestCreateTeamMember $request){
        $validate = $request->validated();

        if($request->avatar){
            $avatar = rand(1, 20) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('public/images/team', $avatar);
            $validate['avatar'] = $avatar;
        }

        TeamMember::create($validate);
        return redirect('/team')->with(['message' => 'Un membre a été ajouté avec succès', 'status' => 'success']);
    }

    public function edit($id){
        $team = TeamMember::findOrFail($id);

        return view('pages/admin/teamMemberCreateEdit', ['team' => $team]);
    }

    public function update(TeamMember $team, RequestUpdateTeamMember $request){
        $validate = $request->validated();

        if($request->avatar){
            if(Storage::disk('public')->exists('/images/team/' . $team->avatar)){
                Storage::disk('public')->delete('/images/team/' . $team->avatar);
            }

            $avatar = rand(1, 20) . '-' . date('d-m-Y') . '-' . time() . '-' . $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('public/images/team', $avatar);
            $validate['avatar'] = $avatar;
        }

        $team->update($validate);
        return redirect('/team')->with(['message' => 'Un membre a été modifié avec succès', 'status' => 'success']);
    }

    public function destroy(TeamMember $team){
        $team->delete();
        return redirect('/team')->with(['message' => 'Un membre a été supprimé avec succès', 'status' => 'success']);
    }
}
