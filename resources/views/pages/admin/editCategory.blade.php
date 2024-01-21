@extends('template')

@section('title', 'Edit a catergory || By: Pathé PK')

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">Modification catégorie #<?= $category->id ?></h1>
        <a href="/categories" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col">
        <form action="{{ route('category.update', $category) }}" method="POST" class="flex flex-col">
            @csrf
            @method('PUT')
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="name" class="font-semibold tracking-wide">Catégorie:</label>
                <input type="text" value="{{ $category->name }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Nom de la catég..." id="name" name="name">
            </div>               
            
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Modifier</button>
            </div>
        </form>
    </div>
@endsection
