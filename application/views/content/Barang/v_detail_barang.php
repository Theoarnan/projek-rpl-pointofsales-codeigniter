<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $header ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                        <div class="col-12">
                            <img class="product-image" style="width: 630px; height: 630px;" src='<?= base_url('images/barang/' . $barang->gambar_barang) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "images/no_image.png" ?>';" alt="<?= $barang->gambar_barang ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $barang->nama_barang ?></h3>
                        <p><?= $barang->detail_barang ?></p>
                        <hr>
                        <div class="row" style="text-align: center;">
                            <div class="col-12 col-sm-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center active">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                                        <?= $barang->nama_kategori ?>
                                        <br>
                                        <i class="fas fa-box"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl"><?= $barang->kemasan_barang ?></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl"><?= $barang->stock_barang == null ? "0" : $barang->stock_barang ?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="bg-success py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    <?= formatRupiah($barang->harga_barang) ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb">
                                <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barang->barcode_barang, $generator::TYPE_CODE_128)) . '">';
                                ?>
                            </div>
                            <div class="product-image-thumb"><img src="<?= base_url('images/qrcode/item-' . $barang->id_barang . '.png') ?>"></div>
                            <div class="product-image-thumb"><img src='<?= base_url('images/barang/' . $barang->gambar_barang) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "images/no_image.png" ?>';" alt="<?= $barang->gambar_barang ?>"></div>
                        </div>
                        <hr>
                        <div class="col-12 text-center">
                        <a href="<?= site_url(array("Barang")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                            KEMBALI
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>