<nav class="bg-white border-gray-200 dark:bg-gray-900 border border-b-black">
    <div class="max-w-full flex flex-wrap items-center justify-between mx-auto p-4 px-16">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/red-logo-nobg.png" class="h-8" alt="Logo RED UPN" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @if (!Auth::check())
          <button type="button" class="font-medium rounded-lg text-sm px-4 py-2 text-center text-white bg-gray-800 hover:bg-gray-900">
            <a href="/login">Login</a>
          </button>
        @endif
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition-opacity duration-1000" id="navbar-cta">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 px-3 md:p-0 {{ Request::is('/') ? 'bg-red-700 rounded md:bg-transparent md:text-red-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700'}} md:hover:bg-transparent md:hover:text-red-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
        </li>
        <li>
          <a href="/about" class="block py-2 px-3 md:p-0 {{ Request::is('about') ? 'bg-red-700 rounded md:bg-transparent md:text-red-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700'}} md:hover:bg-transparent md:hover:text-primary md:dark:hover:text-blue-500 dark:text-white dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="/events" class="block py-2 px-3 md:p-0 {{ Request::is('events') ? 'bg-red-700 rounded md:bg-transparent md:text-red-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700'}} md:hover:bg-transparent md:hover:text-primary md:dark:hover:text-blue-500 dark:text-white dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Events</a>
        </li>
        <li>
          <a href="/articles" class="block py-2 px-3 md:p-0 {{ Request::is('articles') ? 'bg-red-700 rounded md:bg-transparent md:text-red-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700'}} md:hover:bg-transparent md:hover:text-primary md:dark:hover:text-blue-500 dark:text-white dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Articles</a>
        </li>
        <li>
          <a href="/merchandises" class="block py-2 px-3 md:p-0 {{ Request::is('merchandises') ? 'bg-red-700 rounded md:bg-transparent md:text-red-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700'}} md:hover:bg-transparent md:hover:text-primary md:dark:hover:text-blue-500 dark:text-white dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Merchandise</a>
        </li>
      </ul>
    </div>
    </div>
</nav>
