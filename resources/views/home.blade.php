@extends('layouts.main')
@section('container')
<div class="px-8 mx-auto ">
    @include('partials.home.carousel')
    @include('partials.home.articles')
    {{-- @include('partials.home.podcasts') --}}
</div>
@include('partials.footer')
@endsection