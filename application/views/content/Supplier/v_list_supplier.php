<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $header ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <a href="<?= site_url(array("Supplier", "register")) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>
                            &nbsp;&nbsp;ADD DATA SUPPLIER
                        </a> &nbsp;
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table-upplier" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Keterangan</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($suppliers as $supplier) {
                        ?>
                            <tr id="<?= $supplier->id_supplier ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $supplier->nama_supplier ?></td>
                                <td><?= $supplier->alamat ?></td>
                                <td><?= $supplier->no_telp ?></td>
                                <td><?= $supplier->deskripsi ?></td>
                                <td style="text-align:center;">
                                    <a href="<?= site_url("Supplier/update/$supplier->id_supplier") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" data-id="<?= $supplier->id_supplier ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                        <i class="fas fa-trash"></i></a>
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
<script>
    $(function() {
        let idUser = 0;
        $(".tombolHapus").on("click", function() {
            var id = $(this).data('id');
            SwalDelete(id);
            console.log(id);
            // e.preventDefault();
        });

        var table = $('#table-upplier').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data Supplier',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Supplier',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data Supplier',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
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
            closeIcon: true,
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
                        var url = "Supplier/proses_hapus/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                $.alert({
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
                                                window.location.replace("<?= site_url("Supplier") ?>");
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
                                                // window.location.replace("<?= site_url("Barang") ?>");
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