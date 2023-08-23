@include('layouts/body')

<head>
    <title>Forgot Password</title>
</head>
@section('content')
    <section class="bg-black dark:bg-black">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0" id="divForm">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Forgot Password
                    </h1>
                    @if (session('status'))
                        <div class="text-green-600 mb-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('password-email') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-black border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                placeholder="name@company.com" required autocomplete="disable" />
                        </div>
                        <button type="submit" id="button"
                            class="w-full text-white hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-red-700 dark:focus:ring-red-800">Send
                            Password Reset Link</button>
                    </form>
                    <p class="text-sm font-light text-white">
                        Remember your password? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Log in</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        #divForm {
            background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 40%, rgb(0, 0, 0) 10%, black 90%);
        }
    </style>
@endsection
