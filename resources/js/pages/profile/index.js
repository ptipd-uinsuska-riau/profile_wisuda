(function () {
    ("use strict");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Menggunakan Axios untuk mengambil data dari endpoint profile/data
    axios
        .get("/profile/data")
        .then(function (response) {
            // Manipulasi data yang diterima sesuai kebutuhan
            var data = response.data;
            var tableBody = document.getElementById("data-table-body");

            data.forEach(function (item, index) {
                var row = document.createElement("tr");
                row.classList.add(
                    "[&amp;:nth-of-type(odd)_td]:bg-slate-100",
                    "[&amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300",
                    "[&amp;:nth-of-type(odd)_td]:dark:bg-opacity-50"
                );
                row.setAttribute(
                    "class",
                    "[&amp;amp;:nth-of-type(odd)_td]:bg-slate-100 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300 [&amp;amp;:nth-of-type(odd)_td]:dark:bg-opacity-50"
                ); // Tambahkan kelas CSS di sini

                var columns = [
                    index + 1, // No
                    '<div class="font-medium whitespace-nowrap">' +
                        item.nama +
                        '</div><div class="text-xs text-slate-500 whitespace-nowrap">' +
                        item.nim +
                        "</div>", // Nama
                    '<div class="font-medium whitespace-nowrap">' +
                        item.fakultas +
                        '</div><div class="text-xs text-slate-500 whitespace-nowrap">' +
                        item.prodi +
                        "</div>", // Program Studi
                    '<div class="font-medium whitespace-nowrap">' +
                        item.ipk +
                        '</div><div class="text-xs text-slate-500 whitespace-nowrap"> Semester ' +
                        item.smt +
                        "</div>", // Program Studi
                    '<div class="text-xs text-slate-500 whitespace-nowrap">Lulus ' +
                        item.tgl_lulus +
                        '</div> <div class="text-xs text-slate-500 whitespace-nowrap">Lulus ' +
                        item.tgl_lulus +
                        '</div></div> <div class="text-xs text-slate-500 whitespace-nowrap">Lulus ' +
                        item.tgl_lulus +
                        "</div>", // Tanggal Lulus
                        '<div class="mt-2"><div data-tw-merge class="flex items-center"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type=&#039;radio&#039;]]:checked:bg-primary [&amp;[type=&#039;radio&#039;]]:checked:border-primary [&amp;[type=&#039;radio&#039;]]:checked:border-opacity-10 [&amp;[type=&#039;checkbox&#039;]]:checked:bg-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" data-tw-merge="data-tw-merge" id="checkbox-switch-7" /></div></div>',
                ];

                columns.forEach(function (columnText) {
                    var cell = document.createElement("td");
                    cell.classList.add(
                        "px-5",
                        "py-3",
                        "border-b",
                        "dark:border-darkmode-300"
                    ); // Tambahkan kelas CSS di sini
                    cell.innerHTML = columnText;
                    row.appendChild(cell);
                });

                tableBody.appendChild(row);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
})();
