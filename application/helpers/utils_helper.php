<?php

// Konversi JK
function getJenisKelaminLengkap($jk)
{
	return ($jk == "L") ? "Laki-Laki" : "Perempuan";
}
// Koversi Level
function getLevel($level)
{
	return ($level == "1") ? "Admin" : "Kasir";
}
// Send Email
function sendEmail($subject, $data, $view)
{
	$CI = &get_instance();
	$config = array(
		'useragent' => 'CodeIgniter',
		'protocol' => 'smtp',
		'mailpath' => '/usr/sbin/sendmail',
		'smtp_host' => 'smtp.gmail.com',
		'smtp_user' => 'projekrpl4@gmail.com',
		'smtp_pass' => "Arnan400",
		'smtp_port' => 465,
		'smtp_keepalive' => TRUE,
		'smtp_crypto' => 'ssl',
		'wordwrap' => TRUE,
		'wrapchars' => 76,
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'validate' => TRUE,
		'crlf' => "\r\n",
		'newline' => "\r\n",
	);
	$body = $CI->load->view("Content/Email/" . $view, $data, TRUE);
	$CI->email->initialize($config);
	$CI->email->from('projekrpl4@gmail.com', 'POS Application');
	$CI->email->to($data["email"]);
	$CI->email->subject($subject);
	$CI->email->message($body);
	if ($CI->email->send()) {
		return "1";
	} else {
		echo $CI->email->print_debugger();
		return "0";
	}
}
// Random Password
function randomPassword()
{
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}

// Create Nomer Transaksi
function getLastNomor($table)
{
	$CI = &get_instance();

	$queryMaxId = "select max(nomor) as nomor from $table where year(tanggal_transaksi) = year(now()) ";
	$queryMaxId .= "AND month(tanggal_transaksi) = month(now())";
	$nomor = $CI->db->query($queryMaxId)->row();
	return $nomor;
}

// Create Nomer Transaksi
function getLastNomorTunda($table)
{
	$CI = &get_instance();

	$queryMaxId = "select max(nomor) as nomor from $table where year(tanggal) = year(now()) ";
	$queryMaxId .= "AND month(tanggal) = month(now())";
	$nomor = $CI->db->query($queryMaxId)->row();
	return $nomor;
}

function autoCreate($prefix, $delimeter, $nomor)
{
	$s = "";
	foreach ($prefix as $value) {
		$s .= $value . $delimeter;
	}
	return $s . date("Y")
		. $delimeter
		. date("m")
		. $delimeter
		. str_pad($nomor, 4, "0", STR_PAD_LEFT);
}


//Fungsi Cek User sudah login
function checkOnLogin()
{
	$CI = &get_instance();
	if (!$CI->session->userdata('is_logged_in')) {
		redirect("login");
		// die();
	}
}

function isSuperAdmin()
{
	checkOnLogin();
	$CI = &get_instance();
	if ($CI->session->userdata('level') != "superadmin") {
		redirect("errors/forbidden");
		die();
	}
}

function isKasir()
{
	checkOnLogin();
	$CI = &get_instance();
	if ($CI->session->userdata('level') != "kasir") {
		redirect("errors/forbidden");
		die();
	}
}

function isAdmin()
{
	checkOnLogin();
	$CI = &get_instance();
	if ($CI->session->userdata('level') != "admin") {
		redirect("errors/forbidden");
		die();
	}
}

// Konversi supplier by id supplier
function convertSupplier($id)
{
	$CI = &get_instance();
	$covert = $CI->db->query("select nama_supplier as nama_supplier from supplier where id_supplier = '$id'");
	return $covert->row()->nama_supplier;
}
// Konversi Level by Id User
function convertidUsertoLevel($id)
{
	$CI = &get_instance();
	$covert = $CI->db->query("select level as level from user where id_user = '$id'");
	return $covert->row()->level;
	// return ($hasil == "1") ? "Admin" : "Kasir";
}
// Konversi Jumlah Item by Id Transaksi
function convertidTransaksitoJumlahItem($id)
{
	$CI = &get_instance();
	$covert = $CI->db->query("select SUM(qty_item_transaksi) as qty_item_transaksi from item_transaksi where id_transaksi = '$id'");
	return $covert->row()->qty_item_transaksi;
}

// Fungsi Cek User jika belum Login
function checkNoLogin()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('idUser');
	if (!$user_session) {
		redirect('Login');
	}
}

// Format Rupiah
function formatRupiah($angka)
{
	return "Rp." . number_format($angka, 2, ",", ".") . ",-";
}

// Cek Role Akses
function roleAkses()
{
	$ci = &get_instance();
	$ci->load->library('Fungsi');
	if ($ci->fungsi->user_login()->level != 'superadmin') {
		redirect('welcome');
	}
}

function roleAkses2()
{
	$ci = &get_instance();
	$ci->load->library('Fungsi');
	if ($ci->fungsi->user_login()->level == 'kasir') {
		redirect('welcome');
	}
}

//Pesan Sukses
function show_succ_msg($content = '', $size = '14px')
{
	if ($content != '') {
		return   '<p class="box-msg">
				  <div class="info-box alert-success">
					  <div class="info-box-icon">
						  <i class="fa fa-check-circle"></i>
					  </div>
					  <div class="info-box-content" style="font-size:' . $size . '">
						' . $content
			. '</div>
				  </div>
				</p>';
	}
}
//Pesan Error
function show_err_msg($content = '', $size = '14px')
{
	if ($content != '') {
		return   '<p class="box-msg">
				  <div class="info-box alert-error">
					  <div class="info-box-icon">
						  <i class="fa fa-warning"></i>
					  </div>
					  <div class="info-box-content" style="font-size:' . $size . '">
						' . $content
			. '</div>
				  </div>
				</p>';
	}
}

function bulan($bln)
{
	$bulan = $bln;
	switch ($bulan) {
		case 1:
			$bulan = "Januari";
			break;
		case 2:
			$bulan = "Februari";
			break;
		case 3:
			$bulan = "Maret";
			break;
		case 4:
			$bulan = "April";
			break;
		case 5:
			$bulan = "Mei";
			break;
		case 6:
			$bulan = "Juni";
			break;
		case 7:
			$bulan = "Juli";
			break;
		case 8:
			$bulan = "Agustus";
			break;
		case 9:
			$bulan = "September";
			break;
		case 10:
			$bulan = "Oktober";
			break;
		case 11:
			$bulan = "November";
			break;
		case 12:
			$bulan = "Desember";
			break;
	}
	return $bulan;
}
