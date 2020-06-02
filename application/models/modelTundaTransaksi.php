<?php

class ModelTundaTransaksi extends CI_Model
{
	var $table = "transaksi_tunda";
	var $primaryKey = "id_transaksi_tunda";

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	// Get data item transaksi tunda
	function get_item_tunda_bykode($id)
	{
		$this->db->select('*');
		$this->db->from('item_transaksi_tunda');
		$this->db->where('id_transaksi_tunda', $id);
		$hasil = $this->db->get()->result();
		return $hasil;
	}

	//Tambah Tunda transaksi
	public function insertGetTundaId($post)
	{
		$max = getLastNomorTunda("transaksi_tunda")->nomor + 1;
		$noTransaksi = autoCreate(array("TUNDA"), "/", $max);
		// dd($noTransaksiTunda);
		$params = array(
			'no_tunda' => $noTransaksi,
			'nomor' => $max,
			'tanggal' => date("Y-m-d H:i:s"),
			'user_id' => $this->session->userdata('idUser'),
		);
		$this->db->insert('transaksi_tunda', $params);
		return $this->db->insert_id();
	}

	// Hapus Data Transaksi by Id
	public function delete_tundatransaksi($params = null)
	{
		if ($params != null) {
			$this->db->where($params);
		}
		return $this->db->delete('transaksi_tunda');
	}
}
