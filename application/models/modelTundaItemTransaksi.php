<?php

class ModelTundaItemTransaksi extends CI_Model {
	var $table = "item_transaksi_tunda";
	var $primaryKey = "id_item_transaksi_tunda";

	public function getAll() {
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function getByJoinKey($id) {
		$this->db->where('id_transaksi_tunda', $id);
		return $this->db->get($this->table)->row();
	}

	// Insert batch untuk tunda transaksi
	function insertBatchTunda($params)
	{
		$this->db->insert_batch('item_transaksi_tunda', $params);
	}

	// Hapus item tunda transaksi by id
	public function delete_tundaitemtransaksi($params = null)
	{
		if ($params != null) {
			$this->db->where($params);
		}
		return $this->db->delete('item_transaksi_tunda');
	}

}
