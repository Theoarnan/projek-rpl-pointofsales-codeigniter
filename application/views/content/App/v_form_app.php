<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" text-align="center">Aplikasi Transaksi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= site_url(array("Transaksi", "tunda")) ?>" class="btn btn-info btn-flat btn-sm"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;
                                    DAFTAR TRANSAKSI TUNDA
                                </a>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="custom-select custom-select-" name="mode_transaksi">
                                        <option value="Otomatis">Otomatis</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="registe" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Transaksi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" value="<?= date('Y-m-d') ?>" class="form-control " d="tanggal" name="tanggal" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Kasir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                            </div>
                                            <input type="text" value="<?= $this->fungsi->user_login()->nama_pegawai ?>" class="form-control" id="nama_pegawai" name="nama_pegawai" readonly>
                                            <input type="hidden" value="<?= $this->fungsi->user_login()->id_pegawai ?>" class="form-control" id="id_pegawai" name="id_pegawai" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 scan">
                                    <div class="form-group">
                                        <label>Scan Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="barcode_barang" value="" min="" name="barcode_barang" placeholder="Scan" required autofocus>
                                            <input type="hidden" id="qty_keranjangs">
                                            <input type="hidden" id="stock_awal">
                                            <input type="hidden" id="barcodes">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 selects">
                                    <div class="form-group">
                                        <label for="">Pilih Barang</label>
                                        <select name="barang" class="form-control form-control-sm" id="select-barang" style="width: 100%;">
                                            <option value="" disabled selected>Pilih Barang</option>
                                            <?php
                                            foreach ($barangs as $b) {
                                                echo "<option data-nama='$b->nama_barang' "
                                                    . " data-stock='$b->stock_barang' "
                                                    . " data-kode='$b->barcode_barang' "
                                                    . " data-harga='$b->harga_barang' "
                                                    . " value='$b->id_barang' "
                                                    . " $b->id_barang == $stocks->barang_id ? 'selected' : null> "
                                                    . "$b->barcode_barang / $b->nama_barang / $b->harga_barang"
                                                    . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="nama_brg">
                                        <input type="hidden" id="stock_brg">
                                        <input type="hidden" id="hargas_brg">
                                        <input type="hidden" id="stock_awal">
                                        <input type="hidden" id="kodes">
                                        <input type="hidden" id="qty_keranjangs">
                                    </div>
                                </div>
                                <div class="col-sm-6 jm">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah-barang" value="1" min="1" name="jumlah_barang" required>
                                    </div>
                                </div>
                                <div class="col-sm-2 btn-adds">
                                    <div class="form-group">
                                        <label>.</label><br>
                                        <a href="" class="btn btn-primary" id="btn-add-barang"><i class="fas fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-7">
                                <h5 style="width:175%; text-align:center"><b>DETAIL TRANSAKSI</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="reg" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div align="center">
                                        <h4>TOTAL</h4>
                                        <h1><b><span style="text-align:right;">Rp. </span><span style="text-align:center;" id="total1">0</span></b></h1>
                                    </div>
                                </div>
                            </div><br>
                        </form>
                    </div>
                    <div class="card-header">
                        <div class="row" style="text-align: center;">
                            <div class="col-sm-6">
                                <!-- <div class="form-group"> -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" value="Umum" class="form-control" id="type-customer" name="type_cus" readonly>
                                    </div>
                                <!-- </div> -->
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <input type="text" value="Cash" class="form-control" id="type-pembayaran" name="type_pembayaran" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-stripped">
                            <thead>
                                <tr style="text-align:center">
                                    <!-- <th width="1%">No</th> -->
                                    <th width="12%">Barcode</th>
                                    <th width="29%">Nama Barang</th>
                                    <th width="19%">Harga</th>
                                    <th width="10%">Jumlah</th>
                                    <th width="19%;">Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_keranjang">
                                <?php $this->view('content/app/keranjang_data') ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form id="regis" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sub Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" value="0" id="grand_total" name="grand_total" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bayar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" value="0" class="form-control" id="bayar" name="bayar" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Potongan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" id="potongan" value="0" name="potongan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kembali</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" id="kembalian" value="0" name="kembalian" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <input type="text" class="form-control" id="catatan" value="Terimakasih Sudah menghabiskan uang Anda :)" name="catatan" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" id="btn-cancel" name="btn-can" class="btn btn-flat btn-sm btn-danger"><i class="fas fa-times"></i>&nbsp;&nbsp;BATAL TRANSAKSI [F7]</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="" id="btn-proses-transaksi" class="btn btn-sm btn-flat btn-success"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;PROSES TRANSAKSI [F9]</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="" id="btn-tunda-transaksi" class="btn btn-info btn-flat btn-sm"><i class="fas fa-paperclip"></i>&nbsp;&nbsp;
                                            SUSPEND TRANSAKSI [F8]
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function() {
        $('.selects').hide();
        $('.btn-adds').hide();
        $("#barcode_barang, #bayar, #potongan").keyup(function(e) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '118') { //F7
                event.preventDefault();
                $('#btn-cancel').trigger('click');
            } else if (keycode == '120') { //F9
                event.preventDefault();
                $('#btn-proses-transaksi').trigger('click');
            } else if (keycode == '119') { //F8
                event.preventDefault();
                $('#btn-tunda-transaksi').trigger('click');
            } else if (keycode == '46') { //F8
                event.preventDefault();
                $('#hapus-keranjang').trigger('click');
            }
        });
        // Barcode
        $('#barcode_barang').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                event.preventDefault();
                var barcode_barang = $(this).val();
                let jumlahBarang = $("#jumlah-barang").val();
                // Function cek stock 
                get_qty_keranjang(barcode_barang, jumlahBarang)

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Transaksi/get_barang') ?>",
                    dataType: "JSON",
                    data: {
                        barcode_barang: barcode_barang
                    },
                    cache: false,
                    success: function(data) {
                        var barcodes = $("#barcodes").val(data.barcode_barang);
                        var stock_awal = $("#stock_awal").val(data.stock_barang);
                        var idbarang = data.id_barang;
                        var hargaBarang = data.harga_barang;
                        var stockBrg = data.stock_barang;
                        var barcode = barcodes;
                        var nama = data.nama_barang;

                        let jumlahBarang = $("#jumlah-barang").val();
                        let qty_keranjang = $("#qty_keranjangs").val();

                        let subTotal = parseInt(hargaBarang) * parseInt(jumlahBarang);

                        if (barcode == '' || idbarang == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Belum memasukkan barcode!',
                            });
                            $("#barcode_barang").focus()
                        } else if (jumlahBarang < 1) {
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-warning',
                                title: 'Data Gagal diproses!',
                                content: 'Stock Inputan 0 atau tidak ada!',
                                boxWidth: '500px',
                                useBootstrap: false,
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'OKE',
                                        btnClass: 'btn-blue',
                                        keys: ['enter'],
                                        action: function() {
                                            $("#barcode_barang").val("")
                                            $("#barcode_barang").focus()
                                            $("#jumlah-barang").val(1)
                                        }
                                    },
                                }
                            })
                        } else if (parseInt(stockBrg) < jumlahBarang || parseInt(stockBrg) < parseInt(qty_keranjang)) {
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-warning',
                                title: 'Data Gagal diproses!',
                                content: 'Stock Tidak tersedia!',
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
                                            $("#barcode_barang").val("")
                                            $("#barcode_barang").focus()
                                            $("#jumlah-barang").val(1)
                                        }
                                    },
                                }
                            })
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('Transaksi/proses') ?>",
                                dataType: "JSON",
                                data: {
                                    'add_keranjang': true,
                                    'id_barang': idbarang,
                                    'total': subTotal,
                                    'qty': jumlahBarang,
                                    'harga': hargaBarang,
                                },
                                success: function(result) {
                                    if (result.success == true) {
                                        $('#table_keranjang').load('<?= site_url('transaksi/keranjang_data ') ?>', function() {
                                            dataTransaksi()
                                        })
                                        $("#barcode_barang").val("")
                                        $("#jumlah-barang").val(1)
                                        $("#barcode_barang").focus()
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Gagal!',
                                        });
                                    }
                                }
                            });
                        }
                    }
                });

            }
        });
        // Function Validasi Cek Stock 
        function get_qty_keranjang(barcode, jml) {
            // Validasi berdasarkan barcode yang sama 
            $('#table_keranjang tr').each(function() {
                var qty_cart = $("#table_keranjang td.fbarcode:contains('" + barcode + "')").parent().find('td').eq(3).html()
                if (qty_cart != null) {
                    $('#qty_keranjangs').val(parseInt(qty_cart) + parseInt(jml))
                } else {
                    $('#qty_keranjangs').val(0)
                }
            })
        }

        //Hapus data Keranjang
        $(document).on('click', '#hapus-keranjang', function() {
            var id_keranjang = $(this).data('keranjangid')
            $.ajax({
                type: 'POST',
                url: '<?= site_url('Transaksi/delete_keranjang_data') ?>',
                dataType: 'JSON',
                data: {
                    'id_keranjang': id_keranjang
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#table_keranjang').load('<?= site_url('transaksi/keranjang_data ') ?>', function() {
                            dataTransaksi()
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal Hapus Data Keranjang!',
                        });
                    }
                }
            })
        });

        // Fungsi Load data ke tampilan
        function dataTransaksi() {
            var subTotal = 0;
            $("#table_keranjang tr").each(function() {
                subTotal += parseInt($(this).find("#tot-item").text())
            })
            isNaN(subTotal) ? $("#grand_total").val(0) : $("#grand_total").val(subTotal)
            var isipotongan = $("#potongan").val()
            var subTotals = $("#grand_total").val()
            var hitungtotalUtama = subTotal - isipotongan
            if (isNaN(hitungtotalUtama)) {
                $("#total1").text(subTotals)
                // $("#grand_total").val(0)
            } else {
                $("#total1").text(hitungtotalUtama)
                // $("#grand_total").val(hitungtotalUtama)
            }
            var bayar = $("#bayar").val()
            bayar != 0 ? $('#kembalian').val(bayar - hitungtotalUtama) : $('#kembalian').val(0)

        }

        // Otomatis update data ketika keyup atau mouseup
        $(document).on('keyup mouseup', '#potongan, #bayar', function() {
            dataTransaksi()
        })
        // Menjalankan function dataTransaksi()
        $(document).ready(function() {
            dataTransaksi()
        })

        // Proses Simpan Transaksi
        $("#btn-proses-transaksi").on("click", function(e) {
            var keranjang = $("#table_keranjang tr").children().eq(0).html();
            e.preventDefault();
            // var postJumlah = $("#jumlah-barang").val()
            var idPegawai = $("#id_pegawai").val()
            var potongan = $("#potongan").val()
            var bayar = $("#bayar").val()
            var kembali = $("#kembalian").val()
            var totalUtama = $("#total1").text()
            var catatan = $("#catatan").val()
            if (keranjang == null) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-danger',
                    title: 'Data gagal diproses!',
                    content: 'Tidak ada data barang yang dibeli',
                    closeIcon: true,
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                        },
                    }
                })
            } else if (bayar == "0" || bayar == '') {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-danger',
                    title: 'Data Gagal diproses!',
                    content: 'Belum memasukkan uang pembayaran',
                    closeIcon: true,
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                        },
                    }
                })
                $("#bayar").focus();
                // die()
            } else if (parseInt(bayar) < parseInt(totalUtama)) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-danger',
                    title: 'Data Gagal diproses!',
                    content: 'Uang pembayaran Kurang!',
                    closeIcon: true,
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                        },
                    }
                })
                $("#bayar").focus();
                // die()
            } else {
                $.ajax({
                    url: '<?= site_url('transaksi/proses') ?>',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        'proses_transaksi': true,
                        'id_user': idPegawai,
                        'total_utama': totalUtama,
                        'potongan': potongan,
                        'bayar': bayar,
                        'kembali': kembali,
                        'catatan': catatan,
                    },
                    success: function(result) {
                        if (result.success == true) {
                            e.preventDefault();
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-success',
                                title: 'Transaksi Sukses!',
                                content: "Cetak Struk Transaksi",
                                closeIcon: true,
                                boxWidth: '500px',
                                useBootstrap: false,
                                type: 'blue',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'CETAK',
                                        btnClass: 'btn-blue',
                                        action: function() {
                                            window.location.replace("app");
                                            window.open("<?= site_url('Transaksi/printStruck/') ?>" + result.id_transaksi, "_blank");
                                        }
                                    },
                                }
                            });
                        } else {
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-danger',
                                title: 'Gagal Proses Transaksi!',
                                content: 'Tidak bisa diproses',
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
                                            window.location.replace("<?= site_url("app") ?>");
                                        }
                                    },
                                }
                            })
                        }
                    }
                });
            }
        });

        // Tunda Transaksi
        $("#btn-tunda-transaksi").on("click", function(e) {
            var idPegawai = $("#id_pegawai").val()
            var keranjang = $("#table_keranjang tr").children().eq(0).html();
            e.preventDefault();
            if (keranjang == null) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-danger',
                    title: 'Data gagal diproses!',
                    content: 'Tidak ada data barang yang diproses',
                    closeIcon: true,
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                        },
                    }
                })
            } else {
                $.ajax({
                    url: '<?= site_url('transaksi/proses') ?>',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        'tunda_transaksi': true,
                        'id_user': idPegawai,
                    },
                    success: function(result) {
                        if (result.success == true) {
                            e.preventDefault();
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-success',
                                title: 'Sukses!',
                                content: "Data masuk ke Transaksi Tunda",
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
                                            window.location.replace("app");
                                        }
                                    },
                                }
                            });
                        } else {
                            e.preventDefault();
                            $.alert({
                                theme: 'modern',
                                icon: 'fa fa-danger',
                                title: 'Gagal!',
                                content: "Data tidak masuk ke Transaksi Tunda",
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
                                            window.location.replace("app");
                                        }
                                    },
                                }
                            });
                        }
                    }
                });
            }
        });

        //Batal dan Reset Data Transaksi 
        $(document).on('click', '#btn-cancel', function(e) {
            var keranjang = $("#table_keranjang tr").children().eq(0).html();
            e.preventDefault();
            if (keranjang == null) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-danger',
                    title: 'Tidak Ada Proses!',
                    content: 'Tidak ada data barang transaksi',
                    closeIcon: true,
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                        },
                    }
                })
            } else {
                $.confirm({
                    theme: 'modern',
                    icon: 'fa fa-warning',
                    title: 'Batal!',
                    content: 'Apakah anda batalkan Transaksi ? <br>',
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
                                $.ajax({
                                    type: 'POST',
                                    url: '<?= base_url() ?>' + 'Transaksi/delete_keranjang_data',
                                    dataType: 'JSON',
                                    data: {
                                        'batal_transaksi': true
                                    },
                                    success: function(result) {
                                        if (result.success == true) {
                                            $('#table_keranjang').load('<?= site_url('transaksi/keranjang_data ') ?>', function() {
                                                // count()
                                                dataTransaksi()
                                            })
                                        }
                                    }
                                })
                            }
                        },
                        close: function() {}
                    }
                });
            }
        });

        // Mode Manual
        $('#btn-add-barang').on("click", function(e) {
            event.preventDefault();
            var barcode_barang = $("#kodes").val();
            let jumlahBarang = $("#jumlah-barang").val();
            // Function cek stock 
            get_qty_keranjang(barcode_barang, jumlahBarang);

            var barcodes = $("#barcodes").val($("#kodes").val());
            var stock_awal = $("#stock_awal").val();
            var idbarang = $("#select-barang").val();
            var hargaBarang = $("#hargas_brg").val();
            var stockBrg = $("#stock_brg").val();
            var barcode = barcodes;
            var nama = $("#nama_brg").val();
            let qty_keranjang = $("#qty_keranjangs").val();
            let subTotal = parseInt(hargaBarang) * parseInt(jumlahBarang);

            if (barcode == '' || idbarang == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Belum memasukkan barcode!',
                });
                $("#barcode_barang").focus()
            } else if (jumlahBarang < 1) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-warning',
                    title: 'Data Gagal diproses!',
                    content: 'Stock Inputan 0 atau tidak ada!',
                    boxWidth: '500px',
                    useBootstrap: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'OKE',
                            btnClass: 'btn-blue',
                            action: function() {
                                $("#barcode_barang").val("")
                                $("#barcode_barang").focus()
                                $("#jumlah-barang").val(1)
                            }
                        },
                    }
                })
            } else if (parseInt(stockBrg) < jumlahBarang || parseInt(stockBrg) < parseInt(qty_keranjang)) {
                $.alert({
                    theme: 'modern',
                    icon: 'fa fa-warning',
                    title: 'Data Gagal diproses!',
                    content: 'Stock Tidak tersedia!',
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
                                $("#barcode_barang").val("")
                                $("#barcode_barang").focus()
                                $("#jumlah-barang").val(1)
                            }
                        },
                    }
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Transaksi/proses') ?>",
                    dataType: "JSON",
                    data: {
                        'add_keranjang': true,
                        'id_barang': idbarang,
                        'total': subTotal,
                        'qty': jumlahBarang,
                        'harga': hargaBarang,
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#table_keranjang').load('<?= site_url('transaksi/keranjang_data ') ?>', function() {
                                dataTransaksi()
                            })
                            $("#barcode_barang").val("")
                            $("#jumlah-barang").val(1)
                            $("#barcode_barang").focus()
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal!',
                            });
                        }
                    }
                });
            }
        });
        $("#select-barang").select2({
            theme: 'bootstrap4'
        }).on("change", function() {
            var optionSelected = $(this).children("option:selected");
            $("#kodes").val(optionSelected.data("kode"));
            $("#nama_brg").val(optionSelected.data("nama"));
            $("#hargas_brg").val(optionSelected.data("harga"));
            $("#stock_brg").val(optionSelected.data("stock"));
            $("#jumlah-barang").val(1);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('[name="mode_transaksi"]').change(function() {
            if ($('[name="mode_transaksi"]').val() === "Manual") {
                $('.selects').show();
                $('.btn-adds').show();
                $('.jm').addClass('col-sm-4').removeClass('col-sm-6');
                $('.scan').hide();
            } else {
                $('.selects').hide();
                $('.btn-adds').hide();
                $('.jm').addClass('col-sm-6').removeClass('col-sm-4');
                $('.scan').show();
            }
        })

    })
</script>