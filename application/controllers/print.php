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
        $this->load->model(array("ModelBarang", "ModelPegawai", "ModelSupplier", "UserModel", "ModelTransaksi", "modelStocks", "ModelItemTransaksi", "ModelTundaTransaksi"));
        $this->load->library('form_validation');
    }

    // Cetak barcode
    function index()
    {
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            // Set tanggal
            $mulai = date('Y-m-d');
            $akhir = date('Y-m-d');
            // Aksi
            $stockSisa = $this->ModelBarang->hitungStockSisa(['mulai' => $mulai, 'akhir' => $akhir]);
            $pendapatan = $this->ModelTransaksi->hitungPendapatan(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockIn = $this->ModelStocks->hitungStockIn(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockOut = $this->ModelStocks->hitungStockOut(['mulai' => $mulai, 'akhir' => $akhir]);
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
                "stockSisa" => $stockSisa
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
            $stockSisa = $this->ModelBarang->hitungStockSisa(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockIn = $this->ModelStocks->hitungStockIn(['mulai' => $mulai, 'akhir' => $akhir]);
            $stockOut = $this->ModelStocks->hitungStockOut(['mulai' => $mulai, 'akhir' => $akhir]);
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
                "akhir" => $akhir,
            );
            $html = $this->load->view('content/laporan/print/laporan_print', $data, true);
            $this->fungsi->createPDF($html, 'Laporan-' . $mulai . '-' . $akhir, 'A4', 'potrait');
        }
    }
}