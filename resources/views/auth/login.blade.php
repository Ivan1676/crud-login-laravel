@include('layouts/body')

<head>
    <title>Login</title>
</head>

<section class="bg-black dark:bg-black">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0" id="divForm">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('start-session') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-black border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="name@company.com" required autocomplete="disable" />
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-black border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            required />
                    </div>
                    @error('email')
                        <span class="block mt-2 text-red-600">{{ $message }}</span>
                    @enderror
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                            Password?</a>
                    </div>
                    <x-button id="submit">
                        {{ __('Log in') }}
                    </x-button>
                    <p class="text-sm font-light text-white">
                        Don’t have an account yet? <a href="{{ route('register') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</section>

<style>
    #divForm {
        background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 40%, rgb(0, 0, 0) 10%, black 90%);
    }
</style>
