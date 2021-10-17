@extends('blog.index')


@section('content')
    <div class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="bg-gray-200">
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    @include('blog.components.member_sidebar')
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-auto">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="w-full max-w-xs">
                            

                            </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">

                            <div class="grid grid-cols-2">

                            </div>
                            <!-- End of Experience and education grid -->
                        </div>
                        <!-- End of profile tab -->
                    </div>
                </div>
            </div>
        </div>

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
