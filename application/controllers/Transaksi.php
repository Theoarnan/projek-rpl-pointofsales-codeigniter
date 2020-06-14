<?php

use Sabberworm\CSS\Comment\Comment;

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        checkActive();
        // roleAkses();
        $this->load->model(array("ModelBarang", "ModelTransaksi", "ModelItemTransaksi", "ModelKeranjang", "ModelTundaItemTransaksi", "ModelTundaTransaksi"));
    }

    // Data Transaksi
    public function index()
    {
        $listTransaksi = $this->ModelTransaksi->getAlls();
        $data = array(
            "header" => "Data Transaksi",
            "transaksis" => $listTransaksi,
            "page" => "content/Transaksi/v_list_transaksi"
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Data Tunda Transaksi
    public function tunda()
    {
        $this->load->model("ModelTundaTransaksi");
        $listTransaksi = $this->ModelTundaTransaksi->getAll();
        $data = array(
            "header" => "Data Tunda Transaksi",
            "tunda" => $listTransaksi,
            "page" => "Content/App/tunda/v_data_tunda"
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Ambil data Barang
    function get_barang()
    {
        $kode = $this->input->post('barcode_barang');
        $data = $this->ModelBarang->get_data_barang_bykode($kode);
        echo json_encode($data);
    }

    // Aplikasi Kasir
    public function app()
    {
        $listBarang = $this->ModelBarang->getAll();
        $keranjang = $this->ModelKeranjang->getKeranjang();
        $data = array(
            "header" => "Aplikasi Kasir",
            "barangs" => $listBarang,
            "keranjang" => $keranjang,
            "page" => "Content/App/v_form_app"
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Detail Transaksi
    public function detail($id)
    {
        $listItem = $this->ModelItemTransaksi->getItemTransaksi($id);
        $transaksi = $this->ModelTransaksi->getByPrimaryKey($id);
        $data = array(
            "header" => "Aplikasi Kasir",
            "items" => $listItem,
            "transaksis" => $transaksi,
            "page" => "Content/Transaksi/v_detail_transaksi"
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Proses
    public function proses()
    {
        $data = $this->input->post(null, TRUE);
        // Proses Tambah Keranjang
        if (isset($_POST['add_keranjang'])) {
            $idBarang = $this->input->post('id_barang');
            // $cekQtyTemp = $this->input->post('qty');
            // $QtyBarang = $this->modelBarang->getQtyBarang($idBarang);
            $cekQty = $this->ModelKeranjang->getKeranjang(['temp_keranjang.barang_id' => $idBarang])->num_rows();
                if ($cekQty > 0) {
                    $this->ModelKeranjang->updateCartQty($data);
                } else {
                    $this->ModelKeranjang->insertCart($data);
                }

            if ($this->db->affected_rows() > 0) {
                $data = array("success" => true);
            } else {
                $data = array("success" => false);
            }
            echo json_encode($data);
        }  // Proses Transaksi
        else if (isset($_POST['proses_transaksi'])) {
            $transaksi_id = $this->ModelTransaksi->insertGetId($data);
            $keranjang = $this->ModelKeranjang->getKeranjang()->result();
            // $index = 0;
            $row = [];
            foreach ($keranjang as $k => $value) {
                array_push(
                    $row,
                    array(
                        'id_transaksi' => $transaksi_id,
                        'id_barang' => $value->barang_id,
                        'harga_item_transaksi' => $value->harga,
                        'qty_item_transaksi' => $value->qty,
                        'total_item_transaksi' => $value->total,
                    )
                );
            }
            $this->ModelTransaksi->insertBatch($row);
            $this->ModelKeranjang->delete_data_keranjang(['user_id' => $this->session->userdata('idUser')]);
            if ($this->db->affected_rows() > 0) {
                $data = array("success" => true, "id_transaksi" => $transaksi_id);
            } else {
                $data = array("success" => false);
            }
            echo json_encode($data);
        } // Proses Tunda Transaksi
        else if (isset($_POST['tunda_transaksi'])) {
            $transaksi_id = $this->ModelTundaTransaksi->insertGetTundaId($data);
            $keranjang = $this->ModelKeranjang->getKeranjang()->result();
            // $index = 0;
            $row = [];
            foreach ($keranjang as $k => $value) {
                array_push(
                    $row,
                    array(
                        'id_transaksi_tunda' => $transaksi_id,
                        'id_barang' => $value->barang_id,
                        'harga_tunda' => $value->harga,
                        'qty_tunda' => $value->qty,
                        'total_tunda' => $value->total,
                    )
                );
            }
            $this->ModelTundaItemTransaksi->insertBatchTunda($row);
            $this->ModelKeranjang->delete_data_keranjang(['user_id' => $this->session->userdata('idUser')]);
            if ($this->db->affected_rows() > 0) {
                $data = array("success" => true);
            } else {
                $data = array("success" => false);
            }
            echo json_encode($data);
        }
    }

    // Ambil data dari temp_keranjang
    public function keranjang_data()
    {
        $keranjang = $this->ModelKeranjang->getKeranjang();
        $data['keranjang'] = $keranjang;
        $this->load->view('Content/App/keranjang_data', $data);
    }

    //Hapus Keranjang
    public function delete_keranjang_data()
    {
        if (isset($_POST['batal_transaksi'])) {
            $this->ModelKeranjang->delete_data_keranjang(['user_id' => $this->session->userdata('idUser')]);
        } else {
            $keranjangData =  $this->input->post('id_keranjang');
            $this->ModelKeranjang->delete_data_keranjang(['id_keranjang' => $keranjangData]);
        }

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    //Proses Transaksi dari Tunda Transaksi
    public function prosesTunda()
    {
        $id = $this->input->post("id_transaksi_tunda");
        $keranjang = $this->ModelTundaTransaksi->get_item_tunda_bykode($id);
        // $index = 0;
        $row = [];
        foreach ($keranjang as $k => $value) {
            array_push(
                $row,
                array(
                    'id_keranjang' => $value->id_item_transaksi_tunda,
                    'barang_id' => $value->id_barang,
                    'harga' => $value->harga_tunda,
                    'qty' => $value->qty_tunda,
                    'total' => $value->total_tunda,
                    'user_id' => $this->session->userdata('idUser')
                )
            );
        }
        $this->ModelKeranjang->insertBatchTundaTransaksi($row);
        $this->ModelTundaItemTransaksi->delete_tundaitemtransaksi(['id_transaksi_tunda' => $id]);
        $this->ModelTundaTransaksi->delete_tundatransaksi(['id_transaksi_tunda' => $id]);
        if ($this->db->affected_rows() > 0) {
            $keranjang = array("success" => true);
        } else {
            $keranjang = array("success" => false);
        }
        echo json_encode($keranjang);
    }

    // Cetak Struk
    public function printStruck($id)
    {
        $data = array(
            'transaksi' => $this->ModelTransaksi->getTransaksiById($id),
            'itemTransaksi' => $this->ModelItemTransaksi->getItemTransaksi($id)
        );
        $this->load->view("Content/App/print/print_struk", $data);
    }

    public function printDataTransaksi()
    {
        $listTransaksi = $this->ModelTransaksi->getAlls();
        $data = array(
            "transaksis" => $listTransaksi,
        );
        $html = $this->load->view('Content/Transaksi/print/datatransaksi_print', $data, true);
        $this->fungsi->createPDF($html, 'Print Data Transaksi', 'A4', 'landscape');
    }
}
