<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Barcode <?= $barangs->barcode_barang ?></title>
</head>

<body>
    <h4>PRINT BARCODE</h4>
    <br><br><br>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barangs->barcode_barang, $generator::TYPE_CODE_128)) . '" style="width: 250px; height: 200px;">';
    ?>
    <br>
    <h5> KODE BARCODE : <?= $barangs->barcode_barang ?> </h5>
</body>

</html>