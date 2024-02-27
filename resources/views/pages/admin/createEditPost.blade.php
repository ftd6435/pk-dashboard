@extends('template')

@section("title",  isset($post->title) ? 'Modifier un projet' : 'Ajouter un projet' )

@section('content')
    <div class="flex items-center justify-between text-slate-800 mb-6 mx-3">
        <h1 class="headline-font font-medium text-[2.3rem]">{{ isset($post->id) ? 'Modifier l\'article #' . $post->id : 'Ajouter un article' }}</h1>
        <a href="/blog" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">&LeftArrow; Retour</a>
    </div>

    @include('pages.admin.include.error')

    <div class="mx-3 flex flex-col shadow border border-slate-100 bg-slate-50 rounded overflow-hidden p-6">
        <form action="{{ isset($post->id) ? route('blog.update', $post) : route('blog.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @method(isset($post->id) ? 'PUT' : 'POST')
        
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="title" class="font-semibold tracking-wide">Titre:</label>
                <input type="text" value="{{ isset($post->id) ? $post->title : '' }}" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Titre de l'article..." id="title" name="title">
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
                         
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3 items-center mb-3">
                <label for="category_id" class="font-semibold tracking-wide">Category:</label>
                <select id="category_id" name="category_id" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200">
                    @foreach ($categories as $category)  
                        <option value="{{ $category->id }}" {{ isset($post->id) ? $post->category_id === $category->id ? 'selected' : '' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="w-full grid grid-cols-[0.2fr_1fr] gap-3  mb-3">
                <label for="content" class="font-semibold tracking-wide">Contenu:</label>
                <textarea name="content" id="content" class="px-3 py-2 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200" rows="5">{{ isset($post->id) ? $post->content : '' }}</textarea>
            </div>              
                           
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
            <div class="flex justify-end gap-6 mt-8">
                <button type="reset" class="px-6 py-2 rounded-xl border border-red-600 font-medium hover:border-red-600 hover:text-red-500 focus:outline-none focus:ring focus:ring-red-600 transition-all duration-300">Annuler</button>
                <button type="submit" class="px-6 py-2 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">{{ isset($post->id) ? 'Modifier' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>
@endsection