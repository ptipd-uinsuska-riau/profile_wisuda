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
                <div class="flex items-center h-15 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate"> </h2>
                    {{-- <div class="ml-auto truncate text-primary" href=""> --}}
                    <img class="ml-auto max-w-[30%]" height="10%" src="https://rekreartive.com/wp-content/uploads/2018/10/Logo-UIN-Suska-Riau-Original-PNG.png.webp"> </img>

                    {{-- </div> --}}
                </div>
                <div class="mt-5 intro-y before:hidden xl:before:block">
                    <div class="p-5 box h-auto">
                        <div class="mt-1">
                            <img id="avatar" src="https://drive.google.com/uc?id=1Omk8bgFio0Ay1Ym-8zGNJMEbI0_haxOI" alt="">
                            {{-- <x-report-donut-chart height="h-[300px]" /> --}}
                        </div>
                        {{-- <div class="mx-auto mt-8 w-52 sm:w-auto">
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
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->

            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8 xl:col-span-9">
                <div class="flex items-center h-15 intro-y">
                    <h2 class="mr-5 text-4xl mt-4 mb-3 font-medium truncate uppercase text-primary">Sidang Senat Terbuka <br>Univeristas Islam Negeri Sultan Syarif Kasim Riau </h2>

                    <a class="ml-auto truncate text-primary" href=""> </a>
                </div>
                <div class="mt-5 intro-y">
                    <div class="grid grid-cols-12 box">
                        <div class="flex flex-col justify-center col-span-12 px-8 py-12 lg:col-span-4">
                            {{-- <x-base.lucide class="w-10 h-10 text-pending" icon="PieChart" /> --}}
                            <div class="flex items-center justify-start mt-2 text-slate-600 dark:text-slate-300">
                                Nama
                            </div>
                            <div class="flex items-center justify-start mt-2">
                                <div class="relative ml-0.5 text-2xl font-medium" id="nama">
                                    ANGGI MAHARANI AGUSTINA
                                </div>
                            </div>
                            <div class="mt-1 mb-4 text-xs text-slate-500" id="nim">
                                11910123197
                            </div>
                            <hr>
                            <div class="flex items-center justify-start mt-4 text-slate-600 dark:text-slate-300">
                                Nama Orang Tua/Wali
                            </div>
                            <div class="flex items-center justify-start mt-2">
                                <div class="relative ml-0.5 text-xl font-medium" id="ayah">
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

                                        <div class="col-span-4">
                                            <div class="text-slate-500">IPK</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="transition duration-200 border shadow-sm inline-flex items-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-slate-500 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-secondary/20 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-100/10 relative justify-start col-span-12 mb-2 border-dashed border-slate-300 dark:border-darkmode-300"><span class="mr-5 truncate text-4xl text-primary" id="ipk"> 3.75 </span>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-span-6">
                                            <div class="text-slate-500">Prediket Kelulusan</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="transition duration-200 border shadow-sm inline-flex items-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-slate-500 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-secondary/20 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-100/10 relative justify-start col-span-12 mb-2 border-dashed border-slate-300 dark:border-darkmode-300"><span class="mr-5 truncate text-4xl text-primary" id="prediket"> CUMLAUDE</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12">
                                            <div class="text-slate-500">Fakultas</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base" id="fakultas">TARBIYAH DAN KEGURUAN</div>
                                            </div>
                                        </div>
                                        <div class="col-span-12">
                                            <div class="text-slate-500">Program Studi</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base" id="prodi">PENDIDIKAN AGAMA ISLAM</div>
                                            </div>
                                        </div>
                                    </x-base.tab.panel>
                                </x-base.tab.panels>
                            </x-base.tab.group>
                        </div>
                    </div>
                </div>

                <div class="mt-2 intro-y">
                    <div class="grid grid-cols-12 box">
                        <div class="flex flex-col justify-center col-span-12 px-8 py-5">
                            {{-- <x-base.lucide class="w-10 h-10 text-pending" icon="PieChart" /> --}}
                            <div class="flex items-center justify-start mt-2 text-slate-600 dark:text-slate-300">
                                Judul Penelitian
                            </div>
                            <div class="flex items-center justify-start mt-2">
                                <div class="relative ml-0.5 text-xl font-medium" id="judul">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quas quaerat? Consequuntur suscipit inventore maiores repellat ea, exercitationem ipsum dolores temporibus quidem est excepturi pariatur? Error sapiente doloremque distinctio eveniet.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END: General Report -->

        </div>
    </div>
</div>
@endsection

@once
@push('scripts')
<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f3086aa4b83d0f915692', {
        cluster: 'ap1'
        , encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('status-liked');


    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\StatusLiked', function(data) {
        const id = data.id; // Mengambil nilai ID dari data Pusher
        console.log('Received data from Pusher:', data);
        // Lanjutkan dengan pengambilan data dari server berdasarkan ID dan manipulasi DOM
        fetch(`/profile/show-data/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);


                // Lanjutkan dengan manipulasi DOM atau tampilan sesuai data yang diterima

                // Update student name
                document.getElementById('nama').textContent = data.nama;

                // Update student NIM
                document.getElementById('nim').textContent = data.nim;

                // Update student IPK
                document.getElementById('ipk').textContent = data.ipk;

                // Update Prediket Kelulusan
                document.getElementById('prediket').textContent = data.prediket;

                // Update Fakultas
                document.getElementById('fakultas').textContent = data.fakultas;

                // Update Program Studi
                document.getElementById('prodi').textContent = data.prodi;

                // Update the student's image
                const avatarElement = document.getElementById('avatar');
                avatarElement.src = data.foto;
                avatarElement.alt = data.nama;

                // Update Judul Penelitian
                document.getElementById('judul').textContent = 'Judul Penelitian: ' + data.judul_penelitian;


            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });

</script>

@endpush
@endonce
