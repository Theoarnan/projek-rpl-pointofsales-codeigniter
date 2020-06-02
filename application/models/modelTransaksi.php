<?php

class ModelTransaksi extends CI_Model
{
	var $table = "transaksi";
	var $primaryKey = "id_transaksi";

	// Insert batch untuk transaksi
	function insertBatch($params)
	{
		$this->db->insert_batch('item_transaksi', $params);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	// Menampilkan Top 5 item berdasarkan data paling bayak dibeli
	public function topSale()
	{
		$data = $this->db->select('*, b.nama_barang as nama_barang, SUM(qty_item_transaksi) as total_qty')
			->from('item_transaksi it')
			->join("barang b", 'it.id_barang = b.id_barang')
			->order_by('total_qty', 'desc')
			->limit(5)
			->group_by('it.id_barang')
			->get()->result();
		return $data;
	}

	// Function mengambil data terbaru dari transaksi
	public function recentSale()
	{
		$data = $this->db->select('*, user.level as level')
			->from('transaksi t')
			->join("user", 't.user_id = user.id_user')
			->order_by('nomor', 'desc')
			->limit(5)
			->group_by('nomor')
			->get()->result();
		return $data;
	}

	// Hitung Pendapatan
	public function hitungPendapatan($range = null)
	{
		$this->db->select_sum('total_utama');
		if ($range != null) {
			$this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
			$this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
		}
		return $this->db->get('transaksi')->row()->total_utama;
	}

	// Hitung Total Transaksi
	public function hitungTransaksi($range = null)
	{
		$this->db->select('*');
		if ($range != null) {
			$this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
			$this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
		}
		return $this->db->get('transaksi')->num_rows();
	}

	// Get All Transaksi 
	public function getAlls($range = null)
	{
		$this->db->select('transaksi.*, user.level as level')
			->join("user", 'transaksi.user_id = user.id_user');
		if ($range != null) {
			$this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
			$this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
		}
		return $this->db->get($this->table)->result();
	}

	// Get All Transaksi 
	public function getJoin()
	{
		$this->db->select('transaksi.*, MONTH(tanggal_transaksi) as bulan, SUM(total_utama) AS totals');
		$this->db->group_by('MONTH(tanggal_transaksi)');
		return $this->db->get($this->table)->result();
	}

	// Get All Transaksi 
	public function getDataHari()
	{
		$this->db->select('transaksi.*, user.level as level')
			->join("user", 'transaksi.user_id = user.id_user')
			->where("tanggal_transaksi",);
		return $this->db->get($this->table)->result();
	}

	// Get All Transaksi by Id
	public function getTransaksiById($id)
	{
		$this->db->select('transaksi.*, user.username as username, pegawai.nama_pegawai as nama_pegawai')
			->join("user", 'transaksi.user_id = user.id_user')
			->join("pegawai", 'user.pegawai_id = pegawai.id_pegawai')
			->where("id_transaksi", $id);
		return $this->db->get($this->table)->row();
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	//Tambah transaksi
	public function insertGetId($post)
	{
		$max = getLastNomor("transaksi")->nomor + 1;
		$noTransaksi = autoCreate(array("TRX"), "/", $max);
		$params = array(
			'no_transaksi' => $noTransaksi,
			'tanggal_transaksi' => date("Y-m-d H:i:s"),
			'nomor' => $max,
			'user_id' => $this->session->userdata('idUser'),
			'total_utama' => $post['total_utama'],
			'bayar' => $post['bayar'],
			'potongan' => $post['potongan'],
			'kembali' => $post['kembali'],
			'catatan' => $post['catatan'],
		);
		$this->db->insert('transaksi', $params);
		return $this->db->insert_id();
	}
}
