<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Print Barcode <?= $barangs->barcode_barang ?></title>
</head>

<body>
    <h4 style="text-align: center">PRINT ALL BARCODE</h4>
    <br><br><br>
    <!-- <section class="content">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body"> -->
    <table id="example2" class="table table-striped" style="text-align: center;">
        <thead>
            <tr>
                <th style="width:3%;">No</th>
                <th style="width:10%;">Kode</th>
                <th style="width:20%;">Nama Barang</th>
                <th style="width:16%; text-align: center;">Barcode</th>
                <th style="width:16%; text-align: center;">QRCode</th>
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
                    <td style="text-align:center;">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barang->barcode_barang, $generator::TYPE_CODE_128)) . '" style="width: 130px; height: 75px;">';
                        ?>
                    </td>
                    <td>
                        <img src="images/qrcode/item-<?=$barang->id_barang?>.png" style="width: 75px; height: 75px;">
                    </td>
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