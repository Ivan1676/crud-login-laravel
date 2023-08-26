@include('layouts/body')
@include('layouts/navbar')
@include('layouts/footer')
@include('home/slider')

<head>
    <title>Home</title>
</head>
<section class="my-5 mb-8 relative" id="section1">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Your Favorite Game
                Store</h2>
            <p class="mb-4">Welcome to the ultimate destination for all things gaming. We bring you the latest and
                greatest in video games, consoles, accessories, and more. Whether you're a casual gamer or a hardcore
                enthusiast, we've got something for everyone.</p>
            <p>Explore a vast collection of action-packed titles, immersive RPGs, and multiplayer adventures that will
                keep you on the edge of your seat. Our mission is to provide you with the best gaming experience and
                connect you with a community of fellow gamers.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="RPG 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="RPG 2">
        </div>
    </div>
</section>

<section class="w-2/3 mx-auto py-10 my-32" id="section2">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">About Our Store</h2>
        <div class="grid grid-cols-1 gap-8">
            <p class="text-gray-700 dark:text-gray-300">Welcome to Game X! We are your go-to destination for all things
                gaming. Our store offers a diverse range of video games, consoles, accessories, and more, catering to
                gamers of all preferences and interests.</p>
            <p class="text-gray-700 dark:text-gray-300">At Game X, we're passionate about providing you with the best
                gaming experience. Whether you're into action-packed adventures, strategic RPGs, immersive simulations,
                or multiplayer battles, we have an extensive collection to choose from.</p>
            <p class="text-gray-700 dark:text-gray-300">Our mission is to create a hub where gamers can find the latest
                releases, discover hidden gems, and connect with a community that shares their passion. With a
                user-friendly interface, secure transactions, and exceptional customer support, we're committed to
                delivering excellence every step of the way.</p>
            <p class="text-gray-700 dark:text-gray-300">Explore our store and embark on new gaming journeys. Join us in
                celebrating the thrill of gaming and uncovering worlds of endless possibilities.</p>
        </div>
    </div>
</section>

<section class="w-2/3 mx-auto bg-gray-100 dark:bg-gray-800 py-10 my-32" id="section3">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Newest Additions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($newestGames as $game)
                <!-- Iterating through $newestGames -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ $game->cover }}" alt="{{ $game->name }}">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $game->name }}</h3>
                        <p class="text-gray-500 dark:text-gray-300">{{ $game->description }}</p>
                        <a href="{{ route('home') }}" class="mt-2 inline-block bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded px-3 py-1">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-5 mb-32 relative" id="section4">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Unleash Your Gaming
                Passion</h2>
            <p class="mb-4">Embark on epic adventures and immerse yourself in the realm of RPG games at Game X. Delve
                into captivating narratives, explore intricate worlds, and shape your own destiny through your choices.
            </p>
            <p>Whether you're drawn to high fantasy, post-apocalyptic landscapes, or futuristic dystopias, our diverse
                collection of RPG titles offers something for every fantasy enthusiast.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="RPG 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="RPG 2">
        </div>
    </div>
</section>

<section class="my-5 mb-32 relative" id="section5">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                alt="Action Game 1">
            <img class="w-full rounded-lg"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                alt="Action Game 2">
        </div>
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Experience
                Heart-Pounding Action</h2>
            <p class="mb-4">Get ready for adrenaline-pumping gameplay and intense battles with our collection of
                action
                games at Game X. Dive into fast-paced scenarios, unleash powerful abilities, and test your reflexes in
                thrilling encounters.</p>
            <p>Whether you're a fan of explosive shooters, high-speed racing, or close-quarters combat, our diverse
                selection of action-packed titles guarantees an exhilarating gaming experience that will keep you at the
                edge of your seat.</p>
        </div>
    </div>
</section>

<style>
    #section1 {
        background: linear-gradient(290deg, rgb(248, 66, 66) 5%, black 50%, rgb(0, 0, 0) 10%, black 90%);
    }

    #section3 {
        background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 20%, rgb(0, 0, 0) 10%, black 90%);
    }

    #section4 {
        background: linear-gradient(290deg, rgb(248, 66, 66) 5%, black 40%, rgb(0, 0, 0) 10%, black 90%);
    }

    #section5 {
        background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 40%, rgb(0, 0, 0) 10%, black 90%);
    }
</style>
