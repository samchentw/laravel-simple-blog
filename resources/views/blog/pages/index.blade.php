@extends('blog.index')


@section('content')
    <hr>
    <div x-data="pageData()"
        class="dark:bg-gray-800 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

        <section class="dark:bg-gray-800">
            <div class="container ">
                <div class="items-center lg:flex">
                    <div class="lg:w-1/2">
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                            Welcome to this site
                        </h2>

                        <p class="mt-4 text-gray-500 dark:text-gray-200 lg:max-w-md">
                           This site the main function of this site is to record the problems and precautions encountered in the program, such as html, css, javascript, php, golang, etc.
                        </p>

                        <p class="mt-4 text-gray-500 dark:text-gray-200 lg:max-w-md">
                            The author of this site did not add much design to the UI and UX, so please forgive me for the inconvenience caused.
                        </p>

                        <div class="flex items-center mt-6 -mx-2">
                            
                        </div>
                    </div>

                    <div class="mt-8 lg:mt-0 lg:w-1/2">
                        <div class="flex items-center justify-center lg:justify-end">
                            <div class="max-w-lg">
                                <img class="object-cover object-center w-full h-64 rounded-md shadow"
                                  src="/images/weiweiBear.png"
                                  alt="">
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
