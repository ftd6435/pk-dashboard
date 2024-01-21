@extends('template')

@section("title",  isset($user->id) ? 'Modifier un user' : 'Ajouter un user' )

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">{{ isset($user->id) ? 'Modifier le user #' . $user->id : 'Ajouter un user' }}</h1>
        <a href="/users" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col">
        <form action="{{ isset($user->id) ? route('users.alterUser', $user) : route('users.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @method(isset($user->id) ? 'PUT' : 'POST')

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="name" class="font-semibold tracking-wide">Nom:</label>
                <input type="text" value="{{ isset($user->id) ? $user->name : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Nom complet..." id="name" name="name">
            </div>
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="email" class="font-semibold tracking-wide">Email:</label>
                <input type="email" value="{{ isset($user->id) ? $user->email : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="example@gmail.com" id="email" name="email">
            </div>
            
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="avatar" class="font-semibold tracking-wide">Avatar:</label>
                <input type="file" name="avatar" id="avatar" class="block text-sm text-slate-500 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200
                    file:mr-4 file:py-2 file:px-3
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-600 file:text-indigo-50
                    hover:file:bg-indigo-500
                ">
            </div>
            
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="password" class="font-semibold tracking-wide">Mot de passe:</label>
                <input type="password" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="password" name="password">
            </div>

            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="password_confirmation" class="font-semibold tracking-wide">Confirmer mot de passe</label>
                <input type="password" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" id="password_confirmation" name="password_confirmation">
            </div>
                                       
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($user->id) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>
@endsection