<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkOnLogin();
        // checkNoLogin();
        // roleAkses2();
        // roleAkses();
        $this->load->model(array("modelBarang", "modelPegawai", "modelSupplier", "userModel", "ModelTransaksi", "modelStocks", "ModelItemTransaksi", "ModelTundaTransaksi"));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            // Set tanggal
            $mulai = date('Y-m-d');
            $akhir = date('Y-m-d');
            // Aksi
            $stockSisa = $this->modelBarang->hitungStockSisa(['mulai' => $mulai, 'akhir' => $akhir]);
            $pendapatan = $this->ModelTransaksi->hitungPendapatan(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockIn = $this->modelStocks->hitungStockIn(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockOut = $this->modelStocks->hitungStockOut(['mulai' => $mulai, 'akhir' => $akhir]);
            $barangterjual = $this->ModelItemTransaksi->hitungItemTerjual(['mulai' => $mulai, 'akhir' => $akhir]);
            $transaksi = $this->ModelTransaksi->hitungTransaksi(['mulai' => $mulai, 'akhir' => $akhir]);
            $listTransaksi = $this->ModelTransaksi->getAlls(['mulai' => $mulai, 'akhir' => $akhir]);
            $data = array(
                "page" => "content/laporan/v_data_laporan",
                "header" => "Laporan",
                "pendapatan" => $pendapatan,
                "stockin" => $stockIn,
                "stockout" => $stockOut,
                "barangjual" => $barangterjual,
                "transaksi" => $transaksi,
                "transaksis" => $listTransaksi,
                "stockSisa" => $stockSisa,
                "mulai" => $mulai,
                "akhir" => $akhir
            );
            $this->load->view("layout/dashboard", $data);
        } else {
            // Set tanggal
            $input = $this->input->post(null, true);
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $pendapatan = $this->ModelTransaksi->hitungPendapatan(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockSisa = $this->modelBarang->hitungStockSisa(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockIn = $this->modelStocks->hitungStockIn(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockOut = $this->modelStocks->hitungStockOut(['mulai' => $mulai, 'akhir' => $akhir]);
            $barangterjual = $this->ModelItemTransaksi->hitungItemTerjual(['mulai' => $mulai, 'akhir' => $akhir]);
            $transaksi = $this->ModelTransaksi->hitungTransaksi(['mulai' => $mulai, 'akhir' => $akhir]);
            $listTransaksi = $this->ModelTransaksi->getAlls(['mulai' => $mulai, 'akhir' => $akhir]);

            $data = array(
                "page" => "content/laporan/v_data_laporan",
                "header" => "Laporan",
                "pendapatan" => $pendapatan,
                "stockin" => $stockIn,
                "stockout" => $stockOut,
                "barangjual" => $barangterjual,
                "transaksi" => $transaksi,
                "transaksis" => $listTransaksi,
                "stockSisa" => $stockSisa,
                "mulai" => $mulai,
                "akhir" => $akhir
            );
            $this->load->view("layout/dashboard", $data);
        }
    }
}
