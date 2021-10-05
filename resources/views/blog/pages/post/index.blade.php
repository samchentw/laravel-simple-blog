@extends('blog.index')


@section('content')
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}

        <section class="body-font">
            <div class=" px-5  mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2  rounded-lg overflow-hidden sm:mr-10 p-3  items-end justify-start">
                    {{-- post --}}
                    {{-- <div class="shadow p-4 bg-white mt-3">
                        <div class="text-left">
                            <h3 class="mb-2 text-gray-700">Card Title</h3>
                            <p class="text-grey-600 text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                commodo ligula eget dolor.
                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus
                                mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </p>
                        </div>
                        ​
                        <div>
                            <a href="#" class="no-underline mr-4 text-blue-500 hover:text-blue-400">Link 1</a>
                            <a href="#" class="no-underline mr-4 text-blue-500 hover:text-blue-400">Link 2</a>
                        </div>
                    </div> --}}

               


                    <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-light text-gray-600 dark:text-gray-400">Mar 10, 2019</span>
                            <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500">Design</a>
                        </div>
                
                        <div class="mt-2">
                            <a href="#" class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">Accessibility tools for designers and developers</a>
                            <p class="mt-2 text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4">
                            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>
                
                            <div class="flex items-center">
                                <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">
                                <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">Khatab wedaa</a>
                            </div>
                        </div>
                    </div>
                    {{-- post end --}}


                </div>
                <div class="lg:w-1/3 md:w-1/2  flex flex-col md:ml-auto w-full md:py-8 mt-5 md:mt-0">
                    <div class="shadow p-4 bg-white">

                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">NEW</span>
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">NEW</span>
                    </div>
                </div>
            </div>




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
