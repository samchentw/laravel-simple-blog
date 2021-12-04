@extends('blog.index')


@section('content')
    <div x-data="pageData()" x-cloak
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

        <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">

            <div class="mt-2">
                <div class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200">
                    忘記密碼</div>
                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    忘記密碼了嗎？沒問題。只需告訴我們您的電子郵件地址，我們就會通過電子郵件向您發送一個密碼重置鏈接，讓您可以選擇一個新密碼。
                </p>

               
            </div>

            <div class="flex items-center justify-between mt-4">
               

                <template x-if="!btnState">
                    <div class="mt-3 text-white">
                        電子郵件： <input x-model="email" class="text-black" type="text">
                        <button 
                        x-on:click="send()"
                        class="bg-blue-500  ml-3
                        hover:bg-blue-700 text-white font-bold 
                        py-1 px-2 rounded-full">送出重置信</button>
                     </div>
                </template>

                <template x-if="btnState">
                    <div class="text-blue-600 dark:text-blue-400">
                        請稍等…
                    </div>
                </template>

                {{-- <div class="flex items-center">
                    <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="/images/weiweiBear.png"
                        alt="avatar">
                    <a href="javascript:void(0)" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
                        Marmo</a>
                </div> --}}
            </div>

            <template x-if="alreadySend">
                <div class="mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">系統訊息</strong>
                    <span class="block">已發送電子郵件！</span>
                </div>
            </template>
        </div>
    </div>
@endsection


<script>
    function pageData() {
        return {
            alreadySend: false,
            btnState: false,
            email:'',
            send() {
                this.alreadySend = false;
                this.btnState = true;
                let url = @json(route('password.email'));
                axios.post(url, {
                    email:this.email
                }).then(x => {
                    this.alreadySend = true;
                    this.btnState = false;
                })
            },
            init() {}
        }
    }
</script>
