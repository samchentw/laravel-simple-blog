@extends('blog.index')

@section('content')
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">新增文章</h2>
            <form class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="username">標題</label>
                        <input id="username" type="text" x-model="form.title"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="w-full md:w-w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="emailAddress">選擇分類</label>
                        <select x-model.number="form.categoryId"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option :value="+0">請選擇分類</option>
                            <template x-for="option in options">
                                <option :key="option.value" :value="option.value" x-text="option.text"></option>
                            </template>


                            </option>
                        </select>
                    </div>

                    <div class="w-full md:w-w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="emailAddress">標籤</label>
                        <input id="category" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="w-full md:w-w-full px-3 mt-3 mb-6 md:mb-0">
                        <label class="text-gray-700 dark:text-gray-200" for="emailAddress">內容</label>
                        <div id="editor">
                            <span x-html="form.body"></span>
                        </div>
                    </div>
                </div>

                @if (isset($post))
                    <div class="flex justify-end mt-6">
                        <button type="button" x-on:click="update()"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">修改</button>
                    </div>
                @else
                    <div class="flex justify-end mt-6">
                        <button type="button" x-on:click="create()"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">儲存</button>
                    </div>
                @endif
            </form>
        </section>
        {{-- end --}}
    </div>
@endsection
<link rel="stylesheet" href="/css/ckCustom.css" type="text/css">
<script src="/js/my-ck5.js"></script>
<script src="/js/ck5/ckeditor.js"></script>
<script>
    function pageData() {
        return {
            form: {
                categoryId: 0,
                title: '',
                body: ''
            },
            options: [],
            create() {
                this.form.body = editor.getData();
                axios.post('/api/post', this.form).then(x => {
                    successAlert('建立成功！')
                    location.href = "/"
                }).catch(err => {
                    errorForApi(err);
                })
            },
            update() {
                this.form.body = editor.getData();
                axios.put('/api/post/' + this.form.id, this.form).then(x => {
                    successAlert('更新成功！')
                    location.href = "/"
                }).catch(err => {
                    errorForApi(err);
                })
            },
            init() {
                this.form = @json($post ?? []);
                let categories = @json($categories);
                this.options = categories.map(m => {
                    return {
                        value: m.id,
                        text: m.display_name
                    };
                });
            }
        }
    }
</script>
