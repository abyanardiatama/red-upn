@extends('dashboard.layouts.main')
@section('container')
<div class="p-4 rounded-lg dark:border-gray-700 mt-14">
    <div class="flex justify-between">
        <h2 class="text-3xl font-bold dark:text-white pb-6">Edit About Section </h2>
        @if (session('success'))
            <div id="toast-success" class="flex items-center w-full max-w-xs p-2 mb-6 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
    </div>
    @if (session('error'))
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-2 mb-6 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <form class="max-w-4xl" method="post" action="/dashboard/about" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="current_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image</label>
                <img src="{{ file_exists(public_path('/storage/about_image/' . $about->image)) ? asset('storage/about_image/' . $about->image) : $about->image }}" alt="{{ $about->image }}" alt="{{ $about->image }}" class="w-fit h-72 object-cover mb-2">
                <input type="hidden" name="current_image" value="{{ $about->image }}">
            </div>
            <div class="col-span-2 sm:col-span-2">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Image</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full pl-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="image" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">JPEG, PNG, JPG (RECOMMENDED RES. 1214x288px & 5MB).</p>
                @error('image')
                    <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-span-1">
                <label for="visi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi</label>
                <textarea id="visi" name="vision" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $about->vision }}" placeholder="Type Vision">{{ $about->vision }}</textarea>
                @error('vision')
                    <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                @enderror                    
            </div>
            <div class="col-span-1">
                <label for="misi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi</label>
                <textarea id="misi" name="mission" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $about->mission }}" placeholder="Type Mission">{{ $about->mission }}</textarea>
                @error('mission')
                    <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                @enderror                     
            </div>
            <div class="col-span-2">
                <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 mt-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection