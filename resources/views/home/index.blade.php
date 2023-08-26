@include('layouts/body')
@include('layouts/navbar')
@include('layouts/footer')
@include('home/slider')

<head>
    <title>Home</title>
</head>
<section class="my-5 mb-8 relative" id="section1">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-white sm:text-lg">
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
                src="https://wallpaperaccess.com/full/2196345.jpg" alt="RPG 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://wallpapercave.com/wp/wp9163873.jpg" alt="RPG 2">
        </div>
    </div>
</section>

<section class="w-2/3 mx-auto py-10 my-32" id="section2">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white dark:text-white mb-6">About Our Store</h2>
        <div class="grid grid-cols-1 gap-8">
            <p class="text-white">Welcome to Game X! We are your go-to destination for all things
                gaming. Our store offers a diverse range of video games, consoles, accessories, and more, catering to
                gamers of all preferences and interests.</p>
            <p class="text-white">At Game X, we're passionate about providing you with the best
                gaming experience. Whether you're into action-packed adventures, strategic RPGs, immersive simulations,
                or multiplayer battles, we have an extensive collection to choose from.</p>
            <p class="text-white">Our mission is to create a hub where gamers can find the latest
                releases, discover hidden gems, and connect with a community that shares their passion. With a
                user-friendly interface, secure transactions, and exceptional customer support, we're committed to
                delivering excellence every step of the way.</p>
            <p class="text-white">Explore our store and embark on new gaming journeys. Join us in
                celebrating the thrill of gaming and uncovering worlds of endless possibilities.</p>
        </div>
    </div>
</section>

<section class="w-2/3 mx-auto bg-black py-10 my-32" id="section3">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Newest Additions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($newestGames as $game)
                <!-- Iterating through $newestGames -->
                <div class="bg-black rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ $game->cover }}" alt="{{ $game->name }}">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $game->name }}</h3>
                        <p class="text-gray-500 dark:text-gray-300">{{ $game->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-5 mb-32 relative" id="section4">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-white sm:text-lg">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Unleash Your
                Gaming
                Passion</h2>
            <p class="mb-4">Embark on epic adventures and immerse yourself in the realm of RPG games at Game X.
                Delve
                into captivating narratives, explore intricate worlds, and shape your own destiny through your
                choices.
            </p>
            <p>Whether you're drawn to high fantasy, post-apocalyptic landscapes, or futuristic dystopias, our
                diverse
                collection of RPG titles offers something for every fantasy enthusiast.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg"
                src="https://wallpapershome.com/images/pages/ico_v/19292.jpg" alt="RPG 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://4kwallpapers.com/images/wallpapers/aloy-horizon-zero-dawn-4000x5333-5148.jpg" alt="RPG 2">
        </div>
    </div>
</section>

<section class="my-5 mb-32 relative" id="section5">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
                src="https://pbs.twimg.com/media/FD29ch1WQAUEaKe?format=jpg&name=4096x4096"
                alt="Action Game 1">
            <img class="w-full rounded-lg"
                src="https://wallpaperaccess.com/full/638048.jpg"
                alt="Action Game 2">
        </div>
        <div class="font-light text-white sm:text-lg">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Experience
                Heart-Pounding Action</h2>
            <p class="mb-4">Get ready for adrenaline-pumping gameplay and intense battles with our collection of
                action
                games at Game X. Dive into fast-paced scenarios, unleash powerful abilities, and test your reflexes
                in
                thrilling encounters.</p>
            <p>Whether you're a fan of explosive shooters, high-speed racing, or close-quarters combat, our diverse
                selection of action-packed titles guarantees an exhilarating gaming experience that will keep you at
                the
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
