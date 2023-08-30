@include('layouts/body')
<x-header>
</x-header>

<head>
    <title>Store</title>
</head>
@if (auth()->check())
    @if (auth()->user()->role === 'admin')
        <section>
            <div class="max-w-5xl mx-auto flex items-center justify-between">
                <div>
                    <h1
                        class="mb-4 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-700 md:text-5xl lg:text-6xl">
                        List Of Games Here!
                    </h1>
                </div>
                <div>
                    <a href="{{ route('create-game') }}"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Create Game
                        </span>
                    </a>
                </div>
            </div>
            <div class="max-w-5xl mx-auto">
                <!-- Edit and Delete buttons combined in one loop -->
                <div>
                    @foreach ($games as $game)
                        <div class="text-left border-b-2 border-red-700 p-2 mb-5">
                            <div>
                                <img src="{{ $game->cover }}" alt="Game Cover" class="w-96 h-auto aspect-video">
                            </div>
                            <div>Name: {{ $game->name }}</div>
                            <div>Description: {{ $game->description }}</div>
                            <div>Genre: {{ $game->genre }}</div>
                            <div>Release date: {{ $game->release_date }}</div>
                            <div>Developer:
                                <ul>
                                    @foreach ($game->developers as $developer)
                                        <li class="ml-10">{{ $developer->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>Publisher:
                                <ul>
                                    @foreach ($game->publishers as $publisher)
                                        <li class="ml-10">{{ $publisher->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>Trophies:
                                <ul>
                                    @foreach ($game->trophies as $trophy)
                                        <li class="ml-10">{{ $trophy->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
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
                                    class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
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
        <x-footer>
        </x-footer>
    @else
        @if (session('empty_cart'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Alert:</strong>
                <span class="block sm:inline">Your cart is empty.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 6.066 4.652a1 1 0 0 0-1.414 1.414L8.586 10l-3.934 3.934a1 1 0 0 0 1.414 1.414L10 11.414l3.934 3.934a1 1 0 0 0 1.414-1.414L11.414 10l3.934-3.934a1 1 0 0 0 0-1.414z" />
                    </svg>
                </span>
            </div>
        @endif
        <section class="max-w-5xl mx-auto mb-10">
            <div>
                <h1
                    class="mb-16 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-700 md:text-5xl lg:text-6xl">
                    List Of Games Here!
                </h1>
            </div>
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('checkout') }}"
                    class="relative inline-flex items-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                    <span
                        class="relative flex items-center px-2 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        <x-vaadin-cart class="w-8 h-8 mr-2" />
                        <span class="mr-5">Go to Cart</span>
                    </span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left border-b-2 border-red-700 z-40">
                @foreach ($games as $game)
                    <div class="border-b-2 border-red-700 p-2 mb-5 relative">
                        <div class="mb-3">
                            <img src="{{ $game->cover }}" alt="Game Cover" class="w-full h-96 cursor-pointer"
                                onclick="toggleGameModal('{{ $game->id }}')">
                        </div>
                        <!-- Modal -->
                        <div id="gameModal_{{ $game->id }}"
                            class="fixed hidden inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50"
                            name="modalGame">
                            <div class="bg-black text-white p-4 rounded-lg shadow-lg w-96 h-auto">
                                <img src="{{ $game->cover }}" alt="Game Cover" class="w-full h-60 mb-2">
                                <h2 class="text-2xl font-bold mb-2">{{ $game->name }}</h2>
                                <div class="mb-2">Description: {{ $game->description }}</div>
                                <div class="mb-2">Genre: {{ $game->genre }}</div>
                                <div class="mb-2">Release date: {{ $game->release_date }}</div>
                                <div class="mb-2">Developer:
                                    <ul>
                                        @foreach ($game->developers as $developer)
                                            <li class="ml-10">{{ $developer->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="mb-2">Publisher:
                                    <ul>
                                        @foreach ($game->publishers as $publisher)
                                            <li class="ml-10">{{ $publisher->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="mb-2">Trophies:
                                    <ul>
                                        @foreach ($game->trophies as $trophy)
                                            <li class="ml-10">{{ $trophy->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="mb-2">Price: {{ $game->price }}€</div>
                                <div class="flex justify-center space-x-2 mb-2">
                                    <form action="{{ route('cart-add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                                        <input type="hidden" name="name" value="{{ $game->name }}">
                                        <input type="hidden" name="cover" value="{{ $game->cover }}">
                                        <input type="hidden" name="price" value="{{ $game->price }}">
                                        <button type="submit"
                                            class="relative w-full h-auto inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-700 group-hover:from-red-600 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                            <span
                                                class="relative w-full h-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Buy Game
                                            </span>
                                        </button>
                                    </form>
                                    <button
                                        class="relative w-1/3 h-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        <span
                                            class="relative w-full h-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                                            onclick="toggleGameModal('{{ $game->id }}')">
                                            Close
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <x-footer>
        </x-footer>
    @endif
    <script>
        function toggleGameModal(gameId) {
            const modal = document.getElementById('gameModal_' + gameId);
            modal.classList.toggle('hidden');
        }
    </script>
@endif
