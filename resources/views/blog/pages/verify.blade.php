@extends('blog.index')


@section('content')
    <div x-data="pageData()" x-cloak
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}
        {{-- <form style="margin: 0;" class="block px-4 py-2 text-sm text-gray-700" method="POST" role="menuitem" tabindex="-1"
            action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left" type="submit">登出</button>
        </form> --}}




        <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">Mar 10, 2019</span>
                <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500">Design</a>
            </div> --}}

            <div class="mt-2">
                <div class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200">
                    信箱驗證</div>
                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    感謝您的註冊！在開始之前，您能否通過單擊我們剛剛通過電子郵件發送給您的鏈接來驗證您的電子郵件地址？如果您沒有收到電子郵件，我們很樂意向您發送另一封電子郵件。
                </p>
            </div>

            <div class="flex items-center justify-between mt-4">
                {{-- <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a> --}}

                <template x-if="!btnState">
                    <button x-on:click="send()" class="text-blue-600 dark:text-blue-400 hover:underline" type="button">
                        重新發送驗證電子郵件
                    </button>
                </template>

                <template x-if="btnState">
                    <div class="text-blue-600 dark:text-blue-400">
                        請稍等…
                    </div>
                </template>

                <div class="flex items-center">
                    <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="/images/weiweiBear.png"
                        alt="avatar">
                    <a href="javascript:void(0)" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
                        Marmo Bear</a>
                </div>
            </div>

            <template x-if="alreadySend">
                <div class="mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">系統訊息</strong>
                    <span class="block">已發送電子郵件！</span>
                </div>
            </template>

        </div>



        {{-- end --}}
    </div>
@endsection


<script>
    function pageData() {
        return {
            alreadySend: false,
            btnState: false,
            send() {
                this.alreadySend = false;
                this.btnState = true;
                let url = @json(route('verification.send'));
                axios.post(url, {}).then(x => {
                    this.alreadySend = true;
                    this.btnState = false;
                })
            },
            init() {}
        }
    }
</script>
