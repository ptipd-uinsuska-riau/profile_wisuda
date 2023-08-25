@extends('../../layouts/' . $layout)

@section('head')
<title>Scan | Wisuda </title>
<script type="text/javascript" src="/js/jsqrscanner.nocache.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<style>
    video {
        width: 100vw !important;
        height: 100vh !important;
        object-fit: cover !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
    }
</style>
@endsection

@section('content')
<div class="py-2">
    <div class="container">
        {{-- tampilkan withSuccess jika selesai absen --}}
        @isset($alert)
        <x-base.alert class="flex items-center mb-6 box dark:border-darkmode-600" variant="danger" dismissible>
            <span>
                {{$alert}}
            </span>
            <x-base.alert.dismiss-button class="text-white">
                <x-base.lucide class="w-4 h-4" icon="X" />
            </x-base.alert.dismiss-button>
        </x-base.alert>
        @endif

        <!-- BEGIN: Error Page -->
        <div id="scanner">
            <video class="qrPreviewVideo" autoplay="" tabindex="0" src="" playsinline="true"></video>
        </div>

        {{-- form --}}
        <div class="mt-5">
            <form action="{{ route('mahasiswa.submit') }}" method="POST" id="autoSubmitForm">
                @csrf
                <div class="mt-3 w-full sm:mt-0 sm:ml-auto sm:w-auto md:ml-0">
                    <div class="relative w-56 text-slate-500">
                        <input type="hidden" name="token" id="scannedTextMemo" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 !box !box w-56 pr-10">
                    </div>
                </div>

                <input type="hidden" name="id_pd" id="id_pd">
                {{-- hidden --}}

                <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left bg-white hidden">
                    <button type="submit" id="btn-absen" class="bg-gray-400 transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-full px-4 py-3 align-top xl:mr-3 xl:w-32">Absen</button>
                </div>
            </form>
        </div>

        <div class="h-screen w-screen fixed top-0 left-0">
            <div class="flex absolute bottom-0 left-0">
                <div class="p-3 text-center text-white">
                    <div class="mt-5 text-xl font-medium lg:text-3xl">Absen Wisuda</div>
                    <div class="mt-3 text-lg">Arahkan Kamera Ke QR Code yang disediakan panitia</div>
                    <a href="{{ route('mahasiswa.absen') }}">
                        <x-base.button class="mt-10 border-white px-4 py-3 text-white dark:border-darkmode-400 dark:text-slate-200">
                            Back to Home
                        </x-base.button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Error Page -->
</div>
</div>
@endsection

@once
@push('scripts')
@vite('resources/js/pages/mahasiswa/scan.js')
@endpush
@endonce


<script>
    if (location.protocol != 'https:') {
        document.getElementById('secure-connection-message').style = 'display: block';
    }

</script>
<script type="text/javascript">
    function onQRCodeScanned(scannedText) {
        var scannedTextMemo = document.getElementById("scannedTextMemo");

        if (scannedTextMemo) {
            scannedTextMemo.value = scannedText;
            // kirim hasil scannedText ke ke endpoint /mahasiswa-submit
            setTimeout(() => {
                document.getElementById('autoSubmitForm').submit();
            }, 500);
        }
        var scannedTextMemoHist = document.getElementById("scannedTextMemoHist");
        if (scannedTextMemoHist) {
            scannedTextMemoHist.value = scannedTextMemoHist.value + '\n' + scannedText;
        }
    }

    function provideVideo() {
        var n = navigator;

        if (n.mediaDevices && n.mediaDevices.getUserMedia) {
            return n.mediaDevices.getUserMedia({
                video: {
                    facingMode: "environment"
                }
                , audio: false
            });
        }

        return Promise.reject('Your browser does not support getUserMedia');
    }

    function provideVideoQQ() {
        return navigator.mediaDevices.enumerateDevices()
            .then(function(devices) {
                var exCameras = [];
                devices.forEach(function(device) {
                    if (device.kind === 'videoinput') {
                        exCameras.push(device.deviceId)
                    }
                });

                return Promise.resolve(exCameras);
            }).then(function(ids) {
                if (ids.length === 0) {
                    return Promise.reject('Could not find a webcam');
                }

                return navigator.mediaDevices.getUserMedia({
                    video: {
                        'optional': [{
                            'sourceId': ids.length === 1 ? ids[0] : ids[1] //this way QQ browser opens the rear camera
                        }]
                    }
                });
            });
    }

    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady() {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
        //reduce the size of analyzed image to increase performance on mobile devices
        jbScanner.setSnapImageMaxSize(300);
        var scannerParentElement = document.getElementById("scanner");
        if (scannerParentElement) {
            //append the jbScanner to an existing DOM element
            jbScanner.appendTo(scannerParentElement);
        }

    }

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scannedTextMemo = document.getElementById('scannedTextMemo');
        const autoSubmitForm = document.getElementById('autoSubmitForm');

        scannedTextMemo.addEventListener('input', function() {
            if (scannedTextMemo.value.trim() !== '') { // Trim whitespace and check for non-empty value
                autoSubmitForm.submit();
            }
        });
    });

</script>

<iframe id="jsqrscanner" tabindex="-1" style="position: absolute; width: 0px; height: 0px; border: none; left: -1000px; top: -1000px;"></iframe>
