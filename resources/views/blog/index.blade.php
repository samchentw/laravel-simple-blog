<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Simple Blog</title>
</head>

<body>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('listItem', {
                todos: "todo....",
                count: 0,
            });

            //  console.log(this.$store.listItem.count)
            //  this.$store.listItem.count+=1;
        })

       
    </script>

    @include('blog/layout/header')
    <div class="wrap">
        @yield('content')
    </div>
    @include('blog/layout/footer')

    <script src="/js/axios.min.js"></script>
    <script src="/js/alpinejs.min.js"></script>
    <script src="/js/lodash.min.js"></script>
    <script src="/js/moment.js"></script>
</body>

</html>
