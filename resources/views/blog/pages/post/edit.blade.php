@extends('blog.index')


@section('content')

    <style>

    </style>
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}


        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">新增文章</h2>

            <form class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="username">標題</label>
                        <input id="username" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="w-full md:w-w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="emailAddress">選擇分類</label>
                        <input id="category" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <!-- The toolbar will be rendered in this container. -->
                    <div class="w-full md:w-w-full mt-3 mb-6 md:mb-0 bg-white">
                        <div id="editor">
                         
                        </div>
                    </div>
                    {{-- <div class="w-full md:w-1/2 px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                        <input id="password" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="w-full md:w-1/2 px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password
                            Confirmation</label>
                        <input id="passwordConfirmation" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> --}}
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>
        </section>


        {{-- end --}}
    </div>
@endsection

<script>
    
    function pageData() {
        return {
            init() {

            }
        }
    }
 
</script>
