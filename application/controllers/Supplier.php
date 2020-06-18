<?php

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        roleAkses2();
        $this->load->model("ModelSupplier");
    }

    public function index()
    {
        $listSupplier = $this->ModelSupplier->getAll();
        $data = array(
            "page" => "Content/Supplier/v_list_supplier",
            "header" => "Daftar Supplier",
            "suppliers" => $listSupplier
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function register()
    {
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->nama_supplier = null;
        $supplier->no_telp = null;
        $supplier->alamat = null;
        $supplier->deskripsi = null;
        $data = array(
            "header" => "Tambah Data Supplier",
            "page" => "Content/Supplier/v_form_supplier",
            "pages" => 'register',
            "suppliers" => $supplier
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function update($id)
    {
        $listSupplier = $this->ModelSupplier->getByPrimaryKey($id);
        $data = array(
            "header" => "Tambah Data Supplier",
            "page" => "Content/Supplier/v_form_supplier",
            "pages" => 'update',
            "suppliers" => $listSupplier
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_simpan()
    {
        // Proses tambah Supplier
        if (isset($_POST['register'])) {
            $supplier = array(
                "nama_supplier" => $this->input->post('nama_supp'),
                "alamat" => $this->input->post('alamats'),
                "deskripsi" => $this->input->post('desk'),
                "no_telp" => $this->input->post('no_telpon')
            );
            $this->ModelSupplier->insert($supplier);
            $this->session->set_flashdata('success', 'Data Sukses disimpan');
            redirect('Supplier/register');
        }
        // Proses Update data Supplier
        if (isset($_POST['update'])) {
            $id = $this->input->post("id_supplier", true);
            $nama = $this->input->post("nama_supp", true);
            $alamat = $this->input->post("alamats", true);
            $desk = $this->input->post("desk", true);
            $telp = $this->input->post("no_telpon", true);
            $supplier = array(
                "nama_supplier" => $nama,
                "alamat" => $alamat,
                "deskripsi" => $desk,
                "no_telp" => $telp
            );
            $this->ModelSupplier->update($id, $supplier);
            
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses diupdate');
        }
        redirect("Supplier");
    }

    public function proses_hapus($id) {
		$this->ModelSupplier->delete($id);
		redirect("Supplier");
	}
}
