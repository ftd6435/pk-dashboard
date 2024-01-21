@extends('template')

@section('title', 'Services || Home page')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font text-[2.3rem]">Services</h1>
        <div class="filterButton flex items-center p-1 gap-3 bg-slate-50">
            <button class="py-1 px-3 text-base font-medium rounded text-indigo-50 bg-indigo-500">Filter 1</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 2</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 3</button>
        </div>
    </div>

    <div class="mx-3 flex flex-col">
        @include('pages.admin.include.success')
        @include('pages.admin.include.authError')    

        @can('create', \App\Models\Service::class)
            <button id="service" data-modalName="service-add" class="open-modal my-4 bg-indigo-500 text-indigo-50 py-2 rounded-md uppercase tracking-normal font-semibold hover:bg-indigo-600 transition-all focus:outline-none focus:ring focus:ring-indigo-600">Ajouter un service</button>
        @endcan

        <div role="table" class="shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
            <div role="row" class="grid grid-cols-[auto_0.4fr_1fr_1fr] items-center gap-x-9 tracking-wide transition-none py-6 px-4 bg-slate-50 border-b border-slate-200 uppercase font-semibold">
                <div>#ID</div>
                <div>IMAGE</div>
                <div>TITRE</div>
                <div>ACTIONS</div>
            </div>
            @foreach ($services as $key => $service )
                <div role="row" class="grid grid-cols-[auto_0.4fr_1fr_1fr] items-center gap-x-9 border-b border-slate-200 py-2 px-2 transition-none font-medium">
                    <div class="md:px-4"><?= $key + 1 ?></div>
                    <div>
                        <img class="image" src="/storage/images/services/<?= $service->image ?>" alt="image-<?= $key + 1 ?>">
                    </div>
                    <div><?= $service->title ?></div>
                    <div class="flex gap-3 items-center">
                        @can('update', $service)     
                            <a href="/services/<?= $service->id ?>/edit" class="border border-yellow-400 bg-yellow-500 text-indigo-50 font-medium text-sm px-6 py-1 rounded-lg tracking-wide hover:bg-yellow-400 hover:border-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400 transition-all duration-300">Edit</a>
                        @endcan

                        @can('delete', $service)
                            <form action="/services/<?= $service->id ?>" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez-vous supprimer le service #{{ $service->id }}')" class="border bg-red-600 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-500 transition-all duration-300">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach  
            
        </div>
    </div>

    <div class="modal hidden fixed top-0 left-0 w-full h-screen z-10" data-service-add="open-modal" data-service-edit="open-modal">
        <div class="overlay h-full w-full backdrop-blur"></div>
        <div class="shadow p-5 border border-indigo-100 bg-slate-200 rounded-md w-[60%] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <span class="close-modal flex justify-end mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(87 83 78);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
            </span>
            <h2 class="text-xl uppercase text-center font-semibold headline-font mb-6">Ajouter un nouveau service</h2>

            <form action="/services" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf

                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="title" class="font-medium tracking-wide">Nom:</label>
                    <input type="text" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Nom du service..." id="title" name="title">
                </div>
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                    <label for="description" class="font-medium tracking-wide">Description:</label>
                    <textarea name="description" id="description" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5"></textarea>
                </div>
                <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                    <label for="image" class="font-medium tracking-wide">Image:</label>
                    <input type="file" name="image" id="image" class="block text-sm text-slate-500 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200
                        file:mr-4 file:py-2 file:px-3
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-600 file:text-indigo-50
                        hover:file:bg-indigo-500
                    ">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                
                <div class="flex justify-end gap-6 mt-8">
                    <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                    <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection