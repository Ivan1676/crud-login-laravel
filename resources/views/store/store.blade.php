@include('layouts/body')
@include('layouts/navbar')
@include('layouts/footer')

<head>
    <title>Store</title>
</head>

@if ($user->role === 'admin')
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
                            <img src="{{ $game->cover }}" alt="Game Cover" class="w-96 h-auto">
                        </div>
                        <div>Name: {{ $game->name }}</div>
                        <div>Description: {{ $game->description }}</div>
                        <div>Genre: {{ $game->genre }}</div>
                        <div>Release date: {{ $game->release_date }}</div>
                        <div class="mb-4">
                            <label for="developers">Developers:</label>
                            <select name="developers[]" id="developers" multiple
                                class="w-full p-2 border-2 border-red-500 text-black">
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="publishers">Publishers:</label>
                            <select name="publishers[]" id="publishers" multiple
                                class="w-full p-2 border-2 border-red-500 text-black">
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="trophies">Trophies:</label>
                            <select name="trophies[]" id="trophies" multiple
                                class="w-full p-2 border-2 border-red-500 text-black">
                                @foreach ($trophies as $trophy)
                                    <option value="{{ $trophy->id }}">{{ $trophy->name }}</option>
                                @endforeach
                            </select>
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
@else
    <section class="max-w-5xl mx-auto mb-10">
        <h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
        @if ($cartItems === null || $cartItems->isEmpty())
            <section class="max-w-5xl mx-auto mb-10">
                <h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
                <p>Your cart is empty.</p>
            </section>
        @else
            <section class="max-w-5xl mx-auto mb-10">
                <h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
                @foreach ($cartItems as $cartItem)
                    <div class="flex items-center border-b border-gray-300 py-4">
                        <img src="{{ $cartItem->game->cover }}" alt="Game Cover" class="w-16 h-16 mr-4">
                        <div class="flex-grow">
                            <h3 class="text-lg font-medium">{{ $cartItem->game->name }}</h3>
                            <p class="text-gray-500">Price: {{ $cartItem->game->price }}€</p>
                            <p class="text-gray-500">Quantity: {{ $cartItem->quantity }}</p>
                        </div>
                        <button class="text-red-600 hover:text-red-700"
                            onclick="removeFromCart({{ $cartItem->id }})">Remove</button>
                    </div>
                @endforeach
            </section>
        @endif
    </section>

    <section class="max-w-5xl mx-auto mb-10">
        <div>
            <h1
                class="mb-4 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-700 md:text-5xl lg:text-6xl">
                List Of Games Here!
            </h1>
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
                            <div class="mb-2">Developer: {{ $game->developer }}</div>
                            <div class="mb-2">Price: {{ $game->price }}€</div>
                            <div class="flex justify-center space-x-2 mb-2">
                                <form action="{{ route('cart-add') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                                    <input type="hidden" name="name" value="{{ $game->name }}">
                                    <input type="hidden" name="cover" value="{{ $game->cover }}">
                                    <input type="hidden" name="price" value="{{ $game->price }}">
                                    <button type="submit"
                                        class="relative w-2/5 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-700 group-hover:from-red-600 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                        <span
                                            class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Buy Game
                                        </span>
                                    </button>
                                </form>
                                <button
                                    class="relative w-2/5 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                    <span
                                        class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
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

    <script>
        function toggleGameModal(gameId) {
            const modal = document.getElementById('gameModal_' + gameId);
            modal.classList.toggle('hidden');
        }
    </script>
@endif
