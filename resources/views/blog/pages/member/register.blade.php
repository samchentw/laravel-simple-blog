@extends('blog.index')


@section('content')



    <div class="mt-10 mb-10 justify-center items-center">
        <div class="w-full max-w-sm p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h1 class="text-3xl font-semibold text-center text-gray-700 dark:text-white">註冊</h1>

            <form class="mt-6" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name" class="block text-sm text-gray-800 dark:text-gray-200">姓名</label>
                    <x-jet-input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="mt-4">
                    <label for="email" class="block text-sm text-gray-800 dark:text-gray-200">信箱</label>
                    <x-jet-input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="text" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm text-gray-800 dark:text-gray-200">密碼</label>
                    </div>
                    <x-jet-input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation"
                            class="block text-sm text-gray-800 dark:text-gray-200">密碼確認</label>
                    </div>
                    <x-jet-input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="password" name="password_confirmation" required autocomplete="current-password" />
                </div>

                <div class="mt-6">
                    <button
                        class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        註冊
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
