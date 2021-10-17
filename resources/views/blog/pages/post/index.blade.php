@extends('blog.index')

<link rel="stylesheet" href="{{ asset('css/ck-content.css') }}" type="text/css">
@section('content')
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}

        <section class="body-font">
            <div class=" px-5  mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2  rounded-lg overflow-hidden sm:mr-10 p-3  items-end justify-start">
                    {{-- post --}}
                    @foreach ($postPage as $data)
                        <div class="px-8 py-4 mx-auto rounded-lg shadow-md bg-gray-800 mt-3">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $data->created_at }}</span>
                            </div>
                            <div class="mt-2">
                                @foreach ($data->tags as $tag)
                                    <a
                                        class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform 
                                        bg-gray-600 rounded cursor-pointer hover:bg-gray-500">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <a href="/post/show/{{ $data->id }}/{{ $data->slug }}"
                                    class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ $data->title }}</a>
                                <p class="text-gray-600 mt-2 dark:text-white">
                                    {!! $data->excerpt !!}
                                </p>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <a href="/post/show/{{ $data->id }}/{{ $data->slug }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>

                                <div class="flex items-center">
                                    <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                                        src="{{ $data->user->profile_photo_url }}" alt="avatar">
                                    <a
                                        class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ $data->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class=" mt-3">
                        {{ $postPage }}
                    </div>
                    {{-- post end --}}


                </div>
                <div class="lg:w-1/3 md:w-1/2  flex flex-col md:ml-auto w-full md:py-8 mt-5 md:mt-0">
                    <div class="shadow p-4 dark:text-white dark:bg-gray-800">
                        <h3>熱門標籤</h3>
                        @foreach ($tags as $tag)
                            <a href="/tag/{{ $tag->id }}"
                                class="mt-1 inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-green-100 text-indigo-100 bg-green-600 rounded-full cursor-pointer">{{ $tag->name }}</a>
                        @endforeach

                        {{-- <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">NEW</span> --}}
                    </div>
                </div>
            </div>




        </section>


        {{-- end --}}
    </div>

    <script src="{{ asset('js/prism.js') }}"></script>
@endsection

<script>
    function pageData() {
        return {

            init() {

            }
        }
    }
</script>
