// Buku Terlaris
$(document).ready(function () {
    var table = $('#table').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});
//data cabang
$(document).ready(function () {
    var table = $('#data-cabang').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});
// Buku Masuk
$(document).ready(function () {
    var table = $('#buku-masuk').DataTable({
        responsive: true,
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

// Buku Terlaris
$(document).ready(function () {
    var table = $('#table-terlaris').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<col-md-12'>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});


//Tabel Rencana Pengadaan
$(document).ready(function () {
    var table = $('#table-inventaris-pengadaan').DataTable({
        lengthChange: false,
        // responsive:true,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },
        {
            text: 'Lihat Katalog <i class="fa  fa-list-alt"></i> ',
            action: function (e, dt, node, config) {
                window.location = 'catalogs'
            }
        }
        ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});


// Tambah Pengguna
$(document).ready(function () {
    var table = $('#table-tambah-pengguna').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download"></i> Export',
            titleAttr: 'CSV'
        },
        {
            text: '<i class="fa  fa-plus"></i> Pengguna',
            action: function (e, dt, node, config) {
                onclick(window.location.href = 'users/create')
            }
        }
        ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});


// Tambah inventaris
$(document).ready(function () {
    var table = $('#table-inventaris-book').DataTable({
        responsive: true,
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons:
            [
                {
                    extend: 'csvHtml5',
                    text: '<i class="fa  fa-cloud-download"></i> Export',
                    titleAttr: 'CSV'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa  fa-cloud-download"></i> Export',
                    titleAttr: 'PDF'
                }

            ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

//  inventaris buku k-13
$(document).ready(function () {
    var table = $('#table-inventaris-bookk13').DataTable({
        responsive: true,
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download"></i> Export',
            titleAttr: 'CSV'
        }

        ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

// Tambah Buku terlaris
$(document).ready(function () {
    var table = $('#table-buku-terlaris').DataTable({
        responsive: true,
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download"></i> Export',
            titleAttr: 'CSV'
        }

        ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

$(document).ready(function () {
    var table = $('#table-berita').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download"> Export</i>',
            titleAttr: 'CSV'
        },
        {
            text: '<i class="fa  fa-plus"> Artikel</i> ',
            action: function (e, dt, node, config) {
                onclick(window.location.href = 'articles/create')
            }
        }
        ],

        language: {
            searchPlaceholder: "Search",
            search: "",

        },
    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

// Pengaturan Buku Paket
$(document).ready(function () {
    var table = $('#pengaturan-buku').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-3'i><'col-md-6'><'col-md-3'p>>",
        buttons: [{
            text: '<i class="fa  fa-plus"></i> Bagikan Paket Buku',
            action: function (e, dt, node, config) {
                onclick(window.location.href = 'packet/blast')
            }
        }],


        language: {
            searchPlaceholder: "Search",
            search: "",

        },

    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});
// Pengaturan Buku Paket Detail
$(document).ready(function () {
    var table = $('#pengaturan-buku-detail').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-sm-3'i><'col-sm-3'><'col-sm-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],


        language: {
            searchPlaceholder: "Search",
            search: "",

        },


    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

$(document).ready(function () {
    var table = $('#blast-table-siswa-kelas').DataTable({
        lengthChange: false,
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-sm-3'i><'col-sm-3'><'col-sm-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],


        language: {
            searchPlaceholder: "Search",
            search: "",

        },


    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

// Pengaturan Buku Paket Bagikan
$(document).ready(function () {
    $('#pengaturan-buku-bagikan').DataTable({
        dom:
            // 'Bfrtip',
            "<'row'<'col-md-3'f><'col-md-6'><'col-md-3'B>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-sm-3'i><'col-sm-3'><'col-sm-3'p>>",
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="fa  fa-cloud-download">  Export</i>',
            titleAttr: 'CSV'
        },],
        language: {
            searchPlaceholder: 'Search',
            search: "",

        },
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        order: [
            [1, 'asc']
        ]
    });
});