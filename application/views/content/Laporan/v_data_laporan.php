<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark jd">Laporan Penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Penjualan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <?= form_open(); ?>
                                    <div class="form-group">
                                        <label>Date Range :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode Tanggal">
                                            <!-- <span class="ts"></span> -->
                                        </div>
                                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>.</label>
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <span class="icon">
                                                            <i class="fa fa-save"></i>
                                                        </span>
                                                        <span class="text">
                                                            Submit
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="hd" class="card ">
                        <div id="tcard" class="card-header tcard">
                            <div class="row">
                                <div class="col-sm-2 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-primary"><i class="fas fa-chart-line"></i></span>
                                        <h5 class="description-header"><?= $transaksi ?></h5>
                                        <span class="description-text">TOTAL TRANSAKSI</span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger"><i class="fas fa-caret-square-up"></i></span>
                                        <h5 class="description-header"><?= $barangjual != null ? $barangjual : '0' ?></h5>
                                        <span class="description-text">BARANG TERJUAL</span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-hand-holding-usd"></i></span>
                                        <h5 class="description-header"><?= formatRupiah($pendapatan) ?></h5>
                                        <span class="description-text">PENDAPATAN</span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-warning"><i class="fab fa-dropbox"></i></span>
                                        <h5 class="description-header"><?= $stockSisa ?></h5>
                                        <span class="description-text">STOCK TERSISA</span>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger"><i class="fas fa-arrow-up text-sm"></i></span>
                                        <h5 class="description-header"><?= $stockin ?></h5>
                                        <span class="description-text">STOCK IN</span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-arrow-down text-sm"></i></span>
                                        <h5 class="description-header"><?= $stockout ?></h5>
                                        <span class="description-text">STOCK OUT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body cr">
                            <table id="table-laporan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:1px;">No.</th>
                                        <th>No. Transaksi</th>
                                        <th>Nama Kasir</th>
                                        <th style="width:10%;">Tanggal</th>
                                        <th>Total</th>
                                        <th>Potongan</th>
                                        <th style="text-align: center;">Total Item</th>
                                        <!-- <th style="text-align:center">Action</th> -->
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
                                            <td style="text-align: center;"><?= convertidTransaksitoJumlahItem($t->id_transaksi) ?></td>
                                            <!-- <td style="text-align:center">
                                                <a href="<?= site_url("Transaksi/detail/$t->id_transaksi") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-search"></i></a>
                                            </td> -->
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {

        window.setInterval("#tcard", 1000);

        $('#tanggal').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        })

        var table = $('#table-laporan').DataTable({
            "responsive": true,
            "autoWidth": false,
            buttons: [{
                extend: 'print',
                title: '',
                customize: function(win) {
                    var as = $(win.document.body).prepend($("#tcard")); //before the table
                    var s = $(win.document.body).css('text-align', 'center').prepend($("<h6><?= $mulai ?> - <?= $akhir ?></h6>"));
                    $(win.document.body).css('text-align', 'center').prepend($("<h1>Laporan Penjualan</h1>"));
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="<?= base_url() ?>assets/dist/img/logoPos.png" style="position:center; top:0; left:0;" />'
                        );
                },
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 6]
                }
            }, ],
            dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false
            }],

        });

        table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');

        // var start = moment().subtract(29, 'days');
        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#tanggal span').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }

        $('#tanggal').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            }
        }, cb);

        cb(start, end);


    })
</script>