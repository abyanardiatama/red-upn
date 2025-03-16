@extends('layouts.main')
@section('container')
@if ($merchs->count() == 0)
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
            <img src="/red-logo-nobg.png" class="mx-auto mb-4 h-24" alt="Logo RED UPN" />
            <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-5xl dark:text-white">No contents available at the moment.</h1>
            <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">It looks like this page is still empty. But don't worry, we're working on something exciting for you!</p>
        </div>
    </section>
@endif
@include('partials.merchandises.product-card')
@endsection