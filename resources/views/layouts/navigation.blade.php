<nav x-data="{ open: false }" class="bg-white border-b border-gray-500">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-1 sm:px-18 lg:px-18">
        <div class="flex justify-between h-13">
            <div class="flex">
                <div class="hidden space-x-3 sm:-my-px sm:ml-83 sm:flex">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <img src="{{asset('storage/actas.png')}}" >
                </x-nav-link>
                {{-- <a href="{{ route('dashboard') }}">
                    <img src="{{asset('storage/actas.png')}}" style="max-height:80px;">
                    </a> --}}
                <!-- Navigation Links -->
                              
                    <x-responsive-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                    チーム掲示板
                    </x-nav-link>
                    <x-responsive-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                    トーク新規作成
                    </x-nav-link>
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    ダッシュボード
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('todos.index')" :active="request()->routeIs('todos.index')">
                    学習課題管理
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('matching.show')" :active="request()->routeIs('matching.show')">
                    課題本チーム
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('userprofile.index')" :active="request()->routeIs('userprofile.index')">
                    課題本を登録
                        </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('book_index')" :active="request()->routeIs('book_index')">
                    課題本マスター（管理者用）
                    </x-responsive-nav-link>
                </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-lime-300 hover:text-green-700 focus:outline-none transition ease-in-out duration-150">
                            <div>@if(Auth::check()) {{ Auth::user()->name }} @endif</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                グループ掲示板
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                掲示板‐新規作成
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                ダッシュボード
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('todos.index')" :active="request()->routeIs('todos.index')">
                学習課題管理
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('book_index')" :active="request()->routeIs('book_index')">
                課題本マスター（管理者用）
            </x-responsive-nav-link>
          

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">  @if(Auth::check()) {{ Auth::user()->name }} @endif</div>
                <div class="font-medium text-sm text-gray-500">  @if(Auth::check()) {{ Auth::user()->name }} @endif</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
