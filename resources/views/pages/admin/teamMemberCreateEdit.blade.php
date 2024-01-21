@extends('template')

@section("title",  isset($team->id) ? 'Modifier un membre' : 'Ajouter un membre' )

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">{{ isset($team->id) ? 'Modifier le membre #' . $team->id : 'Ajouter un membre' }}</h1>
        <a href="/team" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col">
        <form action="{{ isset($team->id) ? route('team.update', $team) : route('team.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @method(isset($team->id) ? 'PUT' : 'POST')

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="fullName" class="font-semibold tracking-wide">Nom:</label>
                <input type="text" value="{{ isset($team->id) ? $team->fullName : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Nom complet..." id="fullname" name="fullName">
            </div>
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="email" class="font-semibold tracking-wide">Email:</label>
                <input type="email" value="{{ isset($team->id) ? $team->email : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="example@gmail.com" id="email" name="email">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="address" class="font-semibold tracking-wide">Adresse:</label>
                <input type="text" value="{{ isset($team->id) ? $team->address : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="0000 adresse" id="address" name="address">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="position" class="font-semibold tracking-wide">Position:</label>
                <input type="text" value="{{ isset($team->id) ? $team->position : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Votre position" id="position" name="position">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="facebook" class="font-semibold tracking-wide">Lien Facebook:</label>
                <input type="text" value="{{ isset($team->id) ? $team->facebook : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="www.facebook.com/example/" id="facebook" name="facebook">
            </div>
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="instagram" class="font-semibold tracking-wide">Lien Instagram:</label>
                <input type="text" value="{{ isset($team->id) ? $team->instagram : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="www.instagram.com/example/" id="instagram" name="instagram">
            </div>
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="linkedin" class="font-semibold tracking-wide">Lien LinkedIn:</label>
                <input type="text" value="{{ isset($team->id) ? $team->linkedin : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="www.linkedin.com/example/" id="linkedin" name="linkedin">
            </div>
            
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="avatar" class="font-semibold tracking-wide">Profil:</label>
                <input type="file" name="avatar" id="avatar" class="block text-sm text-slate-500 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200
                    file:mr-4 file:py-2 file:px-3
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-600 file:text-indigo-50
                    hover:file:bg-indigo-500
                ">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                <label for="description" class="font-semibold tracking-wide">Description:</label>
                <textarea name="description" id="description" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5">{{ isset($team->id) ? $team->description : '' }}</textarea>
            </div>              
                           
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($team->id) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>
@endsection