@extends('welcome')

@section('main')

 <!-- Content header -->
 <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    {{-- <a
      href="https://github.com/Kamona-WD/kwd-dashboard"
      target="_blank"
      class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
    >
      View on github
    </a> --}}
  </div>

  <!-- Content -->
  <div class="mt-2">
    <!-- State cards -->
    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-2">
      <!-- Value card -->
      <div class="border border-gray-400 flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
        <div>
          <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
          >
            Projects
          </h6>
          <span class="text-xl font-semibold">5</span>
          {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
            +4.4%
          </span> --}}
        </div>
        <div>
          <span>
            <svg
              class="w-12 h-12 text-gray-300 dark:text-primary-dark"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
          </span>
        </div>
      </div>

      <!-- Users card -->
      <div class="border border-gray-400 flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
        <div>
          <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
          >
            Users
          </h6>
          <span class="text-xl font-semibold">50,021</span>
          {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
            +2.6%
          </span> --}}
        </div>
        <div>
          <span>
            <svg
              class="w-12 h-12 text-gray-300 dark:text-primary-dark"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
              />
            </svg>
          </span>
        </div>
      </div>
  </div>
@endsection
