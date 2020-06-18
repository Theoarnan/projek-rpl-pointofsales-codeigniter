<?php

class Pegawai extends CI_Controller {

    public function __construct(){
        parent::__construct();
        checkNoLogin();
        roleAkses2();
        $this->load->model("ModelPegawai");
    }
    
    public function index(){
        $listPegawai = $this->ModelPegawai->getAll();
        $data = array(
            "page" => "Content/Pegawai/v_list_pegawai",
            "header" => "Daftar Pegawai",
            "pegawais" => $listPegawai
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function register(){
        $data = array(
            "header" => "Tambah Data Pegawai",
            "page" => "Content/Pegawai/v_add_pegawai"
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_simpan(){
        $pegawai = array(
            "nama_pegawai" => $this->input->post('nama'),
            "alamat_pegawai" => $this->input->post('alamat'),
            "jenis_kelamin" => $this->input->post('jk'),
            "jabatan" => $this->input->post('jbtn'),
            "no_telp" => $this->input->post('nomer')
        );
        $this->ModelPegawai->insert($pegawai);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses disimpan');
        }
        redirect('Pegawai/register');
    }

    public function update($id){
        $listPegawai = $this->ModelPegawai->getByPrimaryKey($id);
        $data = array(
            "pegawais" => $listPegawai,
            "page" => "Content/Pegawai/v_update_pegawai"
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_update(){
		$id = $this->input->post("id_pegawai", true);
		$nama = $this->input->post("nama",true);
		$alamat = $this->input->post("alamat",true);
		$jk = $this->input->post("jk",true);
        $jbtn = $this->input->post("jbtn",true);
        $nomer = $this->input->post("nomer",true);
		$pegawais = array(
			"nama_pegawai" => $nama,
            "alamat_pegawai" => $alamat,
            "jenis_kelamin" => $jk,
            "jabatan" => $jbtn,
            "no_telp" => $nomer
		);
        $this->ModelPegawai->update($id, $pegawais);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses diupdate');
        }
		redirect("Pegawai");
    }
    
    public function proses_hapus($id) {
		$this->ModelPegawai->delete($id);
		redirect("Pegawai");
    }
    
    // Cetak data Barang
    function printDataPegawai()
    {
        $listPegawai = $this->ModelPegawai->getAll();
        $data = array(
            "pegawais" => $listPegawai,
        );
        $html = $this->load->view('Content/Pegawai/print/datapegawai_print', $data, true);
        $this->fungsi->createPDF($html, 'Print Data Pegawai', 'A4', 'potrait');
    }
}