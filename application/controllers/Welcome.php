<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		checkOnLogin();
		checkActive();
        // checkNoLogin();
        // roleAkses2();
        // roleAkses();
        $this->load->model(array("ModelBarang", "ModelPegawai", "ModelSupplier", "UserModel", "ModelTransaksi", "ModelStocks", "ModelItemTransaksi", "ModelTundaTransaksi"));
	}
	
	public function index()
	{
		$barang = $this->ModelBarang->hitungBarang();
		$pegawai = $this->ModelPegawai->hitungPegawai();
		$supplier = $this->ModelSupplier->hitungSupplier();
		$user = $this->UserModel->hitungUser();
		$topSale = $this->ModelTransaksi->topSale();
		$recentSale = $this->ModelTransaksi->recentSale();
		$stockSisa = $this->ModelBarang->hitungStockSisa();
		$pendapatan = $this->ModelTransaksi->hitungPendapatan();
		$stockIn = $this->ModelStocks->hitungStockIn();
		$stockOut = $this->ModelStocks->hitungStockOut();
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
