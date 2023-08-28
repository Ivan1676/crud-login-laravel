@include('layouts/body')
<x-header >
</x-header>
@include('layouts/footer')

<head>
    <title>Delete Game</title>
</head>

@if (Auth::user() && Auth::user()->role === 'admin')
    <div class="max-w-5xl mx-auto mb-10">
        <div>
            <h1
                class="mb-4 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-700 md:text-5xl lg:text-6xl text-center">
                Game Details
            </h1>
        </div>
    </div>
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="text-left border-b-2 border-red-700 p-2 mb-5">
                <div>
                    <img src="{{ $game->cover }}" alt="Game Cover" class="w-96 h-auto">
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
                <form action="{{ route('delete-game', ['game' => $game->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full mt-5 inline-flex items-center justify-center p-0.5 mb-8 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                        <span
                            class="px-5 w-full py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Delete Game
                        </span>
                    </button>
                </form>
                <a href="{{ route('store-view') }}"
                    class="w-full inline-flex text-center items-center justify-center p-0.5 mb-8 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                    <span
                        class="w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Back to Store
                    </span>
                </a>
            </div>
        </div>
    </div>
@else
    <script>
        window.location.href = '{{ route('store') }}';
    </script>
@endif
