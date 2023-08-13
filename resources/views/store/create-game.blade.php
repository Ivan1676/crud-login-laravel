@include('../layouts/body')
@include('../layouts/navbar')

<head>
    <title>Create Game</title>
</head>

@if (Auth::user() && Auth::user()->role === 'admin')

<div class="max-w-5xl mx-auto">
    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
            Insert New Game Here!
        </span>
    </h1>
    <form action="{{ route('store-game') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="cover">Cover url:</label>
            <input type="text" name="cover" id="cover" class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <div class="mb-4">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <div class="mb-4">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="w-full p-2 border-2 border-blue-500 text-black"></textarea>
        </div>
        <div class="mb-4">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <div class="mb-4">
            <label for="release_date">Release Date:</label>
            <input type="date" name="release_date" id="release_date"
                class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <div class="mb-4">
            <label for="developer">Developer:</label>
            <input type="text" name="developer" id="developer"
                class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <div class="mb-4">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="w-full p-2 border-2 border-blue-500 text-black">
        </div>
        <button type="submit"
            class="relative mt-5 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span
                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Add Game
            </span>
        </button>
    </form>
    <a href="{{ route('store') }}"
        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span
            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Back to Store
        </span>
    </a>
</div>
@else
    <script>
        window.location.href = '{{ route("store") }}';
    </script>
@endif
