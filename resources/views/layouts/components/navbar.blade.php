 <!-- Navbar -->
 <header class="relative bg-white dark:bg-darker z-10 ">
     <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
         <!-- Mobile menu button -->
         <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
             class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
             <span class="sr-only">Open main manu</span>
             <span aria-hidden="true">
                 <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 12h16M4 18h16" />
                 </svg>
             </span>
         </button>

         <!-- Brand -->
         <button type="button"
             class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
             @click="asideOpen = !asideOpen">
             ASIM @yield('title')
         </button>

         <!-- Mobile sub menu button -->
         <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
             class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
             <span class="sr-only">Open sub manu</span>
             <span aria-hidden="true">
                 <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                 </svg>
             </span>
         </button>

         <!-- Desktop Right buttons -->
         <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">


             <!-- User avatar button -->



             @guest
                 <!-- Tombol Login -->
                 <button onclick="window.location.href='/login'"
                     class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">Login</button>
             @else
                 <div class="relative" x-data="{ open: false }">
                     <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                         aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                         class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100 flex items-center"

                         @if (file_exists(public_path('storage/'.auth()->user()->image)))
                         <!-- Gambar dari folder storage -->
                         <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="Gambar dari Storage" class="img-user rounded-full  w-10  h-10   border border-solid border-white-25 mx-auto">
                     @else
                         <!-- Gambar dari folder image -->
                         <img src="{{ asset('img/'.auth()->user()->image) }}" alt="Gambar dari Folder Image" class="img-user rounded-full  w-10  h-10   border border-solid border-white-25 mx-auto">
                     @endif

                         @php
                             $words = explode(' ', auth()->user()->name);
                             $display_name = implode(' ', array_slice($words, 0, 2));
                         @endphp


                         <span class="ml-2">{{ $display_name }}
                         </span>
                         {{-- Memindahkan ini ke samping kiri foto profil --> --}}
                     </button>

                     <!-- User dropdown menu -->
                     <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                         x-transition:enter-start="translate-y-1/2 opacity-0"
                         x-transition:enter-end="translate-y-0 opacity-100"
                         x-transition:leave="transition-all transform ease-in"
                         x-transition:leave-start="translate-y-0 opacity-100"
                         x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                         @keydown.escape="open = false"
                         class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                         tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                         <a href="{{ url('user/' . auth()->user()->slug . '/profile') }}" role="menuitem"
                             class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                             Your Profile
                         </a>
                         <a href="{{ url('user/' . auth()->user()->slug . '/profile/settings') }}" role="menuitem"
                             class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                            Profile Settings
                         </a>
                         <button  data-modal-target="delete-modal" data-modal-toggle="delete-modal" role="menuitem"
                             class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                             type="button">
                             Logout

                         </button>
  @include('layouts.components.modal')

                     </div>
                 </div>

             @endguest



         </nav>

         <!-- Mobile sub menu -->
         <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
             x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
             x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
             x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0"
             x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false"
             class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
             aria-label="Secondary">
             <div class="space-x-2">

             </div>

             @guest
             <!-- Tombol Login -->
             <button onclick="window.location.href='/login'"
                 class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">Login</button>
         @else
             <!-- User avatar button -->
             <div class="relative ml-auto" x-data="{ open: false }">
                 <button @click="open = !open" type="button" aria-haspopup="true"
                     :aria-expanded="open ? 'true' : 'false'"
                     class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">



                     <a href="{{ url('user/' . auth()->user()->slug . '/profile') }}" role="menuitem"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                         Your Profile
                     </a>
                     <a href="{{ url('user/' . auth()->user()->slug . '/profile/settings') }}" role="menuitem"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Profile Settings
                     </a>
                     <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" role="menuitem"
                     type="button"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                         >
                         Logout
                     </button>
  @include('layouts.components.modal')

                 </button>


             </div>
         </nav>
     </div>
     @endguest
     <!-- Mobile main manu -->

     <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen"
         @click.away="isMobileMainMenuOpen = false">
         <nav aria-label="Main" class="px-2 py-4 space-y-2">
             <!-- Dashboards links -->
             <div x-data="{ isActive: true, open: true }">
                 <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="#" @click="$event.preventDefault(); open = !open"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm"> Dashboards </span>
                     <span class="ml-auto" aria-hidden="true">
                         <!-- active class 'rotate-180' -->
                         <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                         </svg>
                     </span>
                 </a>
                 <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                     <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                     <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                     <a href="{{ url('/') }}" role="menuitem"
                         class="block p-2 text-sm {{ Request::is('/*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light">
                         Home
                     </a>
                     <a href="{{ url('/intern') }}" role="menuitem"
                         class="block p-2 text-sm {{ Request::is('intern*', 'user*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light">
                         intern
                     </a>
                     <a href="{{ url('post') }}" role="menuitem"
                         class="block p-2 text-sm {{ Request::is('post*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light">
                         Project Report
                     </a>
                     <a href="{{ url('infografis') }}" role="menuitem"
                         class="block p-2 text-sm {{ Request::is('infografis*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light">
                         Infografis
                     </a>
                 </div>
             </div>


         </nav>
     </div>
 </header>
