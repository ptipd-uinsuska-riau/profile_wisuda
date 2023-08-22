// Mendapatkan token dari cookies
const token = Cookies.get("token");
// Membuat konfigurasi untuk header Authorization
const config = {
    headers: {
        Authorization: `${token}`,
    },
};

// Melakukan permintaan GET ke API menggunakan axios
axios.get("http://api1.iraise.uin-suska.ac.id:9008/client/auth/me", config)
    .then((response) => {
        // Data yang diterima dari API
        const userData = response.data;
    })
    .catch((error) => {
        // Tangani kesalahan jika ada
        console.error("Error fetching user data:", error);
    });
