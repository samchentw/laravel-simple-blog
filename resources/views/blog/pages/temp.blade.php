@extends('blog.index')


@section('content')
    <div x-data="pageData()"
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}


        {{-- end --}}
    </div>
@endsection

<script>
    function pageData() {
        return {
            result: null,
            btnClick() {
                this.result = "test";
            },
            init() {
                console.log('run alpinejs...')
            }
        }
    }
</script>
