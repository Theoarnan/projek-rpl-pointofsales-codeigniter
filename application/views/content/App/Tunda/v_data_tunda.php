<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Tunda Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Tunda Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <a href="<?= site_url(array("Transaksi", "app")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:1px;">No.</th>
                            <th>No. Tunda</th>
                            <th>Nama Kasir</th>
                            <th style="width:10%;">Tanggal</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tunda as $t) {
                        ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $t->no_tunda ?></td>
                                <td><?= convertidUsertoLevel($t->user_id) ?></td>
                                <td><?= $t->tanggal ?></td>
                                <td style="text-align:center">
                                    <button class="btn btn-sm btn-warning" id="btn-proses-tunda" data-tundaid="<?= $t->id_transaksi_tunda ?>" data-title="Edit"><i class="fas fa-shopping-cart"></i> Proses Transaksi</button>
                                    <!-- <a href="<?= site_url("Transaksi/prosesTunda/$t->id_transaksi_tunda") ?>" class="btn btn-sm btn-warning" id="btn-proses-tunda" data-tundaid="<?= $t->id_transaksi_tunda ?>" data-title="Edit"><i class="fas fa-shopping-cart"></i> Proses Transaksi</a> -->
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
    $(document).on('click', '#btn-proses-tunda', function() {
        var id_transaksi_tunda = $(this).data('tundaid');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Transaksi/prosesTunda') ?>",
            dataType: "JSON",
            data: {
                id_transaksi_tunda: id_transaksi_tunda
            },
            cache: false,
            success: function(result) {
                if (result.success == true) {
                    window.location.replace("app");
                    $('#table_keranjang').load('<?= site_url('transaksi/keranjang_data ') ?>', function() {
                        dataTransaksi()
                    })
                    $("#barcode_barang").val("")
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
    });
</script>