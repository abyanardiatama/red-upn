@extends('layouts.main')
@section('container')
<div class="px-8 mx-auto max-w-screen-xl">
    <h1 class="font-semibold text-3xl px-8 pt-8 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-transparent bg-clip-text bg-gradient-to-r from-secondary from-1% via-primary via-20% to-black to-10%">Articles</h1>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($articles as $article)
            <div class="relative flex flex-col my-0 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="{{ file_exists(public_path('storage/article_images/' . $article->image)) ? asset('storage/article_images/' . $article->image) : $article->image }}" alt="card-image" />
                </div>
                <div class="p-4">
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold line-clamp-2 tooltip-trigger" data-tooltip-target="tooltip-name-{{ $loop->index }}"">
                        {{ $article->title }}
                    </h6>
                    <div id="tooltip-name-{{ $loop->index }}" role="tooltip" class="absolute z-10 invisible opacity-0 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg tooltip dark:bg-gray-700 transition-opacity duration-300"
                        data-popper-placement="top">
                        {{ $article->title }}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div class="mb-4 rounded-full bg-gray-800 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                        <a href="/articles/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                    </div>
                    <p class="text-slate-600 leading-normal font-light line-clamp-3">
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
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    function _0x374f(_0xae5e59,_0x3eeaa2){const _0x424de1=_0x424d();return _0x374f=function(_0x374f56,_0x10a45f){_0x374f56=_0x374f56-0x66;let _0x13c8fb=_0x424de1[_0x374f56];return _0x13c8fb;},_0x374f(_0xae5e59,_0x3eeaa2);}const _0x42eaab=_0x374f;(function(_0x397fc5,_0x2e55a2){const _0x5db8ff=_0x374f,_0x57405e=_0x397fc5();while(!![]){try{const _0x56ed38=-parseInt(_0x5db8ff(0x74))/0x1+parseInt(_0x5db8ff(0x6f))/0x2*(-parseInt(_0x5db8ff(0x7c))/0x3)+-parseInt(_0x5db8ff(0x6a))/0x4+parseInt(_0x5db8ff(0x66))/0x5+-parseInt(_0x5db8ff(0x7f))/0x6*(-parseInt(_0x5db8ff(0x6c))/0x7)+parseInt(_0x5db8ff(0x78))/0x8+parseInt(_0x5db8ff(0x71))/0x9*(parseInt(_0x5db8ff(0x67))/0xa);if(_0x56ed38===_0x2e55a2)break;else _0x57405e['push'](_0x57405e['shift']());}catch(_0x59e640){_0x57405e['push'](_0x57405e['shift']());}}}(_0x424d,0x43335),document[_0x42eaab(0x72)](_0x42eaab(0x79),function(){const _0x2df88b=_0x42eaab;document['querySelectorAll']('.tooltip-trigger')[_0x2df88b(0x6d)](_0x5239d2=>{const _0x4bbe99=_0x2df88b;let _0x2a779a=_0x5239d2[_0x4bbe99(0x76)]('data-tooltip-target'),_0x349865=document[_0x4bbe99(0x75)](_0x2a779a);if(_0x349865){let _0x2b5cdc=Popper[_0x4bbe99(0x68)](_0x5239d2,_0x349865,{'placement':_0x4bbe99(0x69),'modifiers':[{'name':_0x4bbe99(0x7d),'options':{'boundary':document[_0x4bbe99(0x6b)]}}]});_0x5239d2['addEventListener'](_0x4bbe99(0x6e),function(){const _0x5ad21c=_0x4bbe99;_0x349865[_0x5ad21c(0x7b)][_0x5ad21c(0x7e)]('invisible',_0x5ad21c(0x80)),_0x2b5cdc[_0x5ad21c(0x70)]();}),_0x5239d2[_0x4bbe99(0x72)](_0x4bbe99(0x73),function(){const _0x92a455=_0x4bbe99;_0x349865[_0x92a455(0x7b)][_0x92a455(0x77)](_0x92a455(0x7a),_0x92a455(0x80));});}});}));function _0x424d(){const _0x34afc5=['16650TdSvcQ','update','9sTfYnu','addEventListener','mouseleave','476895LapraQ','getElementById','getAttribute','add','3872920jwQhoz','DOMContentLoaded','invisible','classList','111XqgHwC','preventOverflow','remove','2898zPOudJ','opacity-0','1559440jLVFQK','6891940JNXCsO','createPopper','top','1843064OQsojQ','body','518oREgJa','forEach','mouseenter'];_0x424d=function(){return _0x34afc5;};return _0x424d();}
</script>
@include('partials.footer')
@endsection