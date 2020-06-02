<?php

class modelSupplier extends CI_Model{
	var $table = "supplier";
    var $primaryKey = "id_supplier";

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function getAll(){
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data){
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}

	// Hitung Total Supplier
	public function hitungSupplier() {
		$sql = "SELECT count(id_supplier) as id_supplier FROM supplier";
		$result =  $this->db->query($sql);
		return $result->row()->id_supplier;
	}
}