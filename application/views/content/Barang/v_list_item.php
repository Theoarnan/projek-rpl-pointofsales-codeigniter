<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <a href="<?= site_url(array("Barang", "register")) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>
                                &nbsp;&nbsp;ADD DATA BARANG
                            </a> &nbsp;
                        </div>
                        <div class="col-4">
                            <a href="<?= site_url(array("Barang", "printDataBarang")) ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-print"></i>
                                &nbsp;&nbsp;PRINT ALL BARCODE
                            </a> &nbsp;
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table-barang" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:3%;">No</th>
                                <th style="width:8%;">Barcode</th>
                                <th style="width:16%;">Nama Barang</th>
                                <th style="width:10%;">Kategori</th>
                                <th style="width:10%;">Harga</th>
                                <th style="width:10%;">Kemasan</th>
                                <th style="width:7%; text-align:center">Stock</th>
                                <th style="width:10%; text-align:center">Gambar</th>
                                <th style="width:12%; text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barangs as $barang) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $barang->barcode_barang ?></td>
                                    <td><?= $barang->nama_barang ?></td>
                                    <td><?= $barang->nama_kategori ?></td>
                                    <td><?= formatRupiah($barang->harga_barang) ?></td>
                                    <td><?= $barang->kemasan_barang ?></td>
                                    <td style="text-align:center;"><?= $barang->stock_barang == null ? "0" : $barang->stock_barang ?></td>
                                    <td style="text-align:center;">
                                        <img class="img-circle img-bordered" width="80" height="80" src='<?= base_url('images/barang/' . $barang->gambar_barang) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "images/no_image.png" ?>';" alt="<?= $barang->gambar_barang ?>">
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="<?= site_url("Barang/update/$barang->id_barang") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="<?= $barang->id_barang ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                            <i class="fas fa-trash"></i></a>
                                        <a href="<?= site_url("Barang/detail/$barang->id_barang") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-eye"></i></a>
                                        <a href="<?= site_url("Barang/createBarcode/$barang->id_barang") ?>" class="btn btn-sm btn-success" data-title="Edit"><i class="fas fa-barcode"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(function() {
        let idUser = 0;
        $(".tombolHapus").on("click", function() {
            var id = $(this).data('id');
            SwalDelete(id);
            // e.preventDefault();
        });
        // $('#table-barang').DataTables()
        var table = $('#table-barang').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ],
            // buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
            dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false
            }]
        });

        table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
    });


    function SwalDelete(id) {
        $.confirm({
            theme: 'modern',
            icon: 'fa fa-warning',
            title: 'Hapus Data!',
            content: 'Apakah anda yakin hapus data ini ? <br>',
            // closeIcon: true,
            boxWidth: '500px',
            useBootstrap: false,
            closeIconClass: 'fa fa-close',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'HAPUS',
                    btnClass: 'btn-red',
                    action: function() {
                        var url = "Barang/proses_delete/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                $.confirm({
                                    theme: 'modern',
                                    icon: 'fa fa-success',
                                    title: 'Data Terhapus!',
                                    content: false,
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {
                                                window.location.replace("<?= site_url("Barang") ?>");
                                            }
                                        },
                                    }
                                });
                            })
                            .fail(function() {
                                $.alert({
                                    theme: 'modern',
                                    icon: 'fa fa-danger',
                                    title: 'Data Tidak bisa dihapus!',
                                    content: 'Data tersebut telah berelasi dengan tabel lain',
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'red',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {
                                            }
                                        },
                                    }
                                })
                            });
                    }
                },
                close: function() {}
            }
        });
    }
</script>