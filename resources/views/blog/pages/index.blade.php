@extends('blog.index')


@section('content')

    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

        <section class="bg-white dark:bg-gray-800">
            <div class="container px-6 py-8 mx-auto">
                <div class="items-center lg:flex">
                    <div class="lg:w-1/2">
                        {{-- <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                            blog
                        </h2> --}}

                        {{-- <p class="mt-4 text-gray-500 dark:text-gray-200 lg:max-w-md">
                            Hi I am jane , software engineer <a class="font-bold text-indigo-600 dark:text-indigo-400"
                              href="#">@BakaTeam</a> , Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum in
                          sed non alias, fugiat, commodi nemo ut fugit corrupti dolorem sequi ex veniam consequuntur id,
                          maiores beatae ipsa omnis aliquam?
                        </p> --}}

                        <div class="flex items-center mt-6 -mx-2">
                            
                        </div>
                    </div>

                    <div class="mt-8 lg:mt-0 lg:w-1/2">
                        <div class="flex items-center justify-center lg:justify-end">
                            <div class="max-w-lg">
                                {{-- <img class="object-cover object-center w-full h-64 rounded-md shadow"
                                  src="https://images.unsplash.com/photo-1484399172022-72a90b12e3c1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80"
                                  alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>




    </div>
@endsection

<script>
    function pageData() {
        return {

            init() {
                // console.log(@json(Auth::user()))
            }
        }
    }
</script>
