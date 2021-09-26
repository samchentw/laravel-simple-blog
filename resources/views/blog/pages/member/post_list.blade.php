@extends('blog.index')


@section('content')
    <div class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="bg-gray-100">
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    @include('blog.components.member_sidebar')
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-auto">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="w-full">
                                <div class="px-6 py-4">
                                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">This is the title
                                    </h4>
                                    <p class="leading-normal text-gray-700">Lorem ipsum dolor, sit amet cons ectetur
                                        adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam
                                        tenetur laud.</p>
                                    <div>
                                        <a href="">編輯</a>
                                        <a href="">刪除</a>
                                    </div>
                                </div>
                                <hr>

                                <div class="px-6 py-4">
                                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">This is the title
                                    </h4>
                                    <p class="leading-normal text-gray-700">Lorem ipsum dolor, sit amet cons ectetur
                                        adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam
                                        tenetur laud.</p>
                                    <div>
                                        <a href="">編輯</a>
                                        <a href="">刪除</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- End of about section -->


                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
