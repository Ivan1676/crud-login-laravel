@include('../layouts/body')
@include('../layouts/navbar')

<head>
    <title>Edit Game</title>
</head>

@if (Auth::user() && Auth::user()->role === 'admin') <!-- Check if the user is an admin -->

<div class="max-w-5xl mx-auto">
    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
            Game Details
        </span>
    </h1>
    <div class="border-b-2 border-blue-500 p-2">
        <form action="{{ route('edit-game', ['game' => $game->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Correct method for updating a resource -->
            <div class="mb-4">
                <label for="cover">Cover url:</label>
                <input type="text" name="cover" id="cover" class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <div class="mb-2">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $game->name }}"
                    class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <div class="mb-2">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="w-full p-2 border-2 border-blue-500 text-black">{{ $game->description }}</textarea>
            </div>
            <div class="mb-2">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" value="{{ $game->genre }}"
                    class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <div class="mb-2">
                <label for="release_date">Release Date:</label>
                <input type="date" name="release_date" id="release_date" value="{{ $game->release_date }}"
                    class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <div class="mb-2">
                <label for="developer">Developer:</label>
                <input type="text" name="developer" id="developer" value="{{ $game->developer }}"
                    class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <div class="mb-2">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $game->price }}"
                    class="w-full p-2 border-2 border-blue-500 text-black">
            </div>
            <button type="submit"
                class="relative inline-flex w-40 items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-yellow-500 to-yellow-700 group-hover:from-yellow-500 group-hover:to-yellow-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:focus:ring-yellow-800">
                <span
                    class="relative w-40 px-4 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Edit Game
                </span>
            </button>
        </form>
    </div>
    <a href="{{ route('store') }}"
        class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span
            class="relative px-4 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Back to Store
        </span>
    </a>
</div>
@else
    <script>
        window.location.href = '{{ route("store") }}';
    </script>
@endif
