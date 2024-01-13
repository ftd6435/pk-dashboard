@extends('template')

@section('title', 'Dashboard || Home page')

@section('content')
    <div class="flex items-center justify-between text-slate-800">
        <h1 class="headline-font text-[2.3rem]">Dashboard</h1>
        <div class="filterButton flex items-center p-1 gap-3 bg-slate-50">
            <button class="py-1 px-3 text-base font-medium rounded text-indigo-50 bg-indigo-500">Filter 1</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 2</button>
            <button class="py-1 px-3 text-base font-medium rounded transition-all duration-300 hover:text-indigo-50 hover:bg-indigo-500 active:text-indigo-50 active:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-500">Filter 3</button>
        </div>
    </div>
@endsection