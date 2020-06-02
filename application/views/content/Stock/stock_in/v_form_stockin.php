<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Stock In</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Stock In</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("Stocks", "riwayatStock")) ?>" class="btn btn-primary btn-sm"> <i class="nav-icon far fa-file-alt"></i>
                                    &nbsp;&nbsp;RIWAYAT STOCK
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <h5>
                                    ADD STOCK IN
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <form action="<?= site_url('stocks/proses') ?>" method="post" role="form">
                                    <input type="hidden" name="id_stock" value="<?= $stocks->id_stock; ?>" />
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal" name="tanggal" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id_barang" />
                                        <label for="">Pilih Barang</label>
                                        <select name="barang" class="form-control" id="select-barang" style="width: 100%;">
                                            <option value="" disabled selected>Pilih Barang</option>
                                            <?php
                                            foreach ($barangs as $b) {
                                                echo "<option data-nama='$b->nama_barang' "
                                                    . " data-stock='$b->stock_barang' "
                                                    . " data-kode='$b->barcode_barang' "
                                                    . " data-kategori='$b->nama_kategori' "
                                                    . " data-kemasan='$b->kemasan_barang' "
                                                    . " value='$b->id_barang' "
                                                    . " $b->id_barang == $stocks->barang_id ? 'selected' : null> "
                                                    . "$b->barcode_barang / $b->nama_barang / $b->harga_barang"
                                                    . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Supplier</label>
                                        <select id="select-supplier" name="supplier" class="form-control">
                                            <option value="" disabled selected>Pilih Supplier</option>
                                            <?php
                                            foreach ($suppliers as $s) {
                                                echo "<option data-nama='$s->nama_supplier' "
                                                    . " data-nomer='$s->no_telp' "
                                                    . " data-alamat='$s->alamat' "
                                                    . " value='$s->id_supplier' "
                                                    . " $s->id_supplier == $stocks->supplier_id ? 'selected' : null> "
                                                    . "$s->nama_supplier"
                                                    . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah In</label>
                                        <input type="text" class="form-control" id="jumlah-barang" name="jumlah" placeholder="1">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="2" id="detail-barang" name="detail" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button id="btn-save" name="In" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;STOCK IN&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                                <input type="hidden" id="stck" name="stocks" value="<?= $b->stock_barang; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <h5>DETAIL</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-offset-12">
                                <form id="register-stock" action="<?= site_url('stocks/proses') ?>" method="post" role="form">
                                    <input type="hidden" id="id" name="id_stock" value="<?= $stocks->id_stock; ?>" />
                                    <label>DETAIL BARANG</label><br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Barcode</label>
                                                <input type="text" value="-" class="form-control" id="barcode-barang" name="barcode_barang" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input type="text" value="-" class="form-control" id="nama-barang" name="nama_barang" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <input type="text" value="-" class="form-control" id="kategori-barang" name="kategori_barang" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kemasan</label>
                                                <input type="text" value="-" class="form-control" id="kemasan-barang" name="kemasan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Stok Awal</label>
                                                <input type="text" value="-" class="form-control" id="stock-barang" name="stock_awal" readonly>
                                            </div>
                                        </div>
                                    </div><br>
                                    <label>DETAIL SUPPLIER</label><br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Supplier</label>
                                                <input type="text" value="-" class="form-control" id="nama-supplier" name="nama_supplier" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No Telp</label>
                                                <input type="text" value="-" class="form-control" id="no-telp" name="no" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" value="-" class="form-control" id="almt" name="alamat" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#select-barang").select2({
            theme: 'bootstrap4'
        }).on("change", function() {
            var optionSelected = $(this).children("option:selected");
            $("#barcode-barang").val(optionSelected.data("kode"));
            $("#kategori-barang").val(optionSelected.data("kategori"));
            $("#kemasan-barang").val(optionSelected.data("kemasan"));
            $("#nama-barang").val(optionSelected.data("nama"));
            $("#stock-barang").val(optionSelected.data("stock"));
            $("#jumlah-barang").val(1);
        });

        $("#select-supplier")
            .select2({
                theme: 'bootstrap4'
            })
            .on("change", function() {
                var optionSelected = $(this).children("option:selected");
                $("#nama-supplier").val(optionSelected.data("nama"));
                $("#no-telp").val(optionSelected.data("nomer"));
                $("#almt").val(optionSelected.data("alamat"));
            });
    });
</script>