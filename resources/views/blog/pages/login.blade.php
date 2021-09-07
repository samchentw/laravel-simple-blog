@extends('blog.index')


@section('content')

    <div x-data="pageData()">
        test hi
        <button x-on:click="btnClick()">click</button>
    </div>
@endsection

<script>
    function pageData() {
        return {
            btnClick() {
                console.log("run...")
            },
            init() {
            }
        }
    }
</script>
