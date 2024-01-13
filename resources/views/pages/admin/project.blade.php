@extends('template')

@section('title', 'Projects || Home page')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mx-3">
        <h1 class="headline-font text-[2.3rem]">Projects</h1>
        <div class="filterButton flex items-center p-1 gap-3 bg-slate-50">
            <button class="py-1 px-3 text-base font-medium rounded text-indigo-50 bg-indigo-500">Filter 1</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 2</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 3</button>
        </div>
    </div>

    <div class="mx-3 flex flex-col">
        @include('pages.admin.include.success')

        <a href="{{ route('projects.create') }}" class="text-center my-4 bg-indigo-500 text-indigo-50 py-2 rounded-md uppercase tracking-normal font-semibold hover:bg-indigo-600 transition-all focus:outline-none focus:ring focus:ring-indigo-600">Ajouter un projet</a>

        <div role="table" class="shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
            <div role="row" class="grid grid-cols-[auto_0.6fr_0.6fr_1fr_0.6fr_1fr] items-center gap-x-9 tracking-wide transition-none py-6 px-4 bg-slate-50 border-b border-slate-200 uppercase font-semibold">
                <div>#ID</div>
                <div>IMAGE</div>
                <div>CLIENT</div>
                <div>TITRE</div>
                <div>ETAT</div>
                <div>ACTIONS</div>
            </div>
            @foreach ($projects as $key => $project )
                <div role="row" class="grid grid-cols-[auto_0.6fr_0.6fr_1fr_0.6fr_1fr] items-center gap-x-9 border-b border-slate-200 py-2 px-2 transition-none font-medium">
                    <div class="md:px-4"><?= $key + 1 ?></div>
                    <div>
                        <img class="image" src="<?= $project->client->image ?>" alt="image-<?= $key + 1 ?>">
                    </div>
                    <div class="capitalize"><?= $project->client->fullName ?></div>
                    <div><?= $project->title ?></div>
                    <div class="capitalize <?= $project->status === "en cours" ? 'text-yellow-400' : ($project->status === "en etudes" ? "text-indigo-500" :  "text-green-400")  ?>"><?= $project->status ?></div>
                    <div class="flex gap-2 items-center">
                        <a href="{{ route('projects.edit', $project->id) }}" class="border border-yellow-400 bg-yellow-500 text-indigo-50 font-medium text-sm px-6 py-1 rounded-lg tracking-wide hover:bg-yellow-400 hover:border-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400 transition-all duration-300">Edit</a>
                        <a href="{{ route('projects.show', $project->id) }}" class="border border-indigo-400 bg-indigo-500 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-indigo-400 hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 transition-all duration-300">Details</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Voulez-vous vraiment supprimer ce projet?');" class="border bg-red-600 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-500 transition-all duration-300">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach  
            
            {{ $projects->links() }}
        </div>
    </div>

@endsection