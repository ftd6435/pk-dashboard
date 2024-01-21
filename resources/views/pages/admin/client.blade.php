@extends('template')

@section('title', 'Client')

@section('content')
    
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font text-[2.3rem]">Clients</h1>
        <div class="filterButton flex items-center p-1 gap-3 bg-slate-50">
            <button class="py-1 px-3 text-base font-medium rounded text-indigo-50 bg-indigo-500">Filter 1</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 2</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 3</button>
        </div>
    </div>

    <div class="mx-3 flex flex-col">
        @include('pages.admin.include.success')
        @include('pages.admin.include.authError')

        @can('create', \App\Models\Client::class)      
            <a href="{{ route('clients.create') }}" class="text-center my-4 bg-indigo-500 text-indigo-50 py-2 rounded-md uppercase tracking-normal font-semibold hover:bg-indigo-600 transition-all focus:outline-none focus:ring focus:ring-indigo-600">Ajouter un client</a>
        @endcan

        <div role="table" class="shadow border border-slate-100 bg-slate-50 rounded overflow-hidden">
            <div role="row" class="grid grid-cols-[auto_0.4fr_0.6fr_1fr_1fr] items-center gap-x-9 tracking-wide transition-none py-6 px-4 bg-slate-50 border-b border-slate-200 uppercase font-semibold">
                <div>#ID</div>
                <div>IMAGE</div>
                <div>Nom</div>
                <div>Email</div>
                <div>ACTIONS</div>
            </div>
            @foreach ($clients as $key => $client )
                <div role="row" class="grid grid-cols-[auto_0.4fr_0.6fr_1fr_1fr] items-center gap-x-9 border-b border-slate-200 py-2 px-2 transition-none font-medium">
                    <div class="md:px-4"><?= $key + 1 ?></div>
                    <div>
                        @php
                            $curClient = $client->image ? "/storage/images/clients/" . $client->image : '/img/avatar.jpeg'; 
                        @endphp

                        <img class="image" src="{{ $curClient }}" alt="image-<?= $key + 1 ?>">
                    </div>
                    <div><?= $client->fullName ?></div>
                    <div><?= $client->email ?></div>
                    <div class="flex gap-3 items-center">
                        @can('update', $client)
                            <a href="{{ route('clients.edit', $client) }}" class="border border-yellow-400 bg-yellow-500 text-indigo-50 font-medium text-sm px-6 py-1 rounded-lg tracking-wide hover:bg-yellow-400 hover:border-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400 transition-all duration-300">Edit</a>
                        @endcan

                        <a href="{{ route('clients.show', $client) }}" class="border border-indigo-400 bg-indigo-500 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-indigo-400 hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 transition-all duration-300">Details</a>
                        
                        @can('delete', $client)
                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez-vous supprimer le client #{{ $client->id }}')" class="border bg-red-600 text-indigo-50 font-medium text-sm px-4 py-1 rounded-lg tracking-wide hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-500 transition-all duration-300">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach  
            
        </div>
    </div>

@endsection