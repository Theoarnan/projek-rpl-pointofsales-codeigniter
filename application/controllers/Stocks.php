<?php

class Stocks extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        roleAkses();
        $this->load->model(['modelStocks', 'modelBarang', 'userModel', 'modelSupplier']);
    }

    public function index()
    {
        $listStock = $this->modelStocks->getJoin();
        $data = array(
            "page" => "content/Stock/stock_in/v_data_stockin",
            "header" => "Data Stock IN",
            "stocks" => $listStock
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function indexOut()
    {
        $listStock = $this->modelStocks->getJoin2();
        $data = array(
            "page" => "content/Stock/stock_out/v_data_stockout",
            "header" => "Data Stock Out",
            "stocks" => $listStock
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function riwayatStock()
    {
        $listStock = $this->modelStocks->getJoin3();
        $data = array(
            "page" => "content/Stock/v_all_data_stock",
            "header" => "Data Stock",
            "stocks" => $listStock,
            // "stockss" => $listStocks
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function stockIn()
    {
        $stk = new stdClass();
        $stk->id_stock = null;
        $stk->type = null;
        $stk->detail = "0";
        $stk->jumlah = null;
        $stk->tanggal = null;
        $stk->barang_id = null;
        $stk->supplier_id = null;
        $stk->user_id = null;

        $barang = $this->modelBarang->getJoin();
        $supplier = $this->modelSupplier->getAll();

        $data = array(
            "header" => "ADD STOCK IN",
            "page" => "content/Stock/stock_in/v_form_stockin",
            "pages" => 'In',
            "stocks" => $stk,
            "barangs" => $barang,
            "suppliers" => $supplier
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function stockOut()
    {
        $stk = new stdClass();
        $stk->id_stock = null;
        $stk->type = null;
        $stk->detail = "0";
        $stk->jumlah = null;
        $stk->tanggal = null;
        $stk->barang_id = null;
        $stk->user_id = null;
        $barang = $this->modelBarang->getJoin();

        $data = array(
            "header" => "ADD STOCK OUT",
            "page" => "content/Stock/stock_out/v_form_stockout",
            "pages" => 'Out',
            "stocks" => $stk,
            "barangs" => $barang,

        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses()
    {
        // Proses Stock In
        if (isset($_POST['In'])) {
            $jumlah = $this->input->post('jumlah', true);
            $id = $this->input->post('barang', true);
            $stock = array(
                "id_stock" => $this->input->post('id_stock'),
                "type" => "in",
                "detail" => $this->input->post('detail'),
                "supplier_id" => $this->input->post('supplier') == '' ? null : $this->input->post('supplier'),
                'jumlah' =>  $this->input->post('jumlah'),
                "tanggal" => $this->input->post('tanggal'),
                "user_id" => $this->session->userdata('idUser'),
                'barang_id' => $this->input->post('barang')
            );
            $this->modelBarang->updateStock($jumlah, $id);
            $this->modelStocks->insert($stock);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-in Sukses disimpan');
            }
            redirect("Stocks/stockin");
            // Proses Stock Out
        } else if (isset($_POST['Out'])) {
            $jumlah = $this->input->post('jumlah', true);
            $id = $this->input->post('barang', true);
            $stock = array(
                "id_stock" => $this->input->post('id_stock'),
                "type" => "out",
                "detail" => $this->input->post('detail'),
                // "supplier_id" => $this->input->post('supplier') == ''? null : $this->input->post('supplier'),
                'jumlah' =>  $this->input->post('jumlah'),
                "tanggal" => $this->input->post('tanggal'),
                "user_id" => $this->session->userdata('idUser'),
                'barang_id' => $this->input->post('barang')
            );
            $this->modelBarang->kurangStock($jumlah, $id);
            $this->modelStocks->insert($stock);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-in Sukses disimpan');
            }
            redirect("Stocks/stockout");
        }
    }
}
