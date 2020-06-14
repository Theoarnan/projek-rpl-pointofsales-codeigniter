<?php

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        checkActive();
        roleAkses();
        $this->load->model("ModelKategori");
    }

    public function index()
    {
        $listKategori = $this->ModelKategori->getAll();
        $data = array(
            "page" => "Content/KategoriBrg/v_list_kat",
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
            "page" => "Content/KategoriBrg/modal",
            "pages" => 'register',
            "suppliers" => $kategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function update($id)
    {
        $listKategori = $this->ModelKategori->getByPrimaryKey($id);
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
        $this->ModelKategori->insert($kategori);
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
        $this->ModelKategori->update($id, $kategori);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses diupdate');
        }
        redirect("Kategori");
    }

    public function proses_delete($id)
    {
        $this->ModelKategori->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("Kategori");
    }
}
