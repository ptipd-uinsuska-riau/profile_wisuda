@extends('../layouts/base')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div class="-mx-3 bg-black/[0.15] py-5 px-3 dark:bg-transparent sm:-mx-8 sm:px-8 md:py-0">
        {{-- <x-dark-mode-switcher />
        <x-main-color-switcher /> --}}
        <x-mobile-menu />
        <!-- BEGIN: Top Bar -->
        <div
            class="relative z-[51] -mx-3 mt-12 mb-10 h-[70px] border-b border-white/[0.08] px-4 sm:-mx-8 sm:px-8 md:mx-0 md:mt-0 md:mb-8 md:px-6">
            <div class="flex h-full items-center">
                <!-- BEGIN: Logo -->
                <a
                    class="-intro-x hidden md:flex"
                    href=""
                >
                    <img
                        class="w-6"
                        src="{{ Vite::asset('resources/images/logo.svg') }}"
                        alt="Absensi wisuda"
                    />
                    <span class="ml-3 text-lg text-white"> Absensi Wisuda </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <x-base.breadcrumb
                    class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10"
                    light
                >

                </x-base.breadcrumb>
                <!-- END: Breadcrumb -->

                <!-- BEGIN: Account Menu -->
                <x-base.menu>
                    <x-base.menu.button
                        class="image-fit zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg"
                    >
                        <img
                            src="https://rekreartive.com/wp-content/uploads/2018/10/Logo-UIN-Suska-Riau-Original-PNG.png.webp"
                            alt="avatar"
                        />
                    </x-base.menu.button>
                    <x-base.menu.items
                        class="relative mt-px w-56 bg-primary/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black"
                    >
                        <x-base.menu.header class="font-normal">
                            <div class="font-medium">{{ $fakers[0]['users'][0]['name'] }}</div>
                            <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                                {{ $fakers[0]['jobs'][0] }}
                            </div>
                        </x-base.menu.header>
                        <x-base.menu.divider class="bg-white/[0.08]" />
                        <x-base.menu.item class="hover:bg-white/5">
                            <x-base.lucide
                                class="mr-2 h-4 w-4"
                                icon="ToggleRight"
                            /> Logout
                        </x-base.menu.item>
                    </x-base.menu.items>
                </x-base.menu>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav @class([
            'top-nav z-50 relative -mt-[3px] hidden md:block',

            // Animation
            'translate-y-[50px] opacity-0 animate-[0.4s_ease-in-out_0.2s_intro-top-menu] animate-fill-mode-forwards',
        ])>
            <ul class="flex h-[58px] flex-wrap px-6 xl:px-[50px]">
                @foreach ($topMenu as $menuKey => $menu)
                    <li>
                        <a
                            href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}"
                            @class([
                                $firstLevelActiveIndex == $menuKey
                                    ? 'top-menu top-menu--active'
                                    : 'top-menu',

                                // Animation
                                '[&:not(.top-menu--active)]:opacity-0 [&:not(.top-menu--active)]:translate-y-[50px] animate-[0.4s_ease-in-out_0.3s_intro-top-menu] animate-fill-mode-forwards animate-delay-' .
                                (array_search($menuKey, array_keys($topMenu)) + 1) * 10,
                            ])
                        >
                            <div class="top-menu__icon">
                                <x-base.lucide icon="{{ $menu['icon'] }}" />
                            </div>
                            <div class="top-menu__title">
                                {{ $menu['title'] }}
                                @if (isset($menu['sub_menu']))
                                    <x-base.lucide
                                        class="top-menu__sub-icon"
                                        icon="chevron-down"
                                    />
                                @endif
                            </div>
                        </a>
                        @if (isset($menu['sub_menu']))
                            <ul class="{{ $firstLevelActiveIndex == $menuKey ? 'top-menu__sub-open' : '' }}">
                                @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                    <li>
                                        <a
                                            class="top-menu"
                                            href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params']) : 'javascript:;' }}"
                                        >
                                            <div class="top-menu__icon">
                                                <x-base.lucide icon="{{ $subMenu['icon'] }}" />
                                            </div>
                                            <div class="top-menu__title">
                                                {{ $subMenu['title'] }}
                                                @if (isset($subMenu['sub_menu']))
                                                    <x-base.lucide
                                                        class="top-menu__sub-icon"
                                                        icon="chevron-down"
                                                    />
                                                @endif
                                            </div>
                                        </a>
                                        @if (isset($subMenu['sub_menu']))
                                            <ul
                                                class="{{ $secondLevelActiveIndex == $subMenuKey ? 'top-menu__sub-open' : '' }}">
                                                @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                    <li>
                                                        <a
                                                            class="top-menu"
                                                            href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}"
                                                        >
                                                            <div class="top-menu__icon">
                                                                <x-base.lucide icon="{{ $lastSubMenu['icon'] }}" />
                                                            </div>
                                                            <div class="top-menu__title">{{ $lastSubMenu['title'] }}</div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div @class([
            'rounded-[30px] md:rounded-[35px_35px_0px_0px] min-w-0 min-h-screen max-w-full md:max-w-none bg-slate-100 flex-1 pb-10 px-4 md:px-6 relative mt-8 dark:bg-darkmode-700',
            "before:content-[''] before:w-full before:h-px before:block",
            "after:content-[''] after:z-[-1] after:rounded-[40px_40px_0px_0px] after:w-[97%] after:inset-y-0 after:absolute after:left-0 after:right-0 after:bg-white/10 after:-mt-4 after:mx-auto after:dark:bg-darkmode-400/50",
        ])>
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection

@once
    @push('scripts')
        @vite('resources/js/components/top-bar/index.js')
    @endpush
@endonce
