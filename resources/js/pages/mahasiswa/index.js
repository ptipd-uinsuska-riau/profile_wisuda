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
        document.getElementById("nm_pd").textContent = data.nm_pd;
        document.getElementById("id_pd").textContent = data.id_pd;
        document.getElementById("sms").textContent = data.id_sms;
        document.getElementById("email").textContent = data.email;
        document.getElementById("no_hp").textContent = data.no_hp;

        // Menambahkan nilai id_pd ke tautan tombol
        const scanButton = document.getElementById("scanButton");
        scanButton.href = `mahasiswa-scan`;

        console.log(data);
    })
    .catch((error) => {
        // Tangani kesalahan jika ada
        console.error("Error fetching user data:", error);
    });
