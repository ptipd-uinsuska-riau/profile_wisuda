@if (Session::has('showSuccessToast'))
<!-- BEGIN: Notif Info -->
<div class="text-center">
    <!-- BEGIN: Notification Content -->
    <div id="pesan_status" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex flex flex">
        <i data-lucide="check-circle" width="24" height="24" class="stroke-1.5 text-success text-success"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Info!</div>
            <div class="mt-1 text-slate-500">
                @php
                $toastMessage = Session::get('toastMessage');
                @endphp
                {{ $toastMessage }}
            </div>
        </div>
    </div>
    <!-- END: Notification Content -->
</div>
<!-- END: Notif Info -->
@endif

