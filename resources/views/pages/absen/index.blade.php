@extends('../../layouts/' . $layout)

@section('subhead')
<title>Absensi Wisuda</title>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
@endsection

@section('subcontent')
<div class="relative">
    <div class="grid grid-cols-12 gap-6">
        <div class="z-20 col-span-12 xl:col-span-9 2xl:col-span-9">
            <div class="mt-6 -mb-6 intro-y">

                @isset($alert)
                <x-base.alert class="flex items-center mb-6 box dark:border-darkmode-600" variant="primary" dismissible>
                    <span>
                        {{$alert}}
                    </span>
                    <x-base.alert.dismiss-button class="text-white">
                        <x-base.lucide class="w-4 h-4" icon="X" />
                    </x-base.alert.dismiss-button>
                </x-base.alert>
                @endif

            </div>
        </div>
    </div>
    <div class="mt-5 top-0 right-0 z-30 grid w-full h-full grid-cols-12 gap-6 pb-6 -mt-8 xl:absolute xl:z-auto xl:mt-0 xl:pb-0">
        <div class="z-30 col-span-12 xl:col-span-3 xl:col-start-10 xl:pb-16">
            <div class="flex flex-col h-full">
                <div class="p-5 mt-6 box intro-x bg-primary">
                    <div class="flex flex-wrap gap-3">
                        <div class="mr-auto">
                            <div class="flex items-center leading-3 text-white text-opacity-70 dark:text-slate-300">
                                Rekam Absensi
                                <x-base.tippy as="div" content="Total value of your sales: $158.409.416">
                                    <x-base.lucide class="ml-1.5 h-4 w-4" icon="AlertCircle" />
                                </x-base.tippy>
                            </div>
                            <div class="relative mt-3.5 pl-0 text-2xl font-medium leading-5 text-white">
                                {{ $jam }}
                            </div>
                        </div>
                        <a id="scanButton" class="flex items-center justify-center w-12 h-12 text-white bg-white rounded-full bg-opacity-20 hover:bg-opacity-30 dark:bg-darkmode-300" href="#">
                            <x-base.lucide class="w-6 h-6" icon="Camera" />
                        </a>
                    </div>
                </div>
                <div class="intro-x xl:min-h-0">
                    <x-base.tab.group class="max-h-full mt-5 box xl:overflow-y-auto">
                        <div class="top-0 px-5 pt-5 pb-6 xl:sticky">
                            <div class="flex items-center">
                                <div class="mr-5 text-lg font-medium truncate">
                                    Data Mahasiswa
                                </div>
                            </div>
                        </div>
                        <x-base.tab.panels class="px-5 pb-5">
                            <x-base.tab.panel class="grid grid-cols-12 gap-y-6" id="weekly-report" selected>
                                <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                    <div class="text-slate-500">Nama Mahasiswa</div>
                                    <div class="mt-1.5 flex items-center">
                                        <div class="text-lg" id="nm_pd">Erno Irwandi</div>
                                    </div>
                                    <div class="text-sm" id="id_pd">11653101555</div>

                                </div>
                                <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                    <div class="text-slate-500">Program Studi</div>
                                    <div class="mt-1.5 flex items-center">
                                        <div class="text-lg" id="sms">Nama prodi</div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                    <div class="text-slate-500">Email</div>
                                    <div class="mt-1.5 flex items-center">
                                        <div class="text-lg" id="email">erno.irwandi@uin-suska.ac.id</div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                    <div class="text-slate-500">No HP</div>
                                    <div class="mt-1.5 flex items-center">
                                        <div class="text-lg" id="no_hp">082277958348</div>
                                    </div>
                                </div>

                                <a href="{{ route('profile.index') }}">
                                    <x-base.button class="relative justify-start col-span-12 mb-2 border-dashed border-slate-300 dark:border-darkmode-300" variant="outline-secondary">
                                        <span class="mr-5 truncate"> Logout </span>
                                        <span class="absolute right-0 top-0 bottom-0 my-auto ml-auto mr-0.5 flex h-8 w-8 items-center justify-center">
                                            <x-base.lucide class="w-4 h-4" icon="ArrowRight" />
                                        </span>
                                    </x-base.button>
                                </a>
                            </x-base.tab.panel>
                        </x-base.tab.panels>
                    </x-base.tab.group>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@once
@push('vendors')
@vite('resources/js/vendor/toastify/index.js')
@endpush
@endonce


@once
@push('scripts')
@vite('resources/js/pages/mahasiswa/index.js')
@endpush
@endonce
