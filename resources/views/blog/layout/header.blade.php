<nav class="bg-white shadow dark:bg-gray-800" x-data="header()">
    <div class="container px-6 py-4 mx-auto max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <div class="text-xl font-semibold text-gray-700">
                    <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                        href="#">Blog</a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button" x-on:click="mobileNar=!mobileNar"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div class="flex-1 md:flex md:items-center md:justify-between" :class="(mobileNar)?'block':'hidden'">
                <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                    <a href="/"
                        class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        首頁</a>
                    <a href="/post"
                        class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        文章</a>
                    <a href="/tag"
                        class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        標籤</a>
                    <a href="/example"
                        class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        test
                    </a>
                </div>

                @auth
                    <div class="flex items-center mt-4 md:mt-0">
                        <button
                            class="hidden mx-4 text-gray-600 md:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none"
                            aria-label="show notifications">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        {{-- :class="!(mobileNar)?'block':'hidden'" --}}
                        <div class="ml-3 relative"  > 
                            <div>
                                <button type="button" x-on:click="onButtonClick()"
                                    class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                                    <div class="w-8 h-8 overflow-hidden border-1 border-gray-400 rounded-full">
                                        <img src="{{ Auth::user()->profile_photo_url }}"
                                            class="object-cover w-full h-full" alt="avatar">
                                    </div>

                                    <h3 class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-200 md:hidden">
                                        {{ Auth::user()->name }}
                                    </h3>
                                </button>
                            </div>
                            <div x-show="open" x-on:click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" x-ref="menu-items"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="/blog/index" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">個人資料</a>
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-1">設定</a> --}}

                                <form style="margin: 0;" class="block px-4 py-2 text-sm text-gray-700"
                                    method="POST" role="menuitem" tabindex="-1" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-full text-left" type="submit">登出</button>
                                </form>

                                {{-- <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                              id="user-menu-item-2">登出</a> --}}
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <div class="flex items-center mt-4 md:mt-0">
                        <a href="/blog/login"
                            class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                            登入</a>

                        <a href="/blog/register"
                            class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                            註冊</a>
                    </div>
                @endguest

            </div>
        </div>
    </div>
</nav>


<script>
    function header() {
        return {
            open: false,
            mobileNar: false,
            onButtonClick() {
                this.open = !this.open;
            },
            init() {

            }
        }
    }
</script>
