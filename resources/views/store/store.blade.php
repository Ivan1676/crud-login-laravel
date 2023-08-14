@include('layouts/body')
@include('layouts/navbar')
@include('layouts/footer')

<head>
    <title>Store</title>
</head>

@if ($user->role === 'admin')
    <section>
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <!-- Add flex and justify-between to align items in a row -->
            <div>
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                        List Of Games Here!
                    </span>
                </h1>
            </div>
            <div>
                <a href="{{ route('create-game') }}"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Create Game
                    </span>
                </a>
            </div>
        </div>
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <!-- Edit and Delete buttons combined in one loop -->
            <div>
                @foreach ($games as $game)
                    <div class="border-b-2 border-blue-500 p2 mb-5">
                        <div>
                            <img src="{{ $game->cover }}" alt="Game Cover" class="w-32 h-auto">
                        </div>
                        <div>Name: {{ $game->name }}</div>
                        <div>Description: {{ $game->description }}</div>
                        <div>Genre: {{ $game->genre }}</div>
                        <div>Release date: {{ $game->release_date }}</div>
                        <div>Developer: {{ $game->developer }}</div>
                        <div class="mb-5">Price: {{ $game->price }}€</div>
                        <div class="flex">
                            <a href="{{ route('edit-game', ['game' => $game->id]) }}"
                                class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-yellow-500 to-yellow-700 group-hover:from-yellow-500 group-hover:to-yellow-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:focus:ring-yellow-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Edit Game
                                </span>
                            </a>
                            <a href="{{ route('delete-game', ['game' => $game->id]) }}"
                                class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Delete Game
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    <section>
        <div class="max-w-5xl mx-auto mb-10 flex items-center justify-between">
            <div>
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                        List Of Games Here!
                    </span>
                </h1>
            </div>
        </div>
        <div class="max-w-5xl mx-auto items-center justify-between grid grid-cols-1 gap-4">
            <form action="#" method="GET">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-red-500"
                        placeholder="Search" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-red hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
                </div>
            </form>
            @foreach ($games as $game)
                <div class="relative border-b-2 border-red-500 p-2 mb-5 grid grid-cols-5 gap-4">
                    <div class="col-span-2 md:col-span-2">
                        <img src="{{ $game->cover }}" alt="Game Cover" class="w-auto h-auto">
                    </div>
                    <div class="col-span-1 md:col-span-4 flex flex-col justify-between">
                        <div class="text-left">
                            <div class="mb-1">Name: {{ $game->name }}</div>
                            <div class="mb-1">Description: {{ $game->description }}</div>
                            <div class="mb-1">Genre: {{ $game->genre }}</div>
                            <div class="mb-1">Release date: {{ $game->release_date }}</div>
                            <div class="mb-1">Developer: {{ $game->developer }}</div>
                            <div class="mb-1">Price: {{ $game->price }}€</div>
                        </div>
                        <div class="flex left-1/4 relative">
                            <button type="button"
                                class="relative w-32 inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                                <span
                                    class="relative w-32 px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Buy Game
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
