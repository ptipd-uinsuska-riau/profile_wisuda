@extends('../../layouts/' . $layout)

@section('subhead')
<title>Show | Profile Wisuda</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 row-start-4 mt-6 md:col-span-6 lg:col-span-4 lg:row-start-3 xl:col-span-3 xl:row-start-auto xl:mt-8">
                <div class="flex items-center h-10 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate"></h2>
                    <a class="ml-auto truncate text-primary" href=""> </a>
                </div>
                <div class="mt-5 intro-y before:hidden xl:before:block">
                    <div class="p-5 box">
                        <div class="mt-3">
                            <x-report-donut-chart height="h-[196px]" />
                        </div>
                        <div class="mx-auto mt-8 w-52 sm:w-auto">
                            <div class="flex items-center">
                                <div class="w-2 h-2 mr-3 rounded-full bg-primary"></div>
                                <span class="truncate">17 - 30 Years old</span>
                                <span class="ml-auto font-medium">62%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 mr-3 rounded-full bg-pending"></div>
                                <span class="truncate">31 - 50 Years old</span>
                                <span class="ml-auto font-medium">33%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 mr-3 rounded-full bg-warning"></div>
                                <span class="truncate">&gt;= 50 Years old</span>
                                <span class="ml-auto font-medium">10%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->

            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8 xl:col-span-9">
                <div class="flex items-center h-10 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate uppercase">Sidang Senat Terbuka <br>Univeristas Islam Negeri Sultan Syarif Kasim Riau </h2>
                    <a class="ml-auto truncate text-primary" href="">  </a>
                </div>
                <div class="mt-5 intro-y">
                    <div class="grid grid-cols-12 box">
                        <div class="flex flex-col justify-center col-span-12 px-8 py-12 lg:col-span-4">
                            {{-- <x-base.lucide class="w-10 h-10 text-pending" icon="PieChart" /> --}}
                            <div class="flex items-center justify-start mt-2 text-slate-600 dark:text-slate-300">
                                Nama
                            </div>
                            <div class="flex items-center justify-start mt-2">
                                <div class="relative ml-0.5 text-2xl font-medium">
                                    ANGGI MAHARANI AGUSTINA
                                </div>
                            </div>
                            <div class="mt-1 mb-4 text-xs text-slate-500">
                                11910123197
                            </div>
                            <hr>
                            <div class="flex items-center justify-start mt-4 text-slate-600 dark:text-slate-300">
                                Nama Orang Tua/Wali
                            </div>
                            <div class="flex items-center justify-start mt-2">
                                <div class="relative ml-0.5 text-xl font-medium">
                                    ANGGI MAHARANI AGUSTINA
                                </div>
                            </div>
                            {{--
                            <x-base.button class="relative justify-start mt-12 rounded-full" variant="outline-secondary">
                                Download Reports
                                <span class="absolute right-0 top-0 bottom-0 my-auto ml-auto mr-0.5 flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white">
                                    <x-base.lucide class="w-4 h-4" icon="ArrowRight" />
                                </span>
                            </x-base.button> --}}
                        </div>
                        <div class="col-span-12 p-8 border-t border-dashed border-slate-200 dark:border-darkmode-300 lg:col-span-8 lg:border-t-0 lg:border-l">
                            <x-base.tab.group>
                                <x-base.tab.panels class="px-5 pb-5">
                                    <x-base.tab.panel class="grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report" selected>
                                        <div class="col-span-12">
                                            <div class="text-slate-500">IPK</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">3.75</div>
                                            </div>
                                        </div>
                                        <div class="col-span-4">
                                            <div class="text-slate-500">Prediket Kelulusan</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">Cum laude</div>
                                            </div>
                                        </div>
                                        <div class="col-span-6">
                                            <div class="text-slate-500">Semester</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">7</div>
                                            </div>
                                        </div>
                                        <div class="col-span-12">
                                            <div class="text-slate-500">Fakultas</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">TARBIYAH DAN KEGURUAN</div>
                                            </div>
                                        </div>
                                        <div class="col-span-12">
                                            <div class="text-slate-500">Program Studi</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">PENDIDIKAN AGAMA ISLAM</div>
                                            </div>
                                        </div>
                                    </x-base.tab.panel>
                                </x-base.tab.panels>
                            </x-base.tab.group>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
        </div>
    </div>
</div>
@endsection

