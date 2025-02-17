<div class="px-8 mx-auto max-w-screen-xl">
    <div class="flex px-8 pt-8 justify-between">
        <h1 class="font-semibold text-3xl rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-transparent bg-clip-text bg-gradient-to-r from-secondary from-20% via-primary via-99% to-black to-80%">Merchandise</h1>
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
    </div>
    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 place-items-center">
        @foreach ($merchs as $merch)
            <div class="relative flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md">
                <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-lg" href="#">
                {{-- <img class="object-cover" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="product image" /> --}}
                <img class="object-cover w-full" src="{{ file_exists(public_path('storage/merch_images/' . $merch->image)) ? asset('storage/merch_images/' . $merch->image) : $merch->image }}" alt="product image" />
                @if ($merch->status == 1)
                    <span class="absolute top-0 left-0 m-2 rounded-full bg-gray-900 px-3 py-1 text-center text-xs font-medium text-white uppercase">PreOrder</span>
                @elseif ($merch->status == 0)
                    <span class="absolute top-0 left-0 m-2 rounded-full bg-red-700 px-2 py-1 text-center text-xs font-medium text-white uppercase">Sold Out</span>
                @endif
                </a>
                <div class="mt-4 px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl tracking-tight text-slate-900">{{ $merch->name }}</h5>
                    </a>
                    <div class="mt-2 flex items-center justify-between">
                        <p>
                        <span class="text-2xl font-bold text-gray-800">{{ $merch->price }}</span>
                        </p>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 my-2 text-sm">{{ $merch->description }}</p> 
                    <div class="flex">
                        <button href="#" class="flex items-center justify-center rounded-md bg-gray-900 px-5 py-2.5 text-center text-sm font-regular text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300" data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Order Now
                        </button>
                        @include('partials.merchandises.modal-input')
                    </div>
                </div>
            </div>
            {{-- <div class="w-full max-w-sm bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-center">
                    <img class="p-4 rounded-3xl object-cover w-72" src="{{ file_exists(public_path('storage/merch_images/' . $merch->image)) ? asset('storage/merch_images/' . $merch->image) : $merch->image }}" alt="product image" />
                </div>
                <a href="#">
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $merch->name }}</h5>
                    </a>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $merch->price }}</span>
                        <button class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button">Order</button>
                        @include('partials.merchandises.modal-input')
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 my-2">{{ $merch->description }}</p> 
                </div>
            </div> --}}
        @endforeach
    </div>
    <div class="p-6 flex justify-center">
        <div>
            {{ $merchs->links() }}
        </div>
    </div>
</div>
@include('partials.footer')