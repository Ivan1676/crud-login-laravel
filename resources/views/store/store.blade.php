@include('../html/body')

<head>
    <title>Store</title>
</head>

<section class="bg-gray-50 dark:bg-gray-900">
    <div>
        <a href="{{ route('logout') }}"
            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Logout</a>
    </div>

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

