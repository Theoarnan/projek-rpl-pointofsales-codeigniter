<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA STOCK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Stock</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <a href="<?= site_url(array("Stocks", "StockIn")) ?>" class="btn btn-primary btn-sm"> <i class="fas fa-sign-in-alt"></i>
                                &nbsp;&nbsp; ADD STOCK IN
                            </a>&nbsp;
                            <a href="<?= site_url(array("Stocks", "StockOut")) ?>" class="btn btn-primary btn-sm"> <i class="fas fa-sign-in-alt"></i>
                                &nbsp;&nbsp; ADD STOCK OUT
                            </a>&nbsp;
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="examples" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:0.6%;">No.</th>
                                    <th style="width:0.6%;">Type</th>
                                    <th style="width:4%; text-align:center">Nama Barang</th>
                                    <th style="width:1%; text-align:center">Jumlah</th>
                                    <th style="width:3%; text-align:center">Tanggal</th>
                                    <th style="width:4%; text-align:center">Supplier</th>
                                    <th style="width:6%; text-align:center">Alasan</th>
                                    <th style="width:3%; text-align:center">Tanggung jawab</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($stocks as $stock) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?>.</td>
                                        <td><?= $stock->type ?></td>
                                        <td><?= $stock->nama_barang ?></td>
                                        <td><?= $stock->jumlah ?></td>
                                        <td><?= $stock->tanggal ?></td>
                                        <td><?= $stock->supplier_id == null ? "Tidak Ada" : convertSupplier($stock->supplier_id) ?></td>
                                        <td><?= $stock->detail ?></td>
                                        <td><?= getLevel($stock->level) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<script>
    $(function() {
        var table = $('#examples').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data Stock',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Stock',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Stock',
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