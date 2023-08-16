@extends('../../layouts/' . $layout)

@section('subhead')
<title>Profile | Wisuda</title>
@endsection

@section('subcontent')
<div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">Tabulator</h2>
    <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        <x-base.button class="mr-2 shadow-md" variant="primary">
            Add New Product
        </x-base.button>
        <x-base.menu class="ml-auto sm:ml-0">
            <x-base.menu.button class="!box px-2 font-normal" as="x-base.button">
                <span class="flex h-5 w-5 items-center justify-center">
                    <x-base.lucide class="h-4 w-4" icon="Plus" />
                </span>
            </x-base.menu.button>
            <x-base.menu.items class="w-40">
                <x-base.menu.item>
                    <x-base.lucide class="mr-2 h-4 w-4" icon="FilePlus" /> New Category
                </x-base.menu.item>
                <x-base.menu.item>
                    <x-base.lucide class="mr-2 h-4 w-4" icon="UserPlus" /> New Group
                </x-base.menu.item>
            </x-base.menu.items>
        </x-base.menu>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box mt-5 p-5 pb-20">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <div class="mt-5 flex sm:mt-0">

            <a href="{{ route('profile.export') }}" target="_blank">
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
    </div>
    <div class="scrollbar-hidden overflow-x-auto">
        <div class="mt-5" id="tabulator"></div>
    </div>
</div>
<!-- END: HTML Table Data -->
@endsection

@once
@push('vendors')
@vite('resources/js/vendor/tabulator/index.js')
@vite('resources/js/vendor/lucide/index.js')
@vite('resources/js/vendor/xlsx/index.js')
@endpush
@endonce

@once
@push('scripts')
@vite('resources/js/pages/tabulator/index.js')
@endpush
@endonce

