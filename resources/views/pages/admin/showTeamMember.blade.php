@extends('template')

@section('title', $team->fullName . ' | Membre de l\'équipe')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <div class="flex gap-9 items-center">
            <h1 class="headline-font font-semibold text-4xl leading-9">Membre #{{ $team->id }}</h1>
        </div>

        <a href="/team" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.authError')

    <div class="mx-3 shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
        <div class="grid grid-cols-[0.8fr_1fr] gap-5 shadow bg-indigo-600 text-indigo-50 p-6">
            <div class="flex items-center gap-5">
                @php
                    $memberAvatar = $team->avatar ? "/storage/images/team/" . $team->avatar : '/img/avatar.jpeg';
                @endphp

                <img src="{{ $memberAvatar }}" class="w-[6.5rem] h-[6.5rem] border-4 border-indigo-50 rounded-full" alt="Profile-{{ $team->fullName }}">
                <div>
                    <h2 class="headline-font text-2xl font-semibold">{{ $team->fullName }}</h2>
                    <p class="text-center tracking-wide text-sm font-semibold italic">{{ $team->position }}</p>
                </div>
            </div>
            <div class="tracking-wide font-medium flex flex-col gap-3">
                <div class="flex items-center gap-5">
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <span>{{ $team->address }}</span>
                </div>
                <div class="flex items-center gap-4">
                    <span><i class='bx bxs-envelope'></i></span>
                    <span>{{ $team->email }}</span>
                </div>
                {{-- @if ($team->facebook)
                    <div class="flex items-center gap-4">
                        <span><i class="fa-solid fa-globe"></i></span>
                        <span>{{ $team->website }}</span>
                    </div> 
                @endif --}}
            </div>
        </div>

        <div class="p-6">
            {{-- PROJECT DETAILS --}}
            <div class="flex items-center mb-5 gap-3">  
                <span class="text-xl text-indigo-600"><i class='bx bx-captions'></i></span>
                <h1 class="headline-font text-2xl font-semibold uppercase">Description</h1>
            </div>  
            <p class="tracking-wide mb-5 indent-8">{{ $team->description }}</p>

            <div class="flex justify-between items-center mt-auto">
                <p class="text-sm text-indigo-300"><span class="font-medium">Autheur:</span> <span class="capitalize italic">{{ $team->user->name }}</span></p>
                <p class="text-sm text-indigo-300"><span class="font-medium">Enrégistré:</span> <span class="capitalize italic">{{ $team->shortDateFormat($team->created_at) }}</span></p>
            </div>
        </div>
    </div>

    {{-- <div class="mx-3 my-6 flex justify-end gap-5 items-center">
        <button id="newProject" data-modalName="newProject-add" class="open-modal px-4 py-3 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Ajouter un projet</button>
    </div> --}}

    {{-- TESTIMONIAL MODAL --}}
    {{-- <div class="modal hidden fixed top-0 left-0 w-full h-screen z-10" data-newProject-add="open-modal">
        <div class="overlay h-full w-full backdrop-blur"></div>
        <div class="shadow p-5 border border-indigo-100 bg-slate-200 rounded-md w-[60%] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <span class="close-modal flex justify-end mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(87 83 78);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
            </span>
            <h2 class="text-xl uppercase text-center font-semibold headline-font mb-6">Ajouter un nouveau projet</h2>

            <form action="{{ route('projects.store') }}" method="POST" class="flex flex-col">
                @csrf
                <h2 class="capitalize font-semibold tracking-wide mb-4 text-xl text-center">{{ $client->fullName }}</h2>

                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="title" class="font-semibold tracking-wide">Titre:</label>
                    <input type="text" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Titre du projet" id="title" name="title">
                </div>               
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="startDate" class="font-semibold tracking-wide">Date de debut:</label>
                    <input type="date" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="startDate" name="startDate">
                </div>               
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="endDate" class="font-semibold tracking-wide">Date de fin:</label>
                    <input type="date" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="endDate" name="endDate">
                </div>               
                
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                    <label for="details" class="font-semibold tracking-wide">Description:</label>
                    <textarea name="details" id="details" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5"></textarea>
                </div>              
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="status" class="font-semibold tracking-wide">Status:</label>
                    <select id="status" name="status" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200">
                        <option value="en etudes">En études</option>
                        <option value="en cours">En cours</option>
                        <option value="realiser">Realiser</option>
                    </select>
                </div>
                
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                    <label for="testimonial" class="font-semibold tracking-wide">Temoignage:</label>
                    <textarea name="testimonial" id="testimonial" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5"></textarea>
                </div> 
                
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                
                <div class="flex justify-end gap-6 mt-8">
                    <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                    <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ $project->client->testimonial ? 'Modifier' : 'Ajouter' }}</button>
                </div>
            </form>
        </div>
    </div> --}}

@endsection