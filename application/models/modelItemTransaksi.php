<?php

class ModelItemTransaksi extends CI_Model {
	var $table = "item_transaksi";
	var $primaryKey = "id_item_transaksi";

	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}

	public function getAll() {
		return $this->db->get($this->table)->result();
	}

	// Hitung total Item Terjual
	public function hitungItemTerjual($range = null) {

		$this->db->select_sum('qty_item_transaksi');
		if ($range != null) {
            $this->db->where('created_at' . ' >=', $range['mulai']);
            $this->db->where('created_at' . ' <=', $range['akhir']);
		} 
        return $this->db->get('item_transaksi')->row()->qty_item_transaksi;
	}

	public function getByPrimaryKey($id) {
		$this->db->where("id_transaksi", $id);
		return $this->db->get($this->table)->row();
	}

	// Ambil data item Transaksi berdasarkan Id Semua
	public function getItemTransaksi($id)
	{
		$this->db->select('item_transaksi.*, barang.nama_barang as nama_barang, barang.harga_barang as harga_barang, barang.barcode_barang as barcode_barang');
		$this->db->join("barang", 'item_transaksi.id_barang = barang.id_barang');
		$this->db->where('id_transaksi', $id);
		return $this->db->get('item_transaksi')->result();
	}

	public function getItemTransaksiById($id)
	{
		$this->db->select('item_transaksi.*, barang.nama_barang as nama_barang, barang.barcode_barang as barcode_barang');
		$this->db->join("barang", 'item_transaksi.id_barang = barang.id_barang');
		$this->db->where('id_transaksi', $id);
		return $this->db->get('item_transaksi')->row();
	}
}
