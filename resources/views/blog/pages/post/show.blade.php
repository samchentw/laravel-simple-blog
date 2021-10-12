@extends('blog.index')

<link rel="stylesheet" href="{{ asset('css/ck-content.css') }}" type="text/css">
@section('content')
    <div class="mt-3 mb-3" x-data="pageData()">
        <div class="bg-gray-700 px-4 py-16  mx-auto sm:max-w-xl md:max-max-w-2xl lg:max-w-4xl md:px-24 lg:px-10 lg:py-20">
            {{-- start --}}
            <div class="text-3xl dark:text-gray-200">{{ $post->title }}</div>
            <div class="mt-2">
                @foreach ($post->tags as $tag)
                    <a
                        class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform 
                   bg-gray-600 rounded cursor-pointer hover:bg-gray-500">{{ $tag->name }}</a>
                @endforeach
            </div>
            <div class="mt-2 ck-content ">
                {!! $post->body !!}
            </div>
            {{-- end --}}
        </div>
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
