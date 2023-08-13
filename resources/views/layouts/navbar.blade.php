<nav class="bg-white border-gray-200 dark:bg-gray-900 mb-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- ... (your logo and toggle button) ... -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('store') ? 'md:text-blue-700 dark:text-blue-500' : '' }}">Home</a> <!-- Change route later -->
                </li>
                <li>
                    <a href="{{ route('store') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('store') ? 'md:text-blue-700 dark:text-blue-500' : '' }}">Store</a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('gallery') ? 'md:text-blue-700 dark:text-blue-500' : '' }}">Gallery</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('contact') ? 'md:text-blue-700 dark:text-blue-500' : '' }}">Contact us</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
