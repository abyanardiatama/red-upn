<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Order
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="post" action="/merchandises/order" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" name="merch_id" value="{{ $merch->id }}" class="hidden">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Member Name" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Adress" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip Code</label>
                        <input type="text" name="zip" id="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Zip Code" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Phone Number" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Quantity" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <select id="payment_method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Payment Method</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                            <option value="OVO">OVO</option>
                            <option value="Gopay">Gopay</option>
                            <option value="Dana">Dana</option>

                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">QRIS</label>
                        <div class="flex">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=450x450&data=Example" alt="QRIS" class="w-48 rounded-lg">
                            <ul class="px-8 list-disc">
                                Metode Pembayaran Alternatif
                                <li>BCA : 1234567890 (Admin)</li>
                                <li>BNI : 1234567890 (Admin)</li>
                                <li>BRI : 1234567890 (Admin)</li>
                                <li>Mandiri : 1234567890 (Admin)</li>
                                <li>DANA : 1234567890 (Admin)</li>
                                <li>Gopay : 1234567890 (Admin)</li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Proof of Payment</label>
                        <input class="px-4  `block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image" id="image" name="image" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image">Upload proof of payment max:200kb </div>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Create<button>
            </form>
        </div>
    </div>
</div> 