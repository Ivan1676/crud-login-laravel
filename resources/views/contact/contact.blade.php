@include('layouts/body')
<x-header >
</x-header>

<section class="w-2/3 items-center flex flex-col justify-center px-6 py-8 mb-28 mx-auto md:h-screen lg:py-0">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical
            issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
        <form action="https://formspree.io/f/mpzgpybq" method="POST" class="space-y-8">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                    email</label>
                <input type="email" id="email" name="email"
                    class="shadow-sm bg-gray-50 border border-red-300 text-red-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-black dark:border-white dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                    value="{{ Auth::user()->email }}" readonly />
            </div>
            <div>
                <label for="form_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Subject</label>
                <input type="text" id="form_subject" name="form_subject"
                    class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-black dark:border-white dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                    placeholder="Let us know how we can help you" required />
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                    message</label>
                <textarea id="message" rows="6" name="message"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-black dark:border-white dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit"
                class="px-5 py-3 text-base font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="w-4 h-4 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>
                Send message
            </button>
        </form>
    </div>
</section>
<x-footer>
</x-footer>
<style>
    section {
        background: linear-gradient(130deg, rgb(248, 66, 66) 5%, black 30%, rgb(0, 0, 0) 10%, black 90%);
    }
</style>
