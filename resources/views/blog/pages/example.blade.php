@extends('blog.index')


@section('content')
    <div x-data="pageData()">

        <button x-on:click="btnClick()">test</button>
        <span x-text="result"></span>

    </div>
@endsection

<script>
    function pageData() {
        return {
            result:null,
            btnClick() {
               this.result = "test";
            },
            init() {
                console.log('run alpinejs...')
            }
        }
    }
</script>
