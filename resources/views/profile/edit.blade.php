@extends('template')

@section('title', 'Profile Utilisateur')

@section('content')
    
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 class="font-medium">Modifier votre avatar</h2>
            @include('pages.admin.include.error')
            @include('pages.admin.include.success')

            <div class="max-w-xl flex gap-8 mt-6">
                @php
                    $authAvatar = Auth::user()->avatar ? "storage/images/users/" . Auth::user()->avatar : '/img/avatar.jpeg'; 
                @endphp

                <img src="{{ $authAvatar }}" class="w-[9rem] h-[9rem] rounded-full" alt="User avatar" id="previewAvatar">
                <form action="{{ route('profile.avatar') }}" method="POST" class="flex items-center gap-7" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <input type="file" name="avatar" id="userAvatar" class="block text-sm text-slate-500 rounded-xl bg-slate-50 focus:outline-none focus:ring focus:ring-indigo-200
                        file:mr-4 file:py-2 file:px-3
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-600 file:text-indigo-50
                        hover:file:bg-indigo-500
                    ">
    
                    <button type="submit" class="px-5 py-1 rounded-xl border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Valider</button>
                </form>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('pages.admin.include.error')
                @include('pages.admin.include.success')

                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('pages.admin.include.error')
                @include('pages.admin.include.success')

                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('pages.admin.include.error')
                @include('pages.admin.include.success')
                
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

@endsection