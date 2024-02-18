@extends('../layouts/' . $layout)

@section('head')
<title>Login - Absensi Wisuda</title>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
@endsection

@section('content')
<div @class([ '-m-3 sm:-mx-8 p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600' , 'before:hidden before:xl:block before:content-[\' \'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400', 'after:hidden after:xl:block after:content-[\' \'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700', ])>
    <div class="container relative z-10 sm:px-10">
        <div class="block grid-cols-2 gap-4 xl:grid">
            <!-- BEGIN: Login Info -->
            <div class="hidden min-h-screen flex-col xl:flex">
                <a class="-intro-x flex items-center pt-5" href="">
                    <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Midone Tailwind HTML Admin Template" />
                    <span class="ml-3 text-lg text-white"> Absensi Wisuda </span>
                </a>
                <div class="my-auto">
                    <img class="-intro-x -mt-16 w-1/2" src="{{ Vite::asset('resources/images/illustration.svg') }}" alt="Midone Tailwind HTML Admin Template" />
                    <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                        A few more clicks to <br />
                        sign in to your account.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                        Absensi Wisuda secara online.
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->

            <!-- BEGIN: Login Form -->
            <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                <div class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                    <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                        Absensi Wisuda
                    </h2>
                    {{-- jika ada session dari controller tampilkan --}}

                    <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                        Silahkan login menggunakan akun iRaise untuk melanjutkan absensi
                    </div>
                    <form method="POST" action="/postlogin">
                        @csrf

                        <div class="intro-x mt-8">


                            <x-base.form-input class="intro-x login__input block min-w-full px-4 py-3 xl:min-w-[350px]" name="nim" id="nim" type="number" placeholder="NIM" />
                            <div class="login__input-error mt-2 text-danger" id="error-email"></div>
                            <x-base.form-input class="intro-x login__input mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]" name="password" id="password" type="password" placeholder="Password" />
                            @if(session()->has('session'))
                            <div class="mt-5 w-max bg-primary-500 text-black">
                                {{ session('session') }}
                            </div>
                            @endif

                        </div>
                        <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                            <button class="bg-primary w-full px-4 py-3 align-top xl:mr-3 xl:w-32 text-white" type="submit" id="submit">

                                Login
                            </button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</div>
@endsection

@once
@push('scripts')
{{-- @vite('resources/js/pages/login/index.js') --}}
<script>
    function callAPI(nim) {
        // Tempatkan panggilan API Anda di sini
        let nama = document.getElementById("nama");
        let sms = document.getElementById("sms")
        let error = document.getElementById("notfound")
        let submit = document.getElementById("submit")


        nama.innerHTML = sms.innerHTML = error.innerHTML = ""


        document.getElementById('loading').classList.remove('hidden')


        axios.get(`api`)
            .then(function(response) {
                document.getElementById('loading').classList.add('hidden')
                console.log(response.data);
                // if (response.data.status) {
                //     const result = response.data.data
                //     console.log(result)
                //     nama.innerHTML = result.nama
                //     sms.innerHTML = '(' + result.program_studi + ')'
                //     submit.disabled = false

                // } else {
                //     error.innerHTML = result = response.data.message
                //     submit.disabled = true

                // }
            }).catch(function(error) {
                console.log(error);
            });
    }
    // * * * * * cd /home/tracer.uin-suska.ac.id/public_html/tracer && sh deploy.sh

</script>

@endpush
@endonce
