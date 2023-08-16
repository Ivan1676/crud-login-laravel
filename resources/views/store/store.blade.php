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
    <section class="max-w-5xl mx-auto mb-10">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                List Of Games Here!
            </span>
        </h1>
        <form action="#" method="GET">
            <!-- Search form here -->
        </form>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left border-b-2 border-red-700 z-40">
            @foreach ($games as $game)
                <div class="border-b-2 border-red-700 p-2 mb-5 relative">
                    <div class="mb-3">
                        <img src="{{ $game->cover }}" alt="Game Cover" class="w-full h-96 cursor-pointer"
                            onclick="toggleGameModal('{{ $game->id }}')">
                    </div>
                    <!-- Modal -->
                    <div id="gameModal_{{ $game->id }}"
                        class="fixed inset-0 flex justify-center items-center hidden z-50">
                        <div class="bg-black text-white p-4 rounded-lg shadow-lg w-96">
                            <img src="{{ $game->cover }}" alt="Game Cover" class="w-full h-60 mb-2">
                            <h2 class="text-2xl font-bold mb-2">{{ $game->name }}</h2>
                            <div class="mb-2">Description: {{ $game->description }}</div>
                            <div class="mb-2">Genre: {{ $game->genre }}</div>
                            <div class="mb-2">Release date: {{ $game->release_date }}</div>
                            <div class="mb-2">Developer: {{ $game->developer }}</div>
                            <div class="mb-2">Price: {{ $game->price }}€</div>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Buy</button>
                            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg"
                                onclick="toggleGameModal('{{ $game->id }}')">Close</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function toggleGameModal(gameId) {
            const modal = document.getElementById('gameModal_' + gameId);
            modal.classList.toggle('hidden');
        }
    </script>
@endif
