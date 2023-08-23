@extends('../../layouts/' . $layout)

@section('head')
<title>Scan | Wisuda </title>
<script type="text/javascript" src="/js/jsqrscanner.nocache.js"></script>
@endsection

@section('content')
<div class="py-2">
    <div class="container">
        {{-- tampilkan withSuccess jika selesai absen --}}
        @if (session()->has('withError'))
        <div class="flex items-center mb-6 box dark:border-darkmode-600 text-red-500">
            {{ session()->get('withError') }}
        </div>
        @endif



        <!-- BEGIN: Error Page -->
        <div class="error-page flex h-screen flex-col items-center justify-center text-center lg:flex-row lg:text-left">
            <div class="bg-white rounded-md py-4 px-4 mr-10">
                <noscript>
                    <div class="row-element-set error_message">
                        Browser web Anda harus mengaktifkan JavaScript agar aplikasi ini ditampilkan dengan benar.
                    </div>
                </noscript>
                <div class="row-element-set error_message" id="secure-connection-message" style="display: none;" hidden="">
                    Anda mungkin perlu menayangkan halaman ini melalui koneksi aman (https) untuk menjalankan Scanner dengan benar.
                </div>

                <div class="container max-h-max" id="scanner">
                    <video class="qrPreviewVideo" autoplay="" tabindex="0" src="" playsinline="true"></video>
                </div>

                {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti eum nobis est sequi inventore omnis ex laudantium accusantium eius consectetur? Ipsum consectetur vero accusantium voluptatum fuga officiis magni laboriosam esse!</p> --}}
            </div>

            <div class="form-field form-field-memo">
                <div class="form-field-caption-panel">
                    <div class="gwt-Label form-field-caption">
                        Scanned text
                    </div>
                </div>
                {{-- <form action=""></form> --}}
                <form action="{{ route('mahasiswa.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" id="scannedTextMemo">
                    <input type="hidden" name="id_pd" id="id_pd" value="11910123197">
                </form>


            </div>
            {{-- <div class="form-field form-field-memo">
                <div class="form-field-caption-panel">
                    <div class="gwt-Label form-field-caption">
                        Scanned text history
                    </div>
                </div>
                <div class="FlexPanel form-field-input-panel">
                    <textarea id="scannedTextMemoHist" class="textInput form-memo form-field-input textInput-readonly" value="" rows="6" readonly="">  </textarea>
                </div>
            </div> --}}


            <div class="mt-10 text-white lg:mt-0">
                <div class="intro-x mt-5 text-xl font-medium lg:text-3xl">
                   Absen Wisuda
                </div>
                <div class="intro-x mt-3 text-lg">
                    Arahkan Kamera Ke QR Code yang disediakan panitia
                </div>
                <a href="{{ route('mahasiswa.absen') }}">
                    <x-base.button class="intro-x mt-10 border-white px-4 py-3 text-white dark:border-darkmode-400 dark:text-slate-200">
                        Back to Home
                    </x-base.button>
                </a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
</div>
@endsection
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
    $(document).ready(function() {
        // Ambil referensi input token
        var tokenInput = $('#scannedTextMemo');

        // Fungsi untuk mengirimkan formulir menggunakan Ajax
        function submitForm() {
            $.ajax({
                url: "{{ route('mahasiswa.submit') }}"
                , type: "POST"
                , data: {
                    '_token': $('input[name=_token]').val()
                    , 'token': tokenInput.val()
                    , 'id_pd': $('#id_pd').val()
                }
                , success: function(response) {
                    // Tanggapan sukses dari server, Anda dapat menambahkan logika sesuai kebutuhan
                    console.log("Formulir berhasil dikirim!");
                }
                , error: function(xhr) {
                    // Tanggapan error dari server, Anda dapat menambahkan logika penanganan error
                    console.error("Terjadi kesalahan saat mengirim formulir.");
                }
            });
        }

        // Tambahkan event listener untuk perubahan pada input token
        tokenInput.on('change', function() {
            // Cek apakah nilai input tidak kosong
            if (tokenInput.val() !== '') {
                // Jika tidak kosong, kirimkan formulir secara otomatis
                submitForm();
            }
        });
    });

</script>



<iframe id="jsqrscanner" tabindex="-1" style="position: absolute; width: 0px; height: 0px; border: none; left: -1000px; top: -1000px;"></iframe>

