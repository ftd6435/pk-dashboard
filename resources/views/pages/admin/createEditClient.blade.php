@extends('template')

@section("title",  isset($client->id) ? 'Modifier un client' : 'Ajouter un client' )

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">{{ isset($client->id) ? 'Modifier le client #' . $client->id : 'Ajouter un client' }}</h1>
        <a href="/clients" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col shadow border border-slate-100 bg-slate-50 rounded overflow-hidden p-6">
        <form action="{{ isset($client->id) ? route('clients.update', $client) : route('clients.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @method(isset($client->id) ? 'PUT' : 'POST')

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="fullName" class="font-semibold tracking-wide">Nom:</label>
                <input type="text" value="{{ isset($client->id) ? $client->fullName : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Nom complet..." id="fullname" name="fullName">
            </div>
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="email" class="font-semibold tracking-wide">Email:</label>
                <input type="email" value="{{ isset($client->id) ? $client->email : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="example@gmail.com" id="email" name="email">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="address" class="font-semibold tracking-wide">Adresse:</label>
                <input type="text" value="{{ isset($client->id) ? $client->address : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="0000 adresse" id="address" name="address">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="profession" class="font-semibold tracking-wide">Proféssion:</label>
                <input type="text" value="{{ isset($client->id) ? $client->profession : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="funder of..." id="profession" name="profession">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="website" class="font-semibold tracking-wide">Site web:</label>
                <input type="text" value="{{ isset($client->id) ? $client->website : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="www.website.com" id="website" name="website">
            </div>
            
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="image" class="font-semibold tracking-wide">Profil:</label>
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
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($client->id) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>
@endsection