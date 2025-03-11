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
                <h5 class="mb-2 text-xl font-semibold line-clamp-1 tooltip-trigger" data-tooltip-target="tooltip-name-{{ $loop->index }}">{{ $event->name }}</h5>
                <div id="tooltip-name-{{ $loop->index }}" role="tooltip" class="absolute z-10 invisible opacity-0 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg tooltip dark:bg-gray-700 transition-opacity duration-300"
                    data-popper-placement="top">
                    {{ $event->name }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">{{ $event->created_at->format('F, Y') }}</p>
                <p class="mb-4 text-base line-clamp-6 tooltip-trigger" data-tooltip-target="tooltip-desc-{{ $loop->index }}">
                    {{ $event->description }}
                </p>
                <div id="tooltip-desc-{{ $loop->index }}" role="tooltip" 
                    class="absolute z-10 invisible opacity-0 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-lg tooltip dark:bg-gray-700 transition-opacity duration-300"
                    data-popper-placement="top"
                    style="white-space: normal; max-width: 350px; word-break: break-word;">
                    {{ $event->description }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <p class="text-xs text-surface/75 dark:text-neutral-300">
                {{ $event->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-6 flex justify-center">
        <div>
            {{ $events->links()  }}
        </div>
    </div>
</div>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    const _0x25b653=_0x365f;function _0x4a54(){const _0x2488ca=['4NAvQZj','classList','6YXmpUd','getAttribute','invisible','preventOverflow','update','.tooltip-trigger','7384pRKqiS','DOMContentLoaded','data-tooltip-target','2tvEAaE','opacity-0','add','3303VQSJNx','body','querySelectorAll','826190SFnnJw','299969VUQrgd','addEventListener','222719mFRPZY','createPopper','mouseenter','714662gEfUzq','60rPBdJH','818049NhNMgn','forEach','1408005KPgroH','22SMKQTG','remove','mouseleave'];_0x4a54=function(){return _0x2488ca;};return _0x4a54();}function _0x365f(_0x4bccb2,_0x22e8b1){const _0x4a5487=_0x4a54();return _0x365f=function(_0x365f80,_0x33fae2){_0x365f80=_0x365f80-0x182;let _0x5d2d73=_0x4a5487[_0x365f80];return _0x5d2d73;},_0x365f(_0x4bccb2,_0x22e8b1);}(function(_0x1bcd87,_0x272bb5){const _0x4c9e5b=_0x365f,_0xa27a5c=_0x1bcd87();while(!![]){try{const _0x36bfd9=parseInt(_0x4c9e5b(0x192))/0x1*(-parseInt(_0x4c9e5b(0x18b))/0x2)+parseInt(_0x4c9e5b(0x199))/0x3*(parseInt(_0x4c9e5b(0x19f))/0x4)+parseInt(_0x4c9e5b(0x19b))/0x5+-parseInt(_0x4c9e5b(0x182))/0x6*(-parseInt(_0x4c9e5b(0x194))/0x7)+-parseInt(_0x4c9e5b(0x188))/0x8*(-parseInt(_0x4c9e5b(0x18e))/0x9)+parseInt(_0x4c9e5b(0x191))/0xa*(-parseInt(_0x4c9e5b(0x19c))/0xb)+parseInt(_0x4c9e5b(0x198))/0xc*(-parseInt(_0x4c9e5b(0x197))/0xd);if(_0x36bfd9===_0x272bb5)break;else _0xa27a5c['push'](_0xa27a5c['shift']());}catch(_0xc750b0){_0xa27a5c['push'](_0xa27a5c['shift']());}}}(_0x4a54,0x2d1bd),document[_0x25b653(0x193)](_0x25b653(0x189),function(){const _0x234353=_0x25b653;document[_0x234353(0x190)](_0x234353(0x187))[_0x234353(0x19a)](_0x50a498=>{const _0x3a30cd=_0x234353;let _0x1517b8=_0x50a498[_0x3a30cd(0x183)](_0x3a30cd(0x18a)),_0x26a077=document['getElementById'](_0x1517b8);if(_0x26a077){let _0x3dc6d5=Popper[_0x3a30cd(0x195)](_0x50a498,_0x26a077,{'placement':'top','modifiers':[{'name':_0x3a30cd(0x185),'options':{'boundary':document[_0x3a30cd(0x18f)]}}]});_0x50a498[_0x3a30cd(0x193)](_0x3a30cd(0x196),function(){const _0x3e0e7f=_0x3a30cd;_0x26a077[_0x3e0e7f(0x1a0)][_0x3e0e7f(0x19d)]('invisible',_0x3e0e7f(0x18c)),_0x3dc6d5[_0x3e0e7f(0x186)]();}),_0x50a498['addEventListener'](_0x3a30cd(0x19e),function(){const _0x53f7b3=_0x3a30cd;_0x26a077[_0x53f7b3(0x1a0)][_0x53f7b3(0x18d)](_0x53f7b3(0x184),_0x53f7b3(0x18c));});}});}));
</script>

@include('partials.footer')
@endsection