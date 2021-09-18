@extends('blog.index')


@section('content')
    <div
        class="bg-gray-200 px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        {{-- start --}}
        <form style="margin: 0;" class="block px-4 py-2 text-sm text-gray-700" method="POST" role="menuitem" tabindex="-1"
            action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left" type="submit">登出</button>
        </form>

        <form style="margin: 0;" class="block px-4 py-2 text-sm text-gray-700" method="POST" role="menuitem" tabindex="-1"
            action="{{ route('verification.send') }}">
            @csrf
            <button class="w-full text-left" type="submit"> 重新發送驗證電子郵件</button>
        </form>

        {{-- end --}}
    </div>
@endsection

