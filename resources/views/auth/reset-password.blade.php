@include('layouts/body')

<head>
    <title>Reset Password</title>
</head>

<section class="bg-black dark:bg-black">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0" id="divForm">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Email</label>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Password</label>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                            Password</label>
                        <x-text-input id="password_confirmation" class="block mt-1 mb-10 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-button id="submit">
                        {{ __('Reset Password') }}
                    </x-button>
            </div>
        </div>
    </div>
</section>

<style>
    #divForm {
        background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 40%, rgb(0, 0, 0) 10%, black 90%);
    }

    #email,
    #password,
    #password_confirmation {
        background-color: black;
        border: 1px solid #D1D5DB;
        color: #4B5563;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        outline: none;
        cursor: text;
        display: block;
        width: 100%;
        padding: 0.625rem 1rem;

        &:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }

        @media (prefers-color-scheme: dark) {
            color: white;

            &:focus {
                border-color: #DC2626;
                box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.5);
            }
        }
    }
</style>
