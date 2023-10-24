<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
  <div class="flex flex-col h-full">
    <!-- Sidebar links -->
    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
      <!-- Dashboards links -->
      <div x-data="{ isActive: true, open: true}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
          href="#"
          @click="$event.preventDefault(); open = !open"
          class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
          :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
          role="button"
          aria-haspopup="true"
          :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
          <span aria-hidden="true">
            <svg
              class="w-5 h-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
              />
            </svg>
          </span>
          <span class="ml-2 text-sm"> Dashboards </span>
          <span class="ml-auto" aria-hidden="true">
            <!-- active class 'rotate-180' -->
            <svg
              class="w-4 h-4 transition-transform transform"
              :class="{ 'rotate-180': open }"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
          <a
              href="{{url('/')}}"
              role="menuitem"
              class="block p-2 text-sm {{ Request::is('/*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light"
          >
              Default
          </a>
          <a
              href="{{url('/intern')}}"
              role="menuitem"
              class="block p-2 text-sm {{ Request::is('intern*','user*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light"
          >
              intern
          </a>
          <a
              href="{{url('post')}}"
              role="menuitem"
              class="block p-2 text-sm {{ Request::is('post*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light"
          >
              Project Report
          </a>
          <a
              href="{{url('infografis')}}"
              role="menuitem"
              class="block p-2 text-sm {{ Request::is('infografis*') ? 'text-gray-700 hover:text-gray-700' : 'text-gray-400 hover:text-gray-700' }} transition-colors duration-200 rounded-md dark:hover:text-light"
          >
              Info Grafis
          </a>
      </div>

      </div>

      @if (Auth::check())
      
      <a href="{{ route('logout') }}" role="menuitem"
      class="block px-4 py-2 text-sm text-white text-center rounded-md mx-3 bg-red-600 transition-colors hover:bg-red-700 dark:text-light dark:hover:bg-primary"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Logout
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </a>
          
              
          @else

         
          
      @endif
       <!-- Components links -->

     

  </div>
</aside>

