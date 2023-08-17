(function () {
    "use strict";

    // const imageAssets = import.meta.glob(
    //     "/resources/images/fakers/*.{jpg,jpeg,png,svg}",
    //     { eager: true }
    // );

    // Tabulator
    if ($("#tabulator").length) {
        // Setup Tabulator
        const tabulator = new Tabulator("#tabulator", {
            ajaxURL: "profile/data",
            // ajaxURL: "https://dummy-data.left4code.com",
            paginationMode: "remote",
            filterMode: "remote",
            sortMode: "remote",
            printAsHtml: true,
            printStyled: true,
            pagination: true,
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "No matching records found",
            columns: [
                {
                    title: "",
                    formatter: "responsiveCollapse",
                    width: 40,
                    minWidth: 30,
                    hozAlign: "center",
                    resizable: false,
                    headerSort: false,
                },

                // For HTML table
                {
                    title: "No",
                    minWidth: 100,
                    responsive: 0,
                    field: "id",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div class="font-medium whitespace-nowrap">${response.id}</div>`;
                    },
                },
                {
                    title: "Mahasiswa",
                    minWidth: 200,
                    responsive: 0,
                    field: "nama",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div>
                        <div class="font-medium whitespace-nowrap">${response.nama}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">${response.nim}</div>
                    </div>`;
                    },
                },
                {
                    title: "Foto",
                    minWidth: 50,
                    responsive: 0,
                    field: "nama",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div class="w-10 h-10 intro-x image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" src="${response.foto}">
                            </div>`;
                    },
                },
                {
                    title: "Fakultas/Prodi",
                    minWidth: 200,
                    responsive: 0,
                    field: "nama",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div>
                        <div class="font-medium whitespace-nowrap">${response.fakultas}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">${response.prodi}</div>
                    </div>`;
                    },
                },
                {
                    title: "IPK",
                    minWidth: 100,
                    responsive: 0,
                    field: "ipk",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div>
                        <div class="font-medium whitespace-nowrap">${response.ipk}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Semester ${response.smt}</div>
                        </div>`;
                    },
                },
                {
                    title: "Fakultas/Prodi",
                    minWidth: 200,
                    responsive: 0,
                    field: "nama",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell) {
                        const response = cell.getData();
                        return `<div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Lulus ${response.tgl_lulus}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Lulus ${response.tgl_skl}</div>
                        <div class="text-xs text-slate-500 whitespace-nowrap">Validasi ${response.tgl_validasi}</div>
                    </div>`;
                    },
                },
                // {
                //     title: "STATUS",
                //     minWidth: 200,
                //     field: "status",
                //     hozAlign: "center",
                //     headerHozAlign: "center",
                //     vertAlign: "middle",
                //     print: false,
                //     download: false,
                //     formatter(cell) {
                //         const response = cell.getData();
                //         return `<div class="flex items-center lg:justify-center ${
                //             response.status ? "text-success" : "text-danger"
                //         }">
                //         <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> ${
                //             response.status ? "Active" : "Inactive"
                //         }
                //     </div>`;
                //     },
                // },
                {
                    title: "ACTIONS",
                    minWidth: 200,
                    field: "actions",
                    responsive: 1,
                    hozAlign: "center",
                    headerHozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter() {
                        let a =
                            $(`<div class="flex items-center lg:justify-center">
                        <a class="flex items-center mr-3 edit" href="javascript:;">
                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Status
                        </a>
                        </div>`);
                        $(a)
                            .find(".edit")
                            .on("click", function () {
                                alert("EDIT");
                            });
                        return a[0];
                    },
                },

                // For print format
            ],
        });

        tabulator.on("renderComplete", () => {
            createIcons({
                icons,
                attrs: {
                    "stroke-width": 1.5,
                },
                nameAttr: "data-lucide",
            });
        });

        // Redraw table onresize
        window.addEventListener("resize", () => {
            tabulator.redraw();
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });
        });


        function formatDate(dateTimeString) {
            const options = {
                day: "numeric",
                month: "long", // Menggunakan "long" untuk menampilkan nama bulan penuh
                year: "numeric",
            };
            const formattedDate = new Date(dateTimeString).toLocaleString(
                "id-ID",
                options
            );

            // Menambahkan tanda koma setelah nama bulan
            const parts = formattedDate.split(" ");
            if (parts.length >= 2) {
                parts[1] += ",";
            }

            return parts.join(" ");
        }
    }
})();
