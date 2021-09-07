@extends('blog.index')


@section('content')

    <div x-data="pageData()">
        test
    </div>
@endsection

<script>
    function pageData() {
        return {
           
            init() {
            }
        }
    }
</script>
