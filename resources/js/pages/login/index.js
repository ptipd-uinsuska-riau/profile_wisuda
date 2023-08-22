(function () {
    ("use strict");

    // const baseURL = "http://127.0.0.1:9008/client/auth/";
    // panggil API_URL_CLIENT dari .env untuk baseURL
    const baseURL = "http://api1.iraise.uin-suska.ac.id:9008/client/auth/";
    // const baseURL = API_URL_CLIENT;

    async function login() {
        // Reset state
        $("#login-form").find(".login__input").removeClass("border-danger");
        $("#login-form").find(".login__input-error").html("");

        // Post form
        let email = $("#email").val();
        let password = $("#password").val();

        console.log(email);
        console.log(password);

        // Loading state
        $("#btn-login").html(
            '<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>'
        );
        tailwind.svgLoader();
        await helper.delay(1500);

        axios
            .post(`${baseURL}login`, {
                username: email,
                password: password,
            })
            .then((res) => {
                if (res.data.status === 1) {
                    // Jika login berhasil, panggil endpoint "/generate" untuk mengatur session
                    fetch(`generate`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        // Kirimkan data pengguna ke endpoint "/generate"
                        // body: JSON.stringify(res.data.data.data),
                        body: JSON.stringify(res.data.data),
                    })
                        .then((response) => response.json())
                        .then((sessionData) => {
                            // Session telah di-generate di server, Anda dapat menindaklanjuti respons jika perlu
                            // console.log(sessionData);
                            // Redirect ke halaman "/beranda" atau tindakan lain yang sesuai
                            window.location = "/mahasiswa-absen";
                        });
                } else {
                    // Jika login gagal, tampilkan pesan kesalahan dari server
                    $("#btn-login").html("Login");
                    $("#password").addClass("border-danger");
                    $("#error-password").html(res.data.error_msg);
                }
            })
            .catch((err) => {
                $("#btn-login").html("Login");
                if (
                    err.response &&
                    err.response.data &&
                    err.response.data.message
                ) {
                    if (
                        err.response.data.message !==
                        "Wrong username or password."
                    ) {
                        for (const [key, val] of Object.entries(
                            err.response.data.errors
                        )) {
                            $(`#${key}`).addClass("border-danger");
                            $(`#error-${key}`).html(val);
                        }
                    } else {
                        $(`#password`).addClass("border-danger");
                        $(`#error-password`).html(err.response.data.message);
                    }
                } else {
                    // Penanganan kesalahan lain yang mungkin terjadi
                    console.error(err);

                    //kirim pop up error ke view
                    Toastify({
                        node: $("#basic-non-sticky-notification-content")
                            .clone()
                            .removeClass("hidden")[0],
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "white",
                        stopOnFocus: true,
                    }).showToast();
                }
            });
    }

    $("#login-form").on("keyup", function (e) {
        if (e.keyCode === 13) {
            login();
        }
    });

    $("#btn-login").on("click", function () {
        login();
    });
})();
