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
    <div class="relative z-[51] -mx-3 mt-12 mb-10 h-[70px] border-b border-white/[0.08] px-4 sm:-mx-8 sm:px-8 md:mx-0 md:mt-0 md:mb-8 md:px-6">
        <div class="flex h-full items-center">
            <!-- BEGIN: Logo -->
            <a class="-intro-x hidden md:flex" href="">
                <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Absensi wisuda" />
                <span class="ml-3 text-lg text-white"> Absensi Wisuda </span>
            </a>
            <!-- END: Logo -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Content -->
    <div @class([ 'rounded-[30px] md:rounded-[35px_35px_0px_0px] min-w-0 min-h-screen max-w-full md:max-w-none bg-slate-100 flex-1 pb-10 px-4 md:px-6 relative mt-8 dark:bg-darkmode-700' , "before:content-[''] before:w-full before:h-px before:block" , "after:content-[''] after:z-[-1] after:rounded-[40px_40px_0px_0px] after:w-[97%] after:inset-y-0 after:absolute after:left-0 after:right-0 after:bg-white/10 after:-mt-4 after:mx-auto after:dark:bg-darkmode-400/50" , ])>
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
