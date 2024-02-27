@extends('template')

@section('title', 'Ajout des images || By: Pathé PK')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">Ajout des images du projet: #{{ $project->name($project->title) }}</h1>
        <a href="/projects" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col shadow border border-slate-100 bg-slate-50 rounded overflow-hidden p-6">
        @isset($images)
            <div class="mb-3 grid grid-cols-3 items-center">
                @foreach ($images as $key => $image)
                    <img src="/storage/images/projects/{{ $image }}" alt="project-image-{{ $key + 1 }}">
                @endforeach
            </div>
        @endisset

        <form action="{{ isset($images) ? route('images.update', $images_id) : route('images.store') }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @csrf
            @method(isset($images) ? 'PUT' : 'POST')
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="imagesMutiple" class="font-medium tracking-wide">Selectionner les images:</label>
                <input type="file" name="images[]" id="imagesMutiple" class="block text-sm text-slate-500 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200
                    border border-indigo-400
                    file:mr-4 file:py-2 file:px-3
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-600 file:text-indigo-50
                    hover:file:bg-indigo-500
                " multiple>
            </div>               
            
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($images) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>
@endsection
