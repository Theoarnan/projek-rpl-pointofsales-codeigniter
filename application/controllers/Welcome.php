<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		checkOnLogin();
        // checkNoLogin();
        // roleAkses2();
        // roleAkses();
        $this->load->model(array("modelBarang", "modelPegawai", "modelSupplier", "userModel", "ModelTransaksi", "modelStocks", "ModelItemTransaksi", "ModelTundaTransaksi"));
	}
	
	public function index()
	{
		// $tanggal_start = $this->input->get("tanggal_start", TRUE);
		// $tanggal_end = $this->input->get("tanggal_end", TRUE);
		// die($tanggal_start. "===" .$tanggal_end);
		$barang = $this->modelBarang->hitungBarang();
		$pegawai = $this->modelPegawai->hitungPegawai();
		$supplier = $this->modelSupplier->hitungSupplier();
		$user = $this->userModel->hitungUser();
		$topSale = $this->ModelTransaksi->topSale();
		$recentSale = $this->ModelTransaksi->recentSale();
		$stockSisa = $this->modelBarang->hitungStockSisa();
		$pendapatan = $this->ModelTransaksi->hitungPendapatan();
		$stockIn = $this->modelStocks->hitungStockIn();
		$stockOut = $this->modelStocks->hitungStockOut();
		$barangterjual = $this->ModelItemTransaksi->hitungItemTerjual();
		$transaksi = $this->ModelTransaksi->hitungTransaksi();
		$allTransaksi = $this->ModelTransaksi->getJoin();
		$data = array(
			"page" => "dashboards",
			"header" => "Dashboard",
			"pendapatan" => $pendapatan,
			"stockin" => $stockIn,
			"stockout" => $stockOut,
			"barangjual" => $barangterjual,
			"transaksi" => $transaksi,
			"trans" => $allTransaksi,
			"barang" => $barang,
			"pegawai" => $pegawai,
			"supplier" => $supplier,
			"users" => $user,
			"topsale" => $topSale,
			"recentsale" => $recentSale,
			"stockSisa" => $stockSisa
		);
		$this->load->view("layout/dashboard", $data);
	}
}
