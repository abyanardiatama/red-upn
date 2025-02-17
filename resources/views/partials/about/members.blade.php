<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
            <h2 class="mb-4 text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-secondary from-10% via-primary via-30% to-black to-60% dark:text-white">Kepengurusan</h2>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">RED Periode {{ date("Y") }} / {{ date("Y")+1 }}</p>
        </div> 
        <div class="grid gap-4 lg:gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($members as $member)
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ file_exists(public_path('storage/member_images/' . $member->image)) ? asset('storage/member_images/' . $member->image) : $member->image }}" alt="{{ $member->name }}">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">{{ $member->name }}</a>
                    </h3>
                    <p>{{ $member->jabatan }}</p>
                </div>
            @endforeach
        </div>  
    </div>
</section>