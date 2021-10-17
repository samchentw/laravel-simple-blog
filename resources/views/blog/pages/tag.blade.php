@extends('blog.index')


@section('content')
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                <template x-for="tag in tags">
                    <div class="p-8 bg-white border rounded shadow-sm">
                        <a :href="'/tag/'+tag.id" aria-label="Article" title="Jingle Bells"
                            class="inline-block mb-3 text-2xl font-bold leading-5 text-black transition-colors duration-200 hover:text-deep-purple-accent-400"
                            x-text="tag.name"></a>
                        <p class="mb-5 text-gray-700">
                            目前無任何敘述
                        </p>
                    </div>
                </template>


            </div>
        </div>

    </div>
@endsection

<script>
    function pageData() {
        return {
            tags: [],
            init() {
                this.tags = @json($tags);
            }
        }
    }
</script>
