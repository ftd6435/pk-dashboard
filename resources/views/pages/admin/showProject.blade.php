@extends('template')

@section('title', $project->title . ' | Project')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <div class="flex gap-9 items-center">
            <h1 class="headline-font font-semibold text-4xl leading-9">Project #{{ $project->id }}</h1>

            <span class="block uppercase text-sm rounded-xl font-semibold px-3 py-1 <?= $project->status === "en cours" ? 'bg-yellow-300' : ($project->status === "en etudes" ? "bg-indigo-400" :  "bg-green-300")  ?> text-stone-600">{{ $project->status }}</span>
        </div>

        <a href="/projects" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    <div class="mx-3 shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
        <div class="grid grid-cols-[0.8fr_1fr] gap-5 shadow bg-indigo-600 text-indigo-50 p-6">
            <div class="flex items-center gap-5">
                <img src="/storage/images/clients/<?= $project->client->image ?>" class="w-[6.5rem] h-[6.5rem] border-4 border-indigo-50 rounded-full" alt="Profile-{{ $project->client->fullName }}">
                <div>
                    <h2 class="headline-font text-2xl font-semibold">{{ $project->client->fullName }}</h2>
                    <p class="text-center tracking-wide text-sm font-semibold italic">{{ $project->client->profession }}</p>
                </div>
            </div>
            <div class="tracking-wide font-semibold text-xl">
                <p>Début <span class="italic capitalize font-medium">{{ $project->formatDateString($project->startDate) }}</span> et Fini <span class="italic capitalize font-medium">{{ $project->formatDateString($project->endDate) }}</span> soit <span>({{ $project->dateDifference($project->startDate, $project->endDate) }} mois)</span> de travail.</p>
            </div>
        </div>

        <div class="p-6">
            {{-- PROJECT DETAILS --}}
            <div class="flex items-center mb-5 gap-3">  
                <span class="text-xl text-indigo-600"><i class='bx bx-captions'></i></span>
                <h1 class="headline-font text-2xl font-semibold">{{ $project->title }}</h1>
            </div>  
            <p class="tracking-wide mb-5 indent-8">{{ $project->details }}</p>

            {{-- CLIENT TESTIMONIAL --}}
            @if ($project->testimonial)
                <div class="flex items-center mb-3 gap-3">  
                    <span class="text-xl text-indigo-600"><i class='bx bx-message-rounded-dots'></i></span>
                    <h2 class="headline-font text-xl font-semibold">Témoignage</h2>
                </div>
                <p class="tracking-wide mb-8 italic indent-8">{{ $project->testimonial }}</p>
            @endif

            <div class="flex justify-between items-center mt-auto">
                <p class="text-sm text-indigo-300"><span class="font-medium">Autheur:</span> <span class="capitalize italic">{{ $project->user->name }}</span></p>
                <p class="text-sm text-indigo-300"><span class="font-medium">Enrégistré:</span> <span class="capitalize italic">{{ $project->shortDateFormat($project->created_at) }}</span></p>
            </div>
        </div>
    </div>

    <div class="mx-3 my-6 flex justify-end gap-5 items-center">
        <button id="testimonial" data-modalName="testimonial-add" class="open-modal px-4 py-3 rounded-xl border border-indigo-500 bg-indigo-50 text-slate-600 font-medium transition-all hover:bg-indigo-100 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ $project->testimonial ? 'Modifier Témoignage' : 'Ajouter Témoignage' }}</button>
        <button id="status" data-modalName="status-add" class="open-modal px-4 py-3 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Changer Status</button>   
    </div>

    {{-- TESTIMONIAL MODAL --}}
    <div class="modal hidden fixed top-0 left-0 w-full h-screen z-10" data-testimonial-add="open-modal">
        <div class="overlay h-full w-full backdrop-blur"></div>
        <div class="shadow p-5 border border-indigo-100 bg-slate-200 rounded-md w-[60%] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <span class="close-modal flex justify-end mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(87 83 78);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
            </span>
            <h2 class="text-xl uppercase text-center font-semibold headline-font mb-6">{{ $project->testimonial ? 'Modifier le Témoignage' : 'Ajouter un Témoignage' }}</h2>

            <form action="{{ route('projects.testimonial', $project->id) }}" method="POST" class="flex flex-col">
                @csrf
                @method('PATCH')

                <div class="w-full grid grid-cols-1 mb-3">
                    <textarea name="testimonial" id="testimonial" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5">{{ $project->testimonial }}</textarea>
                </div>
                
                <input type="hidden" name="user_id" value="1">
                
                <div class="flex justify-end gap-6 mt-8">
                    <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                    <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ $project->testimonial ? 'Modifier' : 'Ajouter' }}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- STATUS MODAL  --}}
    <div class="modal hidden fixed top-0 left-0 w-full h-screen z-10" data-status-add="open-modal">
        <div class="overlay h-full w-full backdrop-blur"></div>
        <div class="shadow p-5 border border-indigo-100 bg-slate-200 rounded-md w-[60%] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <span class="close-modal flex justify-end mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(87 83 78);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
            </span>
            <h2 class="text-xl uppercase text-center font-semibold headline-font mb-6">Sélectionne le status du projet</h2>

            <form action="{{ route('projects.status', $project->id) }}" method="POST" class="flex flex-col">
                @csrf
                @method('PATCH')

                <div class="w-full grid grid-cols-1 items-center mb-3">
                    <select id="status" name="status" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200">
                        <option value="en etudes" {{ $project->status === 'en etudes' ? 'selected' : '' }}>En études</option>
                        <option value="en cours" {{ $project->status === 'en cours' ? 'selected' : '' }} >En cours</option>
                        <option value="realiser" {{ $project->status === 'realiser' ? 'selected' : '' }}>Realiser</option>
                    </select>
                </div> 
                
                <input type="hidden" name="user_id" value="1">
                
                <div class="flex justify-end gap-6 mt-8">
                    <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                    <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Changer</button>
                </div>
            </form>
        </div>
    </div>

@endsection