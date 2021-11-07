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
                        <div class="bg-white p-3 shadow-sm rounded-sm" x-data="pageData()">
                            <div class="w-full max-w-xs">
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    {{-- {{ method_field('PUT') }} --}}
                                    {{-- @method('PUT') --}}


                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="current_password">
                                            現在密碼
                                        </label>
                                        <input x-model="form.current_password" name="current_password"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="current_password" type="password">


                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                            新密碼
                                        </label>
                                        <input x-model="form.password" name="password"
                                            class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                            id="password" type="password">
                                        {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"
                                            for="password_confirmation">
                                            新密碼確認
                                        </label>
                                        <input x-model="form.password_confirmation" name="password_confirmation"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                            id="password_confirmation" type="password">
                                        {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <button x-on:click="btnClick()"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="button">
                                            修改
                                        </button>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- End of about section -->

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

<script>
    function pageData() {
        return {
            apiUrl: @json(route('user-password.update')),
            form: {},
            btnClick() {
                axios.put(this.apiUrl, this.form).then(res => {
                    this.form = {};
                    successAlert('修改成功！')
                }).catch(error => {
                    errorForApi(error);
                })
            },
            init() {

            }
        }
    }
</script>
