<div id="edit-user-modal-{{ $user->id }}" tabindex="1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-user-modal-{{ $user->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="" method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid gap-4 mb-4 grid-cols-2 p-4 md:p-5">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('name')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('email')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type User Old Password">
                        @error('current_password')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type User New Password">
                        @error('password')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="current_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image Profile</label>
                        <img src="{{ file_exists(public_path('storage/user_images/' . $user->image)) ? asset('storage/user_images/' . $user->image) : $user->image }}" alt="{{ $user->name }}" alt="{{ $user->name }}" class="w-32 h-32 object-cover mb-2">
                        <input type="hidden" name="current_image" value="{{ $user->image }}">
                    </div>
                    <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Image</label>
                        <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">JPEG, PNG, JPG (MAX. 1920x1080px & 5MB).</p>
                        @error('image')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>