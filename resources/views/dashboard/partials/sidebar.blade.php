<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="/" class="flex ms-2 md:me-24">
            <img src="/red-logo-nobg.png" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-lg font-semibold sm:text-lg whitespace-nowrap dark:text-white">Content Management</span>
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
                <svg id="moon" class="hidden w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 18 20">
                    <path d="M17.8 13.75a1 1 0 0 0-.859-.5A7.488 7.488 0 0 1 10.52 2a1 1 0 0 0 0-.969A1.035 1.035 0 0 0 9.687.5h-.113a9.5 9.5 0 1 0 8.222 14.247 1 1 0 0 0 .004-.997Z"/>
                </svg>
                <svg id="sun" class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="salmon" viewBox="0 0 20 20">
                    <path d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"/>
                </svg>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="dark-mode-toggle" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                </label>
            <div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="{{ file_exists(public_path('storage/user_images/' . Auth::user()->image)) ? asset('storage/user_images/' . Auth::user()->image) : Auth::user()->image }}" alt="{{ Auth::user()->name }}" alt="user photo">
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900 dark:text-white" role="none">
                     @auth
                        {{ Auth::user()->name }}
                     @endauth
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                    @auth
                        {{ Auth::user()->email }}   
                    @endauth
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem"><button type="button" data-modal-target="edit-user-modal-{{ Auth::user()->id }}" data-modal-toggle="edit-user-modal-{{ Auth::user()->id }}">Profile</button></a>
                  </li>
                  <li>
                    <form action="/logout" method="post" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
              
            </div>
          </div>
      </div>
    </div>
</nav>
  
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-3 font-normal text-md">
            <li>
               <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 hover:text-red-700 dark:hover:bg-gray-700 group">
                  <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                     <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                  </svg>
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="/dashboard/users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
               </a>
            </li>
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-home" data-collapse-toggle="dropdown-home">
                     <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"></path>
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Home Page</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="dropdown-home" class="hidden py-2 space-y-2 ml-5">
                     <li>
                        <a href="/dashboard/carousels" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                           <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M2.5 3A1.5 1.5 0 0 0 1 4.5v4A1.5 1.5 0 0 0 2.5 10h6A1.5 1.5 0 0 0 10 8.5v-4A1.5 1.5 0 0 0 8.5 3h-6Zm11 2A1.5 1.5 0 0 0 12 6.5v7a1.5 1.5 0 0 0 1.5 1.5h4a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 17.5 5h-4Zm-10 7A1.5 1.5 0 0 0 2 13.5v2A1.5 1.5 0 0 0 3.5 17h6a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 9.5 12h-6Z"></path>
                           </svg>
                           <span class="flex-1 ms-3 whitespace-nowrap">Carousels</span>
                        </a>
                     </li>
               </ul>
            </li>
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-about" data-collapse-toggle="dropdown-about">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z"></path>
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">About Page</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="dropdown-about" class="hidden py-2 space-y-2 ml-5">
                  <li>
                     <a href="/dashboard/about" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75Zm0 10.5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75ZM2 10a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 2 10Z"></path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">About</span>
                     </a>
                  </li>
                  <li>
                     <a href="/dashboard/members" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                           <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z"></path>
                     </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Members</span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-articles" data-collapse-toggle="dropdown-articles">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm2.25 8.5a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 3a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z"></path>
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Articles Page</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="dropdown-articles" class="hidden py-2 space-y-2 ml-5">
                  <li>
                     <a href="/dashboard/articles" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                           <path d="M3 3.5A1.5 1.5 0 0 1 4.5 2h6.879a1.5 1.5 0 0 1 1.06.44l4.122 4.12A1.5 1.5 0 0 1 17 7.622V16.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 16.5v-13Z"></path>
                     </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Articles</span>
                     </a>
                  </li>
                  <li>
                     <a href="/dashboard/categories" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                           <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Category</span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-events" data-collapse-toggle="dropdown-events">
                      <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 0 0 1.33 0l1.713-3.293a.783.783 0 0 1 .642-.413 41.102 41.102 0 0 0 3.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0 0 10 2ZM6.75 6a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 2.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"></path>
                      </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Events Page</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="dropdown-events" class="hidden py-2 space-y-2 ml-5">
                  <li>
                     <a href="/dashboard/events" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                          <path clip-rule="evenodd" fill-rule="evenodd" d="M15.75 3A2.25 2.25 0 0 1 18 5.25v1.214c0 .423-.277.788-.633 1.019A2.997 2.997 0 0 0 16 10c0 1.055.544 1.982 1.367 2.517.356.231.633.596.633 1.02v1.213A2.25 2.25 0 0 1 15.75 17H4.25A2.25 2.25 0 0 1 2 14.75v-1.213c0-.424.277-.789.633-1.02A2.998 2.998 0 0 0 4 10a2.997 2.997 0 0 0-1.367-2.517C2.277 7.252 2 6.887 2 6.463V5.25A2.25 2.25 0 0 1 4.25 3h11.5ZM13.5 7.396a.75.75 0 0 0-1.5 0v1.042a.75.75 0 0 0 1.5 0V7.396Zm0 4.167a.75.75 0 0 0-1.5 0v1.041a.75.75 0 0 0 1.5 0v-1.041Z"></path>
                       </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Events</span>
                     </a>
                   </li>
               </ul>
            </li>
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-merchandise" data-collapse-toggle="dropdown-merchandise">
                  <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                     <path clip-rule="evenodd" fill-rule="evenodd" d="M9.25 3H3.5A1.5 1.5 0 0 0 2 4.5v4.75h3.365A2.75 2.75 0 0 1 9.25 5.362V3ZM2 10.75v4.75A1.5 1.5 0 0 0 3.5 17h5.75v-4.876A4.75 4.75 0 0 1 5 14.75a.75.75 0 0 1 0-1.5 3.251 3.251 0 0 0 3.163-2.5H2ZM10.75 17h5.75a1.5 1.5 0 0 0 1.5-1.5v-4.75h-6.163A3.251 3.251 0 0 0 15 13.25a.75.75 0 0 1 0 1.5 4.75 4.75 0 0 1-4.25-2.626V17ZM18 9.25V4.5A1.5 1.5 0 0 0 16.5 3h-5.75v2.362a2.75 2.75 0 0 1 3.885 3.888H18Zm-4.496-2.755a1.25 1.25 0 0 0-1.768 0c-.36.359-.526.999-.559 1.697-.01.228-.006.443.004.626.183.01.398.014.626.003.698-.033 1.338-.2 1.697-.559a1.25 1.25 0 0 0 0-1.767Zm-5.24 0a1.25 1.25 0 0 0-1.768 1.767c.36.36 1 .526 1.697.56.228.01.443.006.626-.004.01-.183.015-.398.004-.626-.033-.698-.2-1.338-.56-1.697Z"></path>
                  </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Merchandise Page</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
               </button>
               <ul id="dropdown-merchandise" class="hidden py-2 space-y-2 ml-5">
                  <li>
                     <a href="/dashboard/merchandises" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                          <path clip-rule="evenodd" fill-rule="evenodd" d="M14 6a2.5 2.5 0 0 0-4-3 2.5 2.5 0 0 0-4 3H3.25C2.56 6 2 6.56 2 7.25v.5C2 8.44 2.56 9 3.25 9h6V6h1.5v3h6C17.44 9 18 8.44 18 7.75v-.5C18 6.56 17.44 6 16.75 6H14Zm-1-1.5a1 1 0 0 1-1 1h-1v-1a1 1 0 1 1 2 0Zm-6 0a1 1 0 0 0 1 1h1v-1a1 1 0 0 0-2 0Z"></path>
                          <path d="M9.25 10.5H3v4.75A2.75 2.75 0 0 0 5.75 18h3.5v-7.5ZM10.75 18v-7.5H17v4.75A2.75 2.75 0 0 1 14.25 18h-3.5Z"></path>
                       </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Merchandise</span>
                     </a>
                   </li>
                   <li>
                     <a href="/dashboard/orders" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-red-700">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-800 dark:group-hover:text-white" data-slot="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                          <path d="M1 1.75A.75.75 0 0 1 1.75 1h1.628a1.75 1.75 0 0 1 1.734 1.51L5.18 3a65.25 65.25 0 0 1 13.36 1.412.75.75 0 0 1 .58.875 48.645 48.645 0 0 1-1.618 6.2.75.75 0 0 1-.712.513H6a2.503 2.503 0 0 0-2.292 1.5H17.25a.75.75 0 0 1 0 1.5H2.76a.75.75 0 0 1-.748-.807 4.002 4.002 0 0 1 2.716-3.486L3.626 2.716a.25.25 0 0 0-.248-.216H1.75A.75.75 0 0 1 1 1.75ZM6 17.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM15.5 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Merch Order</span>
                     </a>
                   </li>
               </ul>
            </li>
        </ul>
     </div>
</aside>
  
<div class="p-4 sm:ml-64 dark:bg-gray-900">
    @yield('container')
    @include('dashboard.users.modal-profile')
</div>