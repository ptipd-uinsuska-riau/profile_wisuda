{{-- $layout = 'layout=top-menu' --}}
@extends('../../layouts/top-menu' )


@section('subhead')
<title>Profile | Wisuda</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
<div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">List Data Wisudawan</h2>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box mt-5 p-5 pb-20">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <div class="mt-5 flex sm:mt-0">

            <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" href="#" as="a">
                <x-base.button class="mr-2 w-1/2 sm:w-auto" id="tabulator-print" variant="outline-secondary">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="ExternalLink" /> Import Excell
                </x-base.button>
            </a>

            <a href="{{ route('profile.export') }}" target="_blank">
                <x-base.button class="mr-2 w-1/2 sm:w-auto" id="tabulator-print" variant="outline-secondary">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="FileText" /> Export Template
                </x-base.button>
            </a>

        </div>

        <div class="mt-5 flex sm:mt-0 ml-auto">
            <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-export-absen" href="#" as="a">
                <x-base.button class="mr-2 w-1/2 sm:w-auto" id="tabulator-print" variant="outline-secondary">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="FileText" /> Export Absen
                </x-base.button>
            </a>

            <a data-tw-toggle="modal" data-tw-target="#delete-modal-preview" href="#" as="a">
                <x-base.button class="mr-2 w-1/2 sm:w-auto" id="tabulator-print" variant="danger">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="Trash2" /> Bersihkan Data
                </x-base.button>
            </a>

        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mt-4">
        <div class="mt-5 flex sm:mt-0"></div>

        <div class="mt-5 flex sm:mt-0 ml-auto">
            <form action="{{ route('profile.index') }}" method="GET">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="Cari berdasarkan nama atau nim" value="{{ request('search') }}" class="px-2 py-1 border rounded-md">
                    <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded-md">Cari</button>
                </div>
            </form>
        </div>
    </div>



    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="">
                <tr class="[&amp;amp;:nth-of-type(odd)_td]:bg-slate-100 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-opacity-50">
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                        #
                    </th>
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                        Mahasiswa
                    </th>
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                        Fakultas / Prodi
                    </th>
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                        IPK
                    </th>
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                        LOG
                    </th>
                    <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                <tr class="[&amp;amp;:nth-of-type(odd)_td]:bg-slate-100 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-opacity-50">
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        {{ $item->id }}
                    </td>
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        <div class="font-medium whitespace-nowrap"> {{ $item->nama }}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap"> {{ $item->nim }}</div>
                    </td>
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        <div class="font-medium whitespace-nowrap"> {{ $item->fakultas }}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap"> {{ $item->prodi }}</div>
                    </td>
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        <div class="font-medium whitespace-nowrap"> {{ $item->ipk }}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Semester {{ $item->smt }}</div>
                    </td>
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        <div class="text-xs text-slate-500 whitespace-nowrap">Lulus {{ $item->tgl_lulus }}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Lulus {{ $item->tgl_skl }}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Validasi {{ $item->tgl_validasi }}1</div>

                    </td>
                    <td class="px-5 py-3 border-b dark:border-darkmode-300">
                        <div class="mt-3">
                            <div class="mt-2">
                                <div class="flex items-center">
                                    <input name="status" data-id="{{ $item->id }}" id="status-{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }} type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type=&#039;radio&#039;]]:checked:bg-primary [&amp;[type=&#039;radio&#039;]]:checked:border-primary [&amp;[type=&#039;radio&#039;]]:checked:border-opacity-10 [&amp;[type=&#039;checkbox&#039;]]:checked:bg-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" />


                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>


        <div class="flex items-center mt-4">
            <h2 class="mr-auto text-lg font-medium truncate">
            </h2>
            {{ $data->links() }}
        </div>
    </div>


    <x-base.dialog id="header-footer-modal-export-absen">
        <x-base.dialog.panel>
            <form action="{{ route('profile.absen') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-base.dialog.title>
                    <h2 class="mr-auto text-base font-medium">
                        Export Absen
                    </h2>
                </x-base.dialog.title>
                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <x-base.form-label for="modal-form-1">Fakultas</x-base.form-label>
                        <div class="mt-2">
                            <select name="filter_fakultas" data-placeholder="Pilih Fakultas" class="tom-select w-full">
                                <option value="all">Semua Data</option>
                                @foreach ($fakultas as $item)
                                <option value="{{ $item->fakultas }}">{{ $item->fakultas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </x-base.dialog.description>
                <x-base.dialog.footer>
                    <x-base.button class="mr-1 w-20" data-tw-dismiss="modal" type="button" variant="outline-secondary">
                        Cancel
                    </x-base.button>
                    <x-base.button class="w-20" type="submit" variant="primary">
                        Send
                    </x-base.button>
                </x-base.dialog.footer>
            </form>
        </x-base.dialog.panel>
    </x-base.dialog>
    <!-- END: Modal Content -->


    <!-- BEGIN: Modal Content -->
    <x-base.dialog id="header-footer-modal-preview">
        <x-base.dialog.panel>
            <form action="{{ route('profile.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-base.dialog.title>
                    <h2 class="mr-auto text-base font-medium">
                        Import File Excell
                    </h2>
                </x-base.dialog.title>
                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6">
                        <x-base.form-label for="modal-form-1">File</x-base.form-label>
                        <input type="file" name="file">
                    </div>
                </x-base.dialog.description>
                <x-base.dialog.footer>
                    <x-base.button class="mr-1 w-20" data-tw-dismiss="modal" type="button" variant="outline-secondary">
                        Cancel
                    </x-base.button>
                    <x-base.button class="w-20" type="submit" variant="primary">
                        Send
                    </x-base.button>
                </x-base.dialog.footer>
            </form>
        </x-base.dialog.panel>
    </x-base.dialog>
    <!-- END: Modal Content -->

    <!-- BEGIN: Modal Content -->
    <x-base.dialog id="delete-modal-preview">
        <x-base.dialog.panel>
            <div class="p-5 text-center">
                <x-base.lucide class="mx-auto mt-3 h-16 w-16 text-danger" icon="XCircle" />
                <div class="mt-5 text-3xl">Are you sure?</div>
                <div class="mt-2 text-slate-500">
                    Do you really want to delete these records? <br />
                    This process cannot be undone.
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <x-base.button class="mr-1 w-24" data-tw-dismiss="modal" type="button" variant="outline-secondary">
                    Cancel
                </x-base.button>
                <a href="{{ route('profile.turncate') }}">
                    <x-base.button class="w-24" type="button" variant="danger">
                        Delete
                    </x-base.button>
                </a>
            </div>
        </x-base.dialog.panel>
    </x-base.dialog>
    <!-- END: Modal Content -->


</div>
<!-- END: HTML Table Data -->
@endsection

@once
@push('vendors')
@vite('resources/js/vendor/tom-select/index.js')
@endpush
@endonce

@once
@push('scripts')
@vite('resources/js/components/tom-select/index.js')
@endpush
@endonce


@once
@push('scripts')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@endpush
@endonce

@once
@push('vendors')
@vite('resources/js/vendor/tabulator/index.js')
@vite('resources/js/vendor/lucide/index.js')
@endpush
@endonce

@once
@push('scripts')
{{-- @vite('resources/js/pages/profile/index.js') --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const prevButton = document.getElementById("prev-button");
        const nextButton = document.getElementById("next-button");

        prevButton.addEventListener("click", function() {
            // Lakukan perintah untuk navigasi ke halaman sebelumnya
            // Misal: window.location.href = '/profile/data?page=' + (currentPage - 1);
        });

        nextButton.addEventListener("click", function() {
            // Lakukan perintah untuk navigasi ke halaman berikutnya
            // Misal: window.location.href = '/profile/data?page=' + (currentPage + 1);
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusCheckboxes = document.querySelectorAll('input[name="status"]');

        statusCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const id = this.getAttribute('data-id');
                const status = this.checked ? 1 : 0;

                updateStatus(id, status);
            });
        });

        function updateStatus(id, status) {
            const formData = new FormData();
            formData.append('status', status);

            fetch(`/profile/update/${id}`, {

                    method: 'POST'
                    , body: formData
                    , headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Lakukan sesuatu dengan respon dari server jika diperlukan

                    //kirim pop up error ke view
                    Toastify({
                        node: $("#change-status").clone().removeClass("hidden")[0]
                        , duration: 3000
                        , newWindow: true
                        , close: true
                        , gravity: "top"
                        , position: "right"
                        , backgroundColor: "white",

                        stopOnFocus: true
                    , }).showToast();

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

</script>
@endpush
@endonce
