@extends('blog.index')

<link rel="stylesheet" href="{{ asset('css/ck-content.css') }}" type="text/css">
@section('content')
    <div class="mt-3 mb-3" x-data="pageData()">
        <div class="bg-gray-700 px-4 py-16  mx-auto sm:max-w-xl md:max-max-w-2xl lg:max-w-4xl md:px-24 lg:px-10 lg:py-20">
            {{-- start --}}
            <div class="text-3xl dark:text-gray-200">{{ $post->title }}</div>
            <div class="text-white mt-2">類別：{{$post->category->display_name}}</div>
            <div class="mt-2">
                @foreach ($post->tags as $tag)
                    <a
                        class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform 
                   bg-gray-600 rounded cursor-pointer hover:bg-gray-500">{{ $tag->name }}</a>
                @endforeach
            </div>
            <div class="mt-5 ck-content text-white">
                {!! $post->body !!}
            </div>
            {{-- end --}}
        </div>

        <div
            class="mt-2 bg-gray-700 px-4 py-16  mx-auto sm:max-w-xl md:max-max-w-2xl lg:max-w-4xl md:px-24 lg:px-10 lg:py-20">
            <div class="p-2">
                <div class="text-white text-xl">留言版</div>
                {{-- for start --}}
                @if (count($post->comments) == 0)
                    <div class="text-white">目前尚無人留言！</div>
                @endif
                @foreach ($post->comments as $comment)
                    <div class="dark:bg-gray-800 text-white mt-3   p-6 rounded-lg shadow-lg">
                        <div class="flex">
                            <div>
                                <div class="w-10 h-10 bg-cover bg-center rounded-full mr-3 shadow-inner"
                                    style="background-image: url('{{ $comment->user->profile_photo_url }}')">
                                </div>
                            </div>
                            <div>
                                <p class=" font-medium">{{ $comment->user->name }}</p>
                                <div class="flex items-center text-xs">
                                    {{-- <p>3 hours ago</p> --}}
                                    <p>{{ $comment->diffTime }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm" style="white-space:pre-wrap;">{{ $comment->body }}</p>
                        </div>

                    </div>
                @endforeach

                {{-- for end --}}


                <div>
                    @auth
                        <div class="mt-6 border-gray-100 border-t pt-4 flex justify-between">
                            <textarea x-model="body" class="form-textarea mt-1 block w-full" rows="3"
                                placeholder="說一些你想說的話吧！"></textarea>
                            <div class="flex">
                                <button x-on:click="sendComment()"
                                    class="bg-blue-500  ml-3
                            hover:bg-blue-700 text-white font-bold 
                            py-1 px-2 rounded-full">
                                    送出
                                </button>

                            </div>
                        </div>
                    @endauth

                    @guest
                        <div class="text-white mt-3">也來<a class="text-blue-500" href="/member/login">登入</a>留個言吧！</div>
                    @endguest

                </div>
            </div>



        </div>
    </div>

    <script src="{{ asset('js/prism.js') }}"></script>
@endsection

<script>
    function pageData() {
        return {
            post: @json($post),
            body: "",
            init() {
                // console.log(this.post)
            },
            sendComment() {
                axios.post('/api/comment', {
                    body: this.body,
                    post_id: this.post.id
                }).then(x => {
                    successAlert("留言成功！").then(x => {
                        location.reload();
                    })
                }).catch(err => {
                    errorForApi(err);
                })
            }
        }
    }
</script>
