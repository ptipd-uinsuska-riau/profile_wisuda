// Mendapatkan token dari cookies
const token = Cookies.get("token");
// Membuat konfigurasi untuk header Authorization
const config = {
    headers: {
        Authorization: `${token}`,
    },
};

// Melakukan permintaan GET ke API menggunakan axios
axios.get("https://api1-iraise.ptipd.uin-suska.ac.id/client/auth/me", config)
    .then((response) => {
        // Data yang diterima dari API
        const data = response.data.data;
        // Mengubah nilai elemen-elemen HTML berdasarkan data userData
        document.getElementById("id_pd").value = data.id_pd;

        console.log(data);
    })
    .catch((error) => {
        // Tangani kesalahan jika ada
        console.error("Error fetching user data:", error);
    });
