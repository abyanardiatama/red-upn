<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add New Merchandise
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="post" action="/dashboard/merchandises" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Merch Name">
                        @error('name')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product description here"></textarea>
                        @error('description')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        {{-- <input type="text" id="price" oninput="formatNumber('price')" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Merch Price"> --}}
                        <input type="text" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Merch Price">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Masukkan harga tanpa titik '.' Contoh:'20000'</p>
                        {{-- <script>
                            // function formatNumber(elementId) {
                            //     let input = document.getElementById(elementId);
                            //     let value = input.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                            //     if (!value) {
                            //         input.value = ''; // If input is not numeric, clear the field
                            //     } else {
                            //         input.value = formatWithCommas(value);
                            //     }
                            // }
                            // function formatWithCommas(value) {
                            //     return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            // }
                            (function(_0x1d53e0,_0x2ef476){const _0x911e0e=_0x3df6,_0x1a4824=_0x1d53e0();while(!![]){try{const _0xbd144b=-parseInt(_0x911e0e(0x1df))/0x1*(parseInt(_0x911e0e(0x1e5))/0x2)+parseInt(_0x911e0e(0x1e0))/0x3*(parseInt(_0x911e0e(0x1d9))/0x4)+parseInt(_0x911e0e(0x1da))/0x5+-parseInt(_0x911e0e(0x1e2))/0x6*(-parseInt(_0x911e0e(0x1e3))/0x7)+-parseInt(_0x911e0e(0x1d8))/0x8+parseInt(_0x911e0e(0x1db))/0x9+-parseInt(_0x911e0e(0x1e1))/0xa*(parseInt(_0x911e0e(0x1d7))/0xb);if(_0xbd144b===_0x2ef476)break;else _0x1a4824['push'](_0x1a4824['shift']());}catch(_0x54df5f){_0x1a4824['push'](_0x1a4824['shift']());}}}(_0x4e31,0x1cb51));function formatNumber(_0x3aa72f){const _0x2957be=_0x3df6;let _0x2f3a17=document[_0x2957be(0x1dc)](_0x3aa72f),_0x14c3dd=_0x2f3a17[_0x2957be(0x1e4)][_0x2957be(0x1dd)](/[^\d]/g,'');!_0x14c3dd?_0x2f3a17['value']='':_0x2f3a17['value']=formatWithCommas(_0x14c3dd);}function _0x3df6(_0x1ec6c4,_0x527936){const _0x4e3145=_0x4e31();return _0x3df6=function(_0x3df6b2,_0x266e61){_0x3df6b2=_0x3df6b2-0x1d7;let _0x1fb16b=_0x4e3145[_0x3df6b2];return _0x1fb16b;},_0x3df6(_0x1ec6c4,_0x527936);}function _0x4e31(){const _0x623ec5=['9AdRmUV','335850VhdLxb','600276OdZCSh','7XnGWtc','value','196166bZEgLB','33pOAMuB','983272vKcpQo','265500NzJdZG','313005VLtHty','698040RzxkwT','getElementById','replace','toString','1dMOtkb'];_0x4e31=function(){return _0x623ec5;};return _0x4e31();}function formatWithCommas(_0x5e5c39){const _0x21f4c1=_0x3df6;return _0x5e5c39[_0x21f4c1(0x1de)]()[_0x21f4c1(0x1dd)](/\B(?=(\d{3})+(?!\d))/g,'.');}
                        </script> --}}
                        @error('price')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Sale Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Status</option>
                            <option value="1">Pre-Order</option>
                            <option value="0">Sold Out</option>
                        </select>
                        @error('status')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="status_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Display Status</label>
                        <select id="status_active" name="status_active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status_active')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
                        <input class="px-4  `block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">JPEG, PNG, JPG (MAX. 1920x1080px & 5MB).</p>
                        @error('image')
                            <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Create<button>
            </form>
        </div>
    </div>
</div> 