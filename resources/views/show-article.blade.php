@extends('layouts.main')
@section('container')
<div class="px-8 mx-auto max-w-full md:flex justify-center">
    <div class="p-6">
        <a href="/articles" class="mb-4 text-sm font-regular text-gray-600 flex items-center underline">
            <svg class="w-5 h-5 mr-1" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"></path>
            </svg>
            Back to Articles
        </a>
        <h2 class="text-3xl font-extrabold dark:text-white">{{ $article->title }}</h2>
        <img src="{{ file_exists(public_path('storage/article_images/' . $article->image)) ? asset('storage/article_images/' . $article->image) : $article->image }}" alt="{{ $article->title }}" alt="{{ $article->title }}" class="h-96 object-cover my-4">
        <div class="flex mt-1">
            <div class="mr-3 flex">
                <svg class="w-4 h-4 mr-2 text-gray-500" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3 3.5A1.5 1.5 0 0 1 4.5 2h1.879a1.5 1.5 0 0 1 1.06.44l1.122 1.12A1.5 1.5 0 0 0 9.62 4H11.5A1.5 1.5 0 0 1 13 5.5v1H3v-3ZM3.081 8a1.5 1.5 0 0 0-1.423 1.974l1 3A1.5 1.5 0 0 0 4.081 14h7.838a1.5 1.5 0 0 0 1.423-1.026l1-3A1.5 1.5 0 0 0 12.919 8H3.081Z"></path>
                </svg>
                <p class="text-sm font-regular text-gray-500">{{ $article->category->name }}</p>
            </div>
            <div class="flex mr-3">
                <svg class="w-4 h-4 mr-2 text-gray-500" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8Zm7.75-4.25a.75.75 0 0 0-1.5 0V8c0 .414.336.75.75.75h3.25a.75.75 0 0 0 0-1.5h-2.5v-3.5Z"></path>
                </svg>
                <p class="text-sm font-regular text-gray-500">{{ $article->created_at }}</p>
            </div>
        </div>
        <div class="my-6 prose">
            {!! $article->body !!}
        </div>
    </div>
    <div>
        <div class="md:m-8 p-6 md:border mg:border-gray-200 h-fit rounded-lg overflow-auto scroll-auto">
            {{-- recent article --}}
            <h2 class="text-xl md:text-lg font-bold mb-4">Recent Articles</h2>
            @foreach ($recentArticles as $recentArticle)
            <div class="mb-4">
                <a href="/articles/{{ $recentArticle->slug }}" class="text-sm font-regular text-gray-600 flex items-center underline hover:text-gray-900">
                    {{-- image --}}
                    <img src="{{ file_exists(public_path('storage/article_images/' . $recentArticle->image)) ? asset('storage/article_images/' . $recentArticle->image) : $recentArticle->image }}" alt="{{ $recentArticle->title }}" class="w-14 h-14 object-cover mr-3">
                    <div>
                        <p class="text-md text-gray-800">{{ $recentArticle->title }}</p>
                        {{-- format date month year --}}
                        <p class="text-xs text-gray-500">{{ $recentArticle->created_at->format('d F Y') }}</p>
                    </div>
                </a>
            </div>
            @endforeach 
        </div>
        <div class="md:m-8 p-6 md:border md:border-gray-200 h-fit rounded-lg block">
            {{-- recent article --}}
            <h2 class="text-xl md:text-lg font-bold mb-4">Categories</h2>
            @foreach ($categories as $category)
            <div class="mb-4">
                <a href="/articles/categories/{{ $category->slug }}" class="text-sm font-regular text-gray-800 flex items-center hover:text-gray-900">
                    <span class="border border-gray-400 p-2 px-2.5 rounded-lg hover:bg-gray-100 mr-3">{{ $category->name }}
                        <span class="text-xs text-gray-500"> - {{ $category->articles->count() }}</span>
                    </span> 
                </a>
            </div>
            @endforeach 
        </div>
    </div>
</div>


@include('partials.footer')
@endsection