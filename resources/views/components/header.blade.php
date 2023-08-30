<nav class="bg-black border-b-2 border-red-700 mb-10" id="header">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-20 h-20">
            <h1 class="text-5xl text-white ml-5">Game X</h1>
        </a>

        <div class="md:hidden">
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row md:space-x-8" id="listHeader">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:text-white md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('home') ? 'sm:text-red-700 md:dark:text-red-700 lg:text-red-700 xl:text-red-700 dark:text-red-500 bg-red-700 sm:bg-black md:bg-black lg:bg-black xl:bg-black dark:bg-red-500' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('store-view') }}"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:text-white md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('store-view') ? 'sm:text-red-700 md:dark:text-red-700 lg:text-red-700 xl:text-red-700 dark:text-red-500 bg-red-700 sm:bg-black md:bg-black lg:bg-black xl:bg-black dark:bg-red-500' : '' }}">Store</a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:text-white md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('gallery') ? 'sm:text-red-700 md:dark:text-red-700 lg:text-red-700 xl:text-red-700 dark:text-red-500 bg-red-700 sm:bg-black md:bg-black lg:bg-black xl:bg-black dark:bg-red-500' : '' }}">Gallery</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:text-white md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('contact') ? 'sm:text-red-700 md:dark:text-red-700 lg:text-red-700 xl:text-red-700 dark:text-red-500 bg-red-700  md:bg-black lg:bg-black xl:bg-black dark:bg-red-500' : '' }}">Contact
                        us</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:text-white md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
