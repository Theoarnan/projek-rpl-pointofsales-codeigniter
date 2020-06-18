<?php

class ModelPegawai extends CI_Model{
	var $table = "pegawai";
	var $primaryKey = "id_pegawai";

	public function getJoinJabatan($id = null){
		// $where = "jabatan='1' OR jabatan='2' OR jabatan='3'";
		$this->db->select('pegawai.*, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan');
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	// Hitung Total Pegawai
	public function hitungPegawai() {
		$sql = "SELECT count(id_pegawai) as id_pegawai FROM pegawai";
		$result =  $this->db->query($sql);
		return $result->row()->id_pegawai;
	}

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
}