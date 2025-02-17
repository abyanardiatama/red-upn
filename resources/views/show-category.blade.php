@extends('layouts.main')
@section('container')
<div class="px-8 mx-auto max-w-screen-xl">
    <h1 class="font-semibold text-3xl px-8 pt-8 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-transparent bg-clip-text bg-gradient-to-r from-secondary from-5% via-primary via-35% to-black to-10%">{{ $category->name }}</h1>
    <div class="p-6 grid grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($articles as $article)
            <div class="relative flex flex-col my-0 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="card-image" />
                </div>
                <div class="p-4">
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                        {{ $article->title }}
                    </h6>
                    <div class="mb-4 rounded-full bg-gray-800 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                        {{ $article->category->name }}
                    </div>
                    <p class="text-slate-600 leading-normal font-light">
                        {{ $article->excerpt }}
                    </p>
                </div>
                <div class="px-4 pb-4 pt-0 mt-2">
                    <button class="rounded-md bg-gray-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-gray-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <a href="/articles/{{ $article->slug }}">Read more</a>
                    </button>
                </div>
            </div> 
        @endforeach
    </div>
    <div class="p-6 flex justify-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
