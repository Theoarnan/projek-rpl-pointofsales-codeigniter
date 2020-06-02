<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Generator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barcode</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5>BARCODE</h5>
                            </div>
                            <div class="col-2">
                                <a href="<?= site_url('Barang/printBarcode/'.$barangs->id_barang) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i>&nbsp;
                                    CETAK
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barangs->barcode_barang, $generator::TYPE_CODE_128)) . '" style="width: 200px; height: 200px;">';
                        ?>
                        <br>
                        <?= $barangs->barcode_barang ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                            <div class="col-10">
                                <h5>QR CODE</h5>
                            </div>
                            <div class="col-2">
                                <a href="<?= site_url('Barang/printQrCode/'.$barangs->id_barang) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i>&nbsp;
                                    CETAK
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $qrCode = new Endroid\QrCode\QrCode($barangs->barcode_barang);
                        $qrCode->writeFile('images/qrcode/item-' . $barangs->id_barang . '.png');
                        ?>
                        <img src="<?= base_url('images/qrcode/item-' . $barangs->id_barang . '.png') ?>" style="width: 200px">
                        <br>
                        <?= $barangs->barcode_barang ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>