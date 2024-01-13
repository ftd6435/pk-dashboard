@extends('template')

@section('title', isset($project->id) ? 'Modifier un projet' : 'Ajouter un projet')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">{{ isset($project->id) ? 'Modifier le projet' : 'Ajouter un projet' }}</h1>
        <a href="/projects" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col">
        <form action="{{ isset($project->id) ? route('projects.update', $project) : route('projects.store') }}" method="POST" class="flex flex-col">
            @csrf
            @method(isset($project->id) ? 'PUT' : 'POST')
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="title" class="font-semibold tracking-wide">Titre:</label>
                <input type="text" value="{{ isset($project->id) ? $project->title : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Titre du projet" id="title" name="title">
            </div>               
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="startDate" class="font-semibold tracking-wide">Date de debut:</label>
                <input type="date" value="{{ isset($project->id) ? $project->formatDate($project->startDate) : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="startDate" name="startDate">
            </div>               
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="endDate" class="font-semibold tracking-wide">Date de fin:</label>
                <input type="date" value="{{ isset($project->id) ? $project->formatDate($project->endDate) : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="endDate" name="endDate">
            </div>               
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="client_id" class="font-semibold tracking-wide">Client:</label>
                <select id="client_id" name="client_id" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200">
                    @foreach ($clients as $client)  
                        <option value="{{ $client->id }}" {{ isset($project->id) ? $project->client_id === $client->id ? 'selected' : '' : '' }}>{{ $client->fullName }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                <label for="details" class="font-semibold tracking-wide">Description:</label>
                <textarea name="details" id="details" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5">{{ isset($project->id) ? $project->details : '' }}</textarea>
            </div>              
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="status" class="font-semibold tracking-wide">Status:</label>
                <select id="status" name="status" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="en etudes" {{ isset($project->id) ? $project->status === 'en etudes' ? 'selected' : '' : '' }}>En études</option>
                    <option value="en cours" {{ isset($project->id) ? $project->status === 'en cours' ? 'selected' : '' : '' }} >En cours</option>
                    <option value="realiser" {{ isset($project->id) ? $project->status === 'realiser' ? 'selected' : '' : '' }}>Realiser</option>
                </select>
            </div>
            
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                <label for="testimonial" class="font-semibold tracking-wide">Temoignage:</label>
                <textarea name="testimonial" id="testimonial" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5">{{ isset($project->id) ? $project->testimonial : '' }}</textarea>
            </div>  
            
            <input type="hidden" name="user_id" value="1">
            
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($project->id) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>

@endsection