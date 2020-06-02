<?php

class modelStocks extends CI_Model
{
	var $table = "stocks";
	var $primaryKey = "id_stock";

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function getAll(){
		return $this->db->get($this->table)->result();
	}

	// Hitung Stock Masuk
	public function hitungStockIn($range = null) {
		$this->db->select_sum('jumlah');
		$this->db->where('type', 'In');
		if ($range != null) {
            $this->db->where('created_at' . ' >=', $range['mulai']);
            $this->db->where('created_at' . ' <=', $range['akhir']);
		} 
		return $this->db->get('stocks')->row()->jumlah;
		
		// $sql = "SELECT sum(jumlah) as jumlah FROM stocks WHERE type = 'In'";
		// $result =  $this->db->query($sql);
		// return $result->row()->jumlah;
	}
	
	// Hitung Stock Out
	public function hitungStockOut($range = null) {
		$this->db->select_sum('jumlah');
		$this->db->where('type', 'Out');
		if ($range != null) {
            $this->db->where('created_at' . ' >=', $range['mulai']);
            $this->db->where('created_at' . ' <=', $range['akhir']);
		} 
		return $this->db->get('stocks')->row()->jumlah;
		// $sql = "SELECT sum(jumlah) as jumlah FROM stocks WHERE type = 'Out'";
		// $result =  $this->db->query($sql);
		// return $result->row()->jumlah;
	}

	public function getByPrimaryKey($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	// Mengambil semua data Stock
	public function getJoinAll($id = null){
		$this->db->select('stocks.*, barang.nama_barang as nama_barang, barang.barcode_barang as barcode_barang, supplier.nama_supplier as nama_supplier, user.level as level')
		->join("barang", 'barang.id_barang = stocks.barang_id')
		->join("supplier", 'supplier.id_supplier= stocks.supplier_id')
		->join("user", 'user.id_user= stocks.user_id')
		->where("type" , "Out");
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function getJoin($id = null){
		$this->db->select('stocks.*, barang.nama_barang as nama_barang, barang.barcode_barang as barcode_barang, supplier.nama_supplier as nama_supplier, user.level as level')
		->join("barang", 'barang.id_barang = stocks.barang_id')
		->join("supplier", 'supplier.id_supplier= stocks.supplier_id')
		->join("user", 'user.id_user= stocks.user_id')
		->where("type" , "In");
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function getJoin2($id = null){
		$this->db->select('stocks.*, barang.nama_barang as nama_barang, barang.barcode_barang as barcode_barang, user.level as level')
		->join("barang", 'barang.id_barang = stocks.barang_id')
		->join("user", 'user.id_user= stocks.user_id')
		->where("type" , "Out");
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function getJoin3($id = null){
		$this->db->select('stocks.*, barang.nama_barang as nama_barang, barang.barcode_barang as barcode_barang, user.level as level')
		->join("barang", 'barang.id_barang = stocks.barang_id')
		->join("user", 'user.id_user= stocks.user_id');
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function update($id, $data){
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}

	function cek_barcode($code, $id=null){
		$this->db->where('barcode_barang', $code);
		if ($id != null) {
			$this->db->where('id_barang !=', $id);
		}
		return $this->db->get($this->table);
	}
}
