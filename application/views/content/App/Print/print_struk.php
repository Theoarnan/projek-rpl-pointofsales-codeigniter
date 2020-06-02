<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Struck</title>
    <style type="text/css">
        html {
            font-family: "Verdana, Arial";
        }

        .content {
            width: 90mm;
            font-size: 12px;
            padding: 5px
        }

        .title {
            text-align: center;
            font-size: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            /* margin-top: 10px; */
            padding-top: 12px;
            padding-bottom: 8px;
            text-align: center;
            font-size: 14px;
            border-top: 1px solid;
        }

        @media print {
            @page {
                width: 90mm;
                margin: 0mm
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <b>POS APPLICATION</b>
            <br>
            Purwomartani, Kalasan, Sleman, Jogjakarta
        </div>
        <div class="head">
            <table cellspacing="2" cellpadding="3">
                <tr>
                    <td style="width: 250px"><?= $transaksi->tanggal_transaksi ?></td>
                    <td>Kasir</td>
                    <td style="text-align:center; width:13px">:</td>
                    <td style="text-align:right"><?= ucfirst($transaksi->nama_pegawai) ?></td>
                </tr>
                <tr>
                    <td><?= $transaksi->no_transaksi ?></td>
                </tr>
            </table>
        </div>
        <div class="transaction">
            <table class="transactin-table" cellspacing="2" cellpadding="5">
                <tr>
                    <td style="width: 170px">Nama barang</td>
                    <td style="text-align:center">Qty</td>
                    <td style="text-align:center; width:60px">Harga</td>
                    <td style="text-align:center">Sub-total</td>
                </tr>
                <!-- <tr>
                    <td colspan="4" style="border-bottom:1px dashed; padding-top: 2px"></td>
                </tr> -->
                <?php
                $arr_potongan = array();
                foreach ($itemTransaksi as $it) { ?>
                    <tr>
                        <td style="width: 165px; padding-top:10px"><?= $it->nama_barang ?></td>
                        <td style="padding-top:10px"><?= $it->qty_item_transaksi ?></td>
                        <td style="text-align:right; padding-top:10px; width:60px"><?= formatRupiah($it->harga_barang) ?></td>
                        <td style="text-align:right; padding-top:10px"><?= formatRupiah($it->total_item_transaksi) ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4" style="border-bottom:1px dashed; padding-top: 5px"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align:right; padding-top:8px; padding-right:5px">Potongan</td>
                    <td style="text-align:right; padding-top:8px"><?= formatRupiah($transaksi->potongan) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align:right; padding-top:8px">Total</td>
                    <td style="text-align:right; padding-top:8px"><?= formatRupiah($transaksi->total_utama) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align:right; padding-top:8px">Bayar</td>
                    <td style="text-align:right; padding-top:8px"><?= formatRupiah($transaksi->bayar) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align:right; padding-top:8px">Kembali</td>
                    <td style="text-align:right; padding-top:8px"><?= formatRupiah($transaksi->kembali) ?></td>
                </tr>
            </table>
        </div>
        <div class="thanks">
            ------- Terimakasih sudah berberlanja -------
            <br>
            Kepuasan Anda Semangat Kami
        </div>
    </div>

</body>

</html>