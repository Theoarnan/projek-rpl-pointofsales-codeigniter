<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <a href="<?= site_url(array("Transaksi")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table-transaksi" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:1px;">No.</th>
                            <th>No. Transaksi</th>
                            <th>Nama Kasir</th>
                            <th style="width:10%;">Tanggal</th>
                            <th>Total</th>
                            <th>Potongan</th>
                            <th>Bayar</th>
                            <th>Kembali</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($transaksis as $t) {
                        ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $t->no_transaksi ?></td>
                                <td><?= getLevel($t->level) ?></td>
                                <td><?= $t->tanggal_transaksi ?></td>
                                <td><?= formatRupiah($t->total_utama) ?></td>
                                <td><?= formatRupiah($t->potongan) ?></td>
                                <td><?= formatRupiah($t->bayar) ?></td>
                                <td><?= formatRupiah($t->kembali) ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("Transaksi/detail/$t->id_transaksi") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-search"></i></a>
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
        var table = $('#table-transaksi').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data Transaksi',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Transaksi',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data Transaksi',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
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
</script>