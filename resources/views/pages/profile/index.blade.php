@extends('../../layouts/' . $layout)

@section('subhead')
<title>Profile | Wisuda</title>
@endsection

@section('subcontent')
<div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">Tabulator</h2>
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
            <a data-tw-toggle="modal" data-tw-target="#delete-modal-preview" href="#" as="a">
                <x-base.button class="mr-2 w-1/2 sm:w-auto" id="tabulator-print" variant="danger">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="Trash2" /> Bersihkan Data
                </x-base.button>
            </a>
        </div>

    </div>
    <div class="scrollbar-hidden overflow-x-auto">
        <div class="mt-5" id="tabulator"></div>
    </div>

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
@vite('resources/js/vendor/tabulator/index.js')
@vite('resources/js/vendor/lucide/index.js')
@endpush
@endonce

@once
@push('scripts')
@vite('resources/js/pages/profile/index.js')
@endpush
@endonce

