@extends('layouts.main')
@section('container')
<div class="px-8 mx-auto max-w-screen-xl">
    <h1 class="font-semibold text-3xl px-8 pt-8 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-transparent bg-clip-text bg-gradient-to-r from-secondary from-1% via-primary via-15% to-black to-10%">Events</h1>
    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6 place-items-center">
        @foreach ($events as $event)
        <div class="flex flex-col rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white md:max-w-xl md:flex-row border border-gray-200">
            {{-- <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:!rounded-none md:!rounded-s-lg" src="https://tecdn.b-cdn.net/wp-content/uploads/2020/06/vertical.jpg" alt="" /> --}}
            <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:!rounded-none md:!rounded-s-lg" src="{{ file_exists(public_path('storage/event-images/' . $event->image)) ? asset('storage/event-images/' . $event->image) : $event->image }}" alt="" />
            <div class="flex flex-col justify-start p-6">
                <h5 class="mb-2 text-xl font-semibold">{{ $event->name }}</h5>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">{{ $event->created_at->format('F, Y') }}</p>
                <p class="mb-4 text-base">
                    {{ $event->description }}
                </p>
                <p class="text-xs text-surface/75 dark:text-neutral-300">
                {{-- created_at get last added x minutes ago --}}
                {{ $event->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
            {{-- <div href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex">
                    <img class="object-cover rounded-t-lg w-56 h-56 md:rounded-none md:rounded-s-lg" src="{{ file_exists(public_path('storage/event-images/' . $event->image)) ? asset('storage/event-images/' . $event->image) : $event->image }}" alt="">
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $event->name }}</h5>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">{{ $event->created_at->format('F, Y') }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->description }}</p>
                </div>
            </div> --}}
        @endforeach
    </div>
    <div class="p-6 flex justify-center">
        <div>
            {{ $events->links()  }}
        </div>
    </div>
    
</div>

@include('partials.footer')
@endsection