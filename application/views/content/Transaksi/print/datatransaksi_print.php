<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>LAPORAN</title>
</head>

<body>
    <h4 style="text-align: center">DATA TRANSAKSI</h4>
    <br><br><br>
    <table id="example1" class="table table-bordered table-striped">
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
                    <td><?= formatRupiah($t->bayar) ?></td>
                    <td><?= formatRupiah($t->kembali) ?></td>
                    <!-- <td style="text-align:center">
                        <a href="<?= site_url("Transaksi/detail/$t->id_transaksi") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-search"></i></a>
                    </td> -->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>