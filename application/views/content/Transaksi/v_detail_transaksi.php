<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info-circle"></i> <?= $transaksis->no_transaksi ?></h5>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> POS APPLICATION.
                                    <small class="float-right">TUNAI/CASH</small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <br>
                                <!-- <address>
                                    <strong>KASIR</strong><br>
                                    <?= $transaksis->user_id ?><br>
                                    Email: info@almasaeedstudio.com
                                </address> -->
                            </div>
                            <div class="col-sm-6 invoice-col">
                                <br>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($items as $t) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?>.</td>
                                                <td><?= $t->barcode_barang ?></td>
                                                <td><?= $t->nama_barang ?></td>
                                                <td><?= formatRupiah($t->harga_item_transaksi) ?></td>
                                                <td><?= $t->qty_item_transaksi ?></td>
                                                <td><?= formatRupiah($t->total_item_transaksi) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Discount:</th>
                                            <td><?= formatRupiah($transaksis->potongan) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Grand Total:</th>
                                            <td><?= formatRupiah($transaksis->total_utama) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Bayar:</th>
                                            <td><?= formatRupiah($transaksis->bayar) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kembali:</th>
                                            <td><?= formatRupiah($transaksis->kembali) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12" style="text-align: center">
                                <a href="<?= site_url(array("Transaksi")) ?>" class="btn btn-default" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i>&nbsp;
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>