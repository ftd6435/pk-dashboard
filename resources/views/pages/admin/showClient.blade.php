@extends('template')

@section('title', $client->fullName . ' | Client')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <div class="flex gap-9 items-center">
            <h1 class="headline-font font-semibold text-4xl leading-9">Client #{{ $client->id }}</h1>
        </div>

        <a href="/clients" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    <div class="mx-3 shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
        <div class="grid grid-cols-[0.8fr_1fr] gap-5 shadow bg-indigo-600 text-indigo-50 p-6">
            <div class="flex items-center gap-5">
                <img src="/storage/images/clients/<?= $client->image ?>" class="w-[6.5rem] h-[6.5rem] border-4 border-indigo-50 rounded-full" alt="Profile-{{ $client->fullName }}">
                <div>
                    <h2 class="headline-font text-2xl font-semibold">{{ $client->fullName }}</h2>
                    <p class="text-center tracking-wide text-sm font-semibold italic">{{ $client->profession }}</p>
                </div>
            </div>
            <div class="tracking-wide font-medium flex flex-col gap-3">
                <div class="flex items-center gap-5">
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <span>{{ $client->address }}</span>
                </div>
                <div class="flex items-center gap-4">
                    <span><i class='bx bxs-envelope'></i></span>
                    <span>{{ $client->email }}</span>
                </div>
                @if ($client->website)
                    <div class="flex items-center gap-4">
                        <span><i class="fa-solid fa-globe"></i></span>
                        <span>{{ $client->website }}</span>
                    </div> 
                @endif
            </div>
        </div>

        <div class="p-6">
            {{-- PROJECT DETAILS --}}
            <div class="flex items-center mb-5 gap-3">  
                <span class="text-xl text-indigo-600"><i class='bx bx-captions'></i></span>
                <h1 class="headline-font text-2xl font-semibold uppercase">{{ count($client->projects) }} projet{{ count($client->projects) > 1 ? 's' : '' }} confier au total</h1>
            </div>
            @foreach ($client->projects as $key => $project)            
                <h3 class="tracking-wide mb-5 font-semibold indent-8">{{ $key + 1 }} - {{ $project->title }}</h3>

                {{-- CLIENT TESTIMONIAL --}}
                @if($project->testimonial)
                    <div class="flex items-center mb-3 gap-3">  
                        <span class="text-xl text-indigo-600"><i class='bx bx-message-rounded-dots'></i></span>
                        <h3 class="headline-font text-xl font-medium">Témoignage</h3>
                    </div>
                    <p class="tracking-wide mb-8 italic indent-8">{{ $project->testimonial }}</p>
                @else
                    <p class="tracking-wide mb-8 italic indent-8">Il n'y a pas de message de témoignage pour ce projet :)</p>
                @endif
            @endforeach  

            <div class="flex justify-between items-center mt-auto">
                <p class="text-sm text-indigo-300"><span class="font-medium">Autheur:</span> <span class="capitalize italic">{{ $client->user->name }}</span></p>
                <p class="text-sm text-indigo-300"><span class="font-medium">Enrégistré:</span> <span class="capitalize italic">{{ $client->shortDateFormat($client->created_at) }}</span></p>
            </div>
        </div>
    </div>

    <div class="mx-3 my-6 flex justify-end gap-5 items-center">
        <button id="newProject" data-modalName="newProject-add" class="open-modal px-4 py-3 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Ajouter un projet</button>
    </div>

    {{-- CREATION OF NEW PROJECT FOR THE CURRENT USER MODAL --}}
    <div class="modal hidden fixed top-0 left-0 w-full h-screen z-10" data-newProject-add="open-modal">
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
                <input type="hidden" name="user_id" value="1">
                
                <div class="flex justify-end gap-6 mt-8">
                    <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                    <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@endsection