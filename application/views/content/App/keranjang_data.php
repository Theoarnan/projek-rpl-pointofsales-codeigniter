<?php
$no = 1;
if ($keranjang->num_rows() > 0) {
    foreach ($keranjang->result() as $k => $data) { ?>
        <tr data-id="<?= $data->id_barang ?>" style="text-align:center">
            <!-- <td><?= $no++ ?></td> -->
            <td class="fbarcode"><?= $data->barcode_barang ?></td>
            <td><?= $data->tmp_nama_barang ?></td>
            <td id="harga"><?= formatRupiah($data->tmp_harga_barang) ?></td>
            <td id="qty" style="text-align:center;"><?= $data->qty ?></td>
            <td id="tot-item" style="text-align:center;"><?= $data->total ?></td>
            <td style="text-align:center;">
                <button id="hapus-keranjang" data-keranjangid="<?= $data->id_keranjang ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
        
       </tr>';
} ?>