<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print QR Code <?= $barangs->barcode_barang ?></title>
</head>

<body>
    <h4>PRINT QR CODE</h4>
    <br><br><br>
    <img src="images/qrcode/item-<?=$barangs->id_barang?>.png" style="width: 250px">
    <br>
    <h5> KODE BARCODE : <?= $barangs->barcode_barang ?> </h5>
</body>

</html>