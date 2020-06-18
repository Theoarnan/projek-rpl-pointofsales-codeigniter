<?php
class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        roleAkses2();
        $this->load->model(['ModelBarang', 'ModelKategori']);
    }

    public function index()
    {
        $listBarang = $this->ModelBarang->getJoin();
        $data = array(
            "page" => "Content/Barang/v_list_item",
            "header" => "Daftar Barang",
            "barangs" => $listBarang
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Generate Barcode dan QR Code berdasarkan Kode Barcodenya
    public function createBarcode($id)
    {
        $listBarang = $this->ModelBarang->getByPrimaryKey($id);
        $data = array(
            "page" => "Content/Barang/barcode",
            "header" => "Daftar Barang",
            "barangs" => $listBarang
        );
        $this->load->view("layout/dashboard", $data);
    }

    // Cetak data Barang
    function printDataBarang()
    {
        $listBarang = $this->ModelBarang->getJoin();
        $data = array(
            "barangs" => $listBarang,
        );
        $html = $this->load->view('Content/Barang/print/databarang_print', $data, true);
        $this->fungsi->createPDF($html, 'PrintBarcode', 'A4', 'potrait');
    }

    // Cetak barcode
    function printBarcode($id)
    {
        $listBarang = $this->ModelBarang->getByPrimaryKey($id);
        $data = array(
            "barangs" => $listBarang
        );
        $html = $this->load->view('Content/Barang/print/barcode_print', $data, true);
        $this->fungsi->createPDF($html, 'barcode-' . $listBarang->barcode_barang, 'A4', 'landscape');
    }

    // Cetak QR CODE
    function printQrCode($id)
    {
        $listBarang = $this->ModelBarang->getByPrimaryKey($id);
        $data = array(
            "barangs" => $listBarang
        );
        $html = $this->load->view('Content/Barang/print/qrcode_print', $data, true);
        $this->fungsi->createPDF($html, 'qrcode-' . $listBarang->barcode_barang, 'A4', 'landscape');
    }

    public function register()
    {
        $barang = new stdClass();
        $barang->id_barang = null;
        $barang->nama_barang = null;
        $barang->stock_barang = "0";
        $barang->harga_barang = null;
        $barang->barcode_barang = null;
        $barang->kategori_id = null;
        $barang->kemasan_barang = null;
        $barang->detail_barang = null;
        $barang->gambar_barang = null;
        // $barang = $this->modelBarang->getAll();
        $kategori = $this->ModelKategori->getAll();

        $data = array(
            "header" => "Tambah Data Barang",
            "page" => "Content/Barang/v_from_item",
            "pages" => 'register',
            "barangs" => $barang,
            "kategories" => $kategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function update($id)
    {
        $listBarang = $this->ModelBarang->getByPrimaryKey($id);
        $kategori = $this->ModelKategori->getAll();

        $data = array(
            "header" => "Ubah Data Barang",
            "page" => "Content/Barang/v_from_item",
            "pages" => 'updates',
            "barangs" => $listBarang,
            "kategories" => $kategori
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_simpan()
    {
        // Upload gambar
        $config['upload_path'] = './images/barang/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '.5000';
        $config['file_name'] = 'barang-' . date('ymd') . '-' . substr(md5(rand()), 0, 100000);
        $this->load->library('upload', $config);
        $B = $this->input->post(null, TRUE);
        if (isset($_POST['register'])) {
            if ($this->ModelBarang->cek_barcode($B['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Data Barcode sudah di pakai!");
                redirect("Barang/register");
            } else {
                // Data inputan
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $C = $B['gambar'] = $this->upload->data('file_name');
                        $barang = array(
                            "nama_barang" => $this->input->post('nama_barang'),
                            "harga_barang" => $this->input->post('harga_barang'),
                            "barcode_barang" => $this->input->post('barcode'),
                            "kemasan_barang" => $this->input->post('kemasan_barang'),
                            "kategori_id" => $this->input->post('kategori'),
                            "detail_barang" => $this->input->post('detail_barang'),
                            "gambar_barang" => $C,
                        );
                        $this->ModelBarang->insert($barang);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Sukses disimpan');
                        }
                        redirect("Barang/register");
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('Barang/register');
                    }
                    //Jika Upload tanpa gambar
                } else {
                    $B['gambar'] = null;
                    $barang = array(
                        "nama_barang" => $this->input->post('nama_barang'),
                        "harga_barang" => $this->input->post('harga_barang'),
                        "barcode_barang" => $this->input->post('barcode'),
                        "kemasan_barang" => $this->input->post('kemasan_barang'),
                        "kategori_id" => $this->input->post('kategori'),
                        "detail_barang" => $this->input->post('detail_barang'),
                        "gambar_barang" => $this->input->post('gambar'),
                    );
                    $this->ModelBarang->insert($barang);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Sukses disimpan');
                    }
                    redirect("Barang");
                }
            }
            // Function jika update data Barang
        } else if (isset($_POST['updates'])) {
            $id = $this->input->post("id_barang", true);
            if ($this->ModelBarang->cek_barcode($B['barcode'], $B['id_barang'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode Barcode sudah di pakai!");
                redirect('Barang/update/' . $id);
            } else {
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        // Hapus gambar lama
                        $brg =  $this->ModelBarang->getByPrimaryKey($B['id_barang']);
                        if ($brg->gambar_barang != null) {
                            $filehapus = './images/barang/' . $brg->gambar_barang;
                            unlink($filehapus);
                        }
                        $C = $B['gambar'] = $this->upload->data('file_name');
                        $barang = array(
                            "nama_barang" => $this->input->post('nama_barang'),
                            "harga_barang" => $this->input->post('harga_barang'),
                            "barcode_barang" => $this->input->post('barcode'),
                            "kemasan_barang" => $this->input->post('kemasan_barang'),
                            "kategori_id" => $this->input->post('kategori'),
                            "detail_barang" => $this->input->post('detail_barang'),
                            "gambar_barang" => $C,
                        );
                        if ($B['gambar'] != null) {
                            $barang['gambar_barang'] = $B['gambar'];
                        }
                        $this->ModelBarang->update($id, $barang);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Sukses diupdate');
                        }
                        redirect("Barang");
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('Barang');
                    }
                } else {
                    $B['gambar'] = null;
                    $barang = array(
                        "nama_barang" => $this->input->post('nama_barang'),
                        "harga_barang" => $this->input->post('harga_barang'),
                        "barcode_barang" => $this->input->post('barcode'),
                        "kemasan_barang" => $this->input->post('kemasan_barang'),
                        "kategori_id" => $this->input->post('kategori'),
                        "detail_barang" => $this->input->post('detail_barang'),
                        // "gambar_barang" => $this->input->post('gambar'),
                    );
                    if ($B['gambar'] != null) {
                        $barang['gambar_barang'] = $B['gambar'];
                    }
                    $this->ModelBarang->update($id, $barang);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Sukses disimpan');
                    }
                    redirect("Barang");
                }
            }
        }
    }

    public function detail($id)
    {
        $brg =  $this->ModelBarang->getJoin($id);
        $data = array(
            "header" => "Detail Barang",
            "barang" => $brg,
            "page" => "Content/Barang/v_detail_barang"
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_delete($id)
    {
        $brg =  $this->ModelBarang->getByPrimaryKey($id);
        if ($brg->gambar_barang != null) {
            $filehapus = './images/barang/' . $brg->gambar_barang;
            unlink($filehapus);
        }
        $this->ModelBarang->delete($id);
    }
}
