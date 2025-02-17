<div id="edit-modal-{{ $merch->id }}" tabindex="1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Merchandise
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-{{ $merch->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post" action="/dashboard/merchandises/{{ $merch->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid gap-4 mb-4 grid-cols-2 p-4 md:p-5">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{ $merch->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Write product description here">{{ $merch->description }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priceeee</label>
                        <input type="text" id="price" oninput="formatNumber('price')" value="formatNumber({{ $merch->price }})" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        <script>
                            (function(_0x44c6ab,_0x574324){const _0x2a7b02=_0x201e,_0x7ac1b8=_0x44c6ab();while(!![]){try{const _0x3e64c1=parseInt(_0x2a7b02(0xb6))/0x1+-parseInt(_0x2a7b02(0xbe))/0x2+-parseInt(_0x2a7b02(0xb1))/0x3+-parseInt(_0x2a7b02(0xb8))/0x4*(parseInt(_0x2a7b02(0xb3))/0x5)+-parseInt(_0x2a7b02(0xb2))/0x6*(parseInt(_0x2a7b02(0xbc))/0x7)+parseInt(_0x2a7b02(0xb9))/0x8*(-parseInt(_0x2a7b02(0xb7))/0x9)+parseInt(_0x2a7b02(0xba))/0xa;if(_0x3e64c1===_0x574324)break;else _0x7ac1b8['push'](_0x7ac1b8['shift']());}catch(_0x42b74f){_0x7ac1b8['push'](_0x7ac1b8['shift']());}}}(_0x45a3,0x81a8f));function _0x45a3(){const _0x14f3bb=['28665lzappK','52680LGKFQK','1304TrWRyX','15763260hZBBOn','getElementById','7OuzNks','replace','1073902MEuZHf','1538985qPEigH','1248834liYOqF','5FIkEwy','toString','value','745171wKsXaf'];_0x45a3=function(){return _0x14f3bb;};return _0x45a3();}function _0x201e(_0x29694a,_0x314afa){const _0x45a37f=_0x45a3();return _0x201e=function(_0x201e9b,_0x5c17c2){_0x201e9b=_0x201e9b-0xb1;let _0x2cb706=_0x45a37f[_0x201e9b];return _0x2cb706;},_0x201e(_0x29694a,_0x314afa);}function formatNumber(_0x21f26c){const _0x1ec2ea=_0x201e;let _0xeb1856=document[_0x1ec2ea(0xbb)](_0x21f26c),_0xcfc7dc=_0xeb1856[_0x1ec2ea(0xb5)][_0x1ec2ea(0xbd)](/[^\d]/g,'');!_0xcfc7dc?_0xeb1856[_0x1ec2ea(0xb5)]='':_0xeb1856[_0x1ec2ea(0xb5)]=formatWithCommas(_0xcfc7dc);}function formatWithCommas(_0x59650d){const _0x384012=_0x201e;return _0x59650d[_0x384012(0xb4)]()[_0x384012(0xbd)](/\B(?=(\d{3})+(?!\d))/g,'.');}
                        </script>
                    </div>
                    <div class="col-span-2">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Sale Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Status</option>
                            <option value="1" {{ $merch->status == 1 ? 'selected' : '' }}>Pre-Order</option>
                            <option value="0" {{ $merch->status == 0 ? 'selected' : '' }}>Sold Out</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="status_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Display Status</label>
                        <select id="status_active" name="status_active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Status</option>
                            <option value="1" {{ $merch->status_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $merch->status_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="current_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image Profile</label>
                        <img src="{{ file_exists(public_path('storage/merch_images/' . $merch->image)) ? asset('storage/merch_images/' . $merch->image) : $merch->image }}" alt="{{ $merch->name }}" alt="{{ $merch->name }}" class="w-32 h-32 object-cover mb-2">
                        <input type="hidden" name="current_image" value="{{ $merch->image }}">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Update Image</label>
                        <input class="px-4  `block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Leave this empty if you don't want to change the image.</p>
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>