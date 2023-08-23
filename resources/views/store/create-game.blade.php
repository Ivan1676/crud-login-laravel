@include('layouts/body')
@include('layouts/navbar')
@include('layouts/footer')

<head>
    <title>Create Game</title>
</head>

@if (Auth::user() && Auth::user()->role === 'admin')
    <div class="max-w-5xl mx-auto">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-400">
                Insert New Game Here!
            </span>
        </h1>
        <form action="{{ route('store-game') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="cover">Cover url:</label>
                <input type="text" name="cover" id="cover" class="w-full p-2 border-2 border-red-500 text-black">
            </div>
            <div class="mb-4">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name"
                    class="w-full p-2 border-2 border-red-500 text-black">
            </div>
            <div class="mb-4">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="w-full p-2 border-2 border-red-500 text-black"></textarea>
            </div>
            <div class="mb-4">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre"
                    class="w-full p-2 border-2 border-red-500 text-black">
            </div>
            <div class="mb-4">
                <label for="release_date">Release Date:</label>
                <input type="date" name="release_date" id="release_date"
                    class="w-full p-2 border-2 border-red-500 text-black">
            </div>
            <div class="mb-4">
                <label for="developer">Developer:</label>
                <select name="developers[]" id="developer" class="w-full p-2 border-2 border-red-500 text-black"
                    multiple>
                    @foreach ($developers as $developer)
                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="publisher">Publisher:</label>
                <select name="publishers[]" id="publisher" class="w-full p-2 border-2 border-red-500 text-black"
                    multiple>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="trophies">Trophies:</label>
                <select name="trophies[]" id="trophies" class="w-full p-2 border-2 border-red-500 text-black" multiple>
                    @foreach ($trophies as $trophy)
                        <option value="{{ $trophy->id }}">{{ $trophy->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price"
                    class="w-full p-2 border-2 border-red-500 text-black">
            </div>
            <button type="submit"
                class="relative w-2/3 mt-5 inline-flex items-center justify-center p-0.5 mb-8 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                <span
                    class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Add Game
                </span>
            </button>
        </form>
        <a href="{{ route('store') }}"
            class="relative w-2/3 inline-flex items-center justify-center p-0.5 mb-8 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
            <span
                class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Back to Store
            </span>
        </a>
    </div>
@else
    <script>
        window.location.href = '{{ route('store') }}';
    </script>
@endif
