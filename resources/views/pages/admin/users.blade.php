@extends('template')

@section('title', 'Liste des utilisateurs || Home page')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mx-3">
        <h1 class="headline-font text-[2.3rem]">Utilisateurs</h1>
        <div class="filterButton flex items-center p-1 gap-3 bg-slate-50">
            <button class="py-1 px-3 text-base font-medium rounded text-indigo-50 bg-indigo-500">Filter 1</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 2</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 3</button>
        </div>
    </div>

    <div class="mx-3 flex flex-col">
        <button class="my-4 bg-indigo-500 text-indigo-50 py-2 rounded-md uppercase tracking-normal font-semibold hover:bg-indigo-600 transition-all focus:outline-none focus:ring focus:ring-indigo-600">Ajouter un utilisateur</button>

        <div role="table" class="shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
            <div role="row" class="grid grid-cols-[auto_0.3fr_0.6fr_1fr_1fr] items-center gap-x-9 tracking-wide transition-none py-6 px-4 bg-slate-50 border-b border-slate-200 uppercase font-semibold">
                <div>#ID</div>
                <div>Profil</div>
                <div>Nom</div>
                <div>Role</div>
                <div>actions</div>
            </div>
            @foreach ($users as $key => $user )
                <div role="row" class="grid grid-cols-[auto_0.3fr_0.6fr_1fr_1fr] items-center gap-x-9 border-b border-slate-200 py-2 px-2 transition-none font-medium">
                    <div class="md:px-4"><?= $key + 1 ?></div>
                    <div>
                        <img src="<?= $user->avatar ?>" class="image-profil" alt="Profil de <?= $user->image ?>">
                    </div>
                    <div class="capitalize"><?= $user->name ?></div>
                    <div class="capitalize"><?= $user->role ?></div>
                    <div class="flex gap-3 items-center">
                        <button class="border border-yellow-400 bg-yellow-500 text-indigo-50 font-medium text-sm px-6 py-1 rounded-lg tracking-wide hover:bg-yellow-400 hover:border-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400 transition-all duration-300">Edit</button>
                        <button class="border bg-red-600 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-500 transition-all duration-300">Delete</button>
                    </div>
                </div>
            @endforeach  
            {{-- <div class="table-footer">

            </div> --}}
        </div>
    </div>
@endsection