<?php

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        roleAkses();
        $this->load->model("modelKategori");
    }

    public function index()
    {
        $listKategori = $this->modelKategori->getAll();
        $data = array(
            "page" => "content/kategoribrg/v_list_kat",
            "header" => "Daftar Kategori",
            "kategories" => $listKategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function register()
    {
        $kategori = new stdClass();
        $kategori->id_kategori = null;
        $kategori->nama_kategori = null;
        $data = array(
            "header" => "Tambah Data Kategori",
            "page" => "content/kategoribrg/modal",
            "pages" => 'register',
            "suppliers" => $kategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function update($id)
    {
        $listKategori = $this->modelKategori->getByPrimaryKey($id);
        $data = array(
            "pages" => 'update',
            "suppliers" => $listKategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_simpan()
    {
        $kategori = array(
            "nama_kategori" => $this->input->post('nama_kategori'),
        );
        $this->modelKategori->insert($kategori);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses disimpan');
        }
        redirect("Kategori");
    }

    public function proses_update()
    {
        $id = $this->input->post("kategoriID", true);
        $nama = $this->input->post("nama_kat", true);
        $kategori = array(
            "nama_kategori" => $nama,
        );
        $this->modelKategori->update($id, $kategori);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses diupdate');
        }
        redirect("Kategori");
    }

    public function proses_delete($id)
    {
        $this->modelKategori->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("Kategori");
    }
}
