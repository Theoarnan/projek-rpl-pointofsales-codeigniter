<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Print Barcode <?= $barangs->barcode_barang ?></title>
</head>

<body>
    <h4 style="text-align: center">DATA BARANG</h4>
    <br><br><br>
    <!-- <section class="content">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body"> -->
                <table id="er" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:3%;">No</th>
                            <th style="width:8%;">Barcode</th>
                            <th style="width:16%;">Nama Barang</th>
                            <th style="width:10%;">Kategori</th>
                            <th style="width:10%;">Harga</th>
                            <th style="width:10%;">Kemasan</th>
                            <th style="width:7%; text-align:center">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barangs as $barang) {
                        ?>
                            <tr>
                                <td style="text-align: center"><?= $no++ ?>.</td>
                                <td style="text-align: center"><?= $barang->barcode_barang ?></td>
                                <td><?= $barang->nama_barang ?></td>
                                <td><?= $barang->nama_kategori ?></td>
                                <td style="text-align: center"><?= formatRupiah($barang->harga_barang) ?></td>
                                <td style="text-align: center"><?= $barang->kemasan_barang ?></td>
                                <td style="text-align:center;"><?= $barang->stock_barang == null ? "0" : $barang->stock_barang ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <!-- </div>
        </div>
    </section> -->
</body>

</html>