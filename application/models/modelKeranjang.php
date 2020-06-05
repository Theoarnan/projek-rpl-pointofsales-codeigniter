<?php

class ModelKeranjang extends CI_Model
{
    var $table = "temp_keranjang";
    var $primaryKey = "id_keranjang";

    // Masukkan ke keranjang
    public function insertCart($post)
    {
        $query = $this->db->query("SELECT MAX(id_keranjang) as keranjang_no from temp_keranjang");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $keranjang_no = ((int) $row->keranjang_no) + 1;
        } else {
            $keranjang_no = "1";
        }
        $keranjang = array(
            "id_keranjang" => $keranjang_no,
            "barang_id" => $post['id_barang'],
            "harga" => $post['harga'],
            "qty" => $post['qty'],
            "total" => $post['total'],
            "user_id" => $this->session->userdata('idUser'),
        );
        return $this->db->insert('temp_keranjang', $keranjang);
    }

    public function insertCartTunda($post)
    {
        $query = $this->db->query("SELECT MAX(id_keranjang) as keranjang_no from temp_keranjang");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $keranjang_no = ((int) $row->keranjang_no) + 1;
        } else {
            $keranjang_no = "1";
        }
        return $this->db->insert_batch()('temp_keranjang', $post);
    }

    // Update jumlah 
    public function updateCartQty($post)
    {
        $sql = "UPDATE temp_keranjang SET harga = '$post[harga]',
            qty = qty + '$post[qty]',
            total = '$post[harga]' * qty
            WHERE barang_id = '$post[id_barang]'";

        $hasil = $this->db->query($sql);
        return $hasil;
    }

    // Ambil data keranjang
    public function getKeranjang($params = null)
    {
        $this->db->select('*, barang.nama_barang as tmp_nama_barang, barang.harga_barang as tmp_harga_barang');
        $this->db->from('temp_keranjang');
        $this->db->join("barang", 'temp_keranjang.barang_id = barang.id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('idUser'));
        $query = $this->db->get();
        return $query;
    }

    // public function getQtyTemp($params = null){
	// 	$this->db->select('qty');
	// 	// $this->db->join("kategori", 'kategori.id_kategori = barang.kategori_id');
	// 	if ($params != null) {
	// 		$this->db->where($params);
	// 	}
	// 	return $this->db->get($this->table)->result();
	// }

    // Hapus Keranjang
    public function delete_data_keranjang($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        return $this->db->delete('temp_keranjang');
    }

    // Insert batch untuk proses transaksi tunda
	function insertBatchTundaTransaksi($params)
	{
		$this->db->insert_batch('temp_keranjang', $params);
	}
}
