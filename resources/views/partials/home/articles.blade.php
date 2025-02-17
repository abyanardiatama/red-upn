<h1 class="font-semibold text-3xl rounded-lg pl-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <a href="/articles" class="hover:text-transparent bg-gradient-to-r from-primary from-30% via-secondary via-50% to-black to-90% bg-clip-text transition duration-300 ease-in-out">
        Articles
    </a>
</h1>

<!-- Articles Slider -->
<div class="relative p-6">
    <!-- Slider Container -->
    <div id="article-slider" class="flex gap-4 overflow-hidden no-scrollbar">
        @foreach ($articles as $article)
            <div class="flex-none w-80 bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ file_exists(public_path('storage/article_images/' . $article->image)) ? asset('storage/article_images/' . $article->image) : $article->image }}" class="h-48 w-full object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold line-clamp-1">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-600 line-clamp-3 py-2 mb-2">{{ Str::limit($article->excerpt, 100) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="rounded-md bg-gray-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-gray-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Read more</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navigation Buttons -->
    <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 px-3 rounded-full shadow-lg">
        &#9664;
    </button>
    <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 px-3 rounded-full shadow-lg">
        &#9654;
    </button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('article-slider');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        prevButton.addEventListener('click', () => {
            slider.scrollBy({ left: -300, behavior: 'smooth' });
        });

        nextButton.addEventListener('click', () => {
            slider.scrollBy({ left: 300, behavior: 'smooth' });
        });
    });
</script>



