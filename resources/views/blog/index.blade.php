<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/images/weiweiBear.png" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/ck-content.css" type="text/css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        [x-cloak] {
            display: none;
        }

    </style>
</head>

<body class="bg-gray-300">
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('listItem', {
                todos: "todo....",
                count: 0,
            });

            //  console.log(this.$store.listItem.count)
            //  this.$store.listItem.count+=1;
        })
        document.documentElement.classList.add('dark');


        function successAlert(title) {
            Swal.fire({
                icon: 'success',
                title: title,
                showConfirmButton: true,
                confirmButtonText: '確定'
            })
        }

        function errorHtmlAlert(title, html) {
            Swal.fire({
                html: html,
                title: title,
                // text: text,
                icon: 'error',
                confirmButtonText: '確定'
            })
        }

        function errorAlert(message) {
            return Swal.fire("系統訊息", message, "error");
        }

        //for axios catch error
        function errorForApi(error) {
            switch (error.response.status) {
                case 500:
                    errorAlert("伺服器錯誤！請通知廠商！");
                    break;
                case 403:
                    errorAlert(error.response.data.message);
                    break;
                case 422:
                    let messages = Object.values(error.response.data.errors);
                    let flattenDatas = _.flatten(messages)
                    let text = flattenDatas.join('<br>')
                    errorHtmlAlert('錯誤！', text);
                    break;
            }
        }
    </script>

    @include('blog/layout/header')
    <div>
        @yield('content')
    </div>
    @include('blog/layout/footer')

    <script src="/js/axios.min.js"></script>
    <script src="/js/alpinejs.min.js"></script>
    <script src="/js/lodash.min.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/sweetalert2@11.js"></script>
</body>

</html>
