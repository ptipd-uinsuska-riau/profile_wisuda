(function () {
    ("use strict");

    const baseURL = "https://api1.iraise.uin-suska.ac.id:8009/client/auth/";
    // const baseURL = API_URL_CLIENT;

    async function login() {
        // Reset state
        $("#login-form").find(".login__input").removeClass("border-danger");
        $("#login-form").find(".login__input-error").html("");

        // Post form
        let email = $("#email").val();
        let password = $("#password").val();

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
                    // Jika login berhasil, simpan data pada cookies
                    Cookies.set("token", res.data.data.jwt.token);
                    Cookies.set("id_pd", res.data.data.data.id_pd);
                    Cookies.set("nm_pd", res.data.data.data.nm_pd);

                    window.location = "/mahasiswa-absen";
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
