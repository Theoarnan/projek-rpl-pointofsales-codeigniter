<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkNoLogin();
        roleAkses();
        $this->load->model(['userModel', 'modelPegawai']);
    }

    public function index()
    {
        $listUser = $this->userModel->getJoin();
        $data = array(
            "page" => "content/User/v_list_user",
            "users" => $listUser,
            "header" => "Daftar User"
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function register()
    {
        $user = new stdClass();
        $user->id_user = null;
        $user->username = null;
        $user->email = "0";
        $user->password = null;
        $user->level = null;
        $user->is_active = null;
        $user->pegawai_id = null;

        $pegawai = $this->modelPegawai->getJoinJabatan();

        $data = array(
            "header" => "Tambah Data User",
            "page" => "content/User/v_add_user",
            "pegawais" => $pegawai,
            "users" => $user,
        );
        $this->load->view("layout/dashboard", $data);
    }

    public function proses_simpan()
    {
        $user = $this->input->post();
        $passwordRandom = randomPassword();
        $passwordRandom = randomPassword();
		$user["password"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
        $user["token"] = md5($user["email"]);
        $user["first_login"] = 1;
        $this->userModel->insert($user);
		$user["password_generated"] = $passwordRandom;
        sendEmail("Aktivasi Akun",$user, "register");
        redirect("User");
    }

    // Aktivasi Akun
    public function aktivasi($token)
    {
        $user = $this->userModel->getByToken($token);
        $data = array("is_active" => 1);
        $this->userModel->update($user->id_user, $data);
        redirect("login");
    }

    // Reset Password
    public function reset_password() {
		//1. ambil parameter form
		$idUser = $this->input->post("id_user");
		//2. buat objek user
		$user = $this->userModel->getByPrimaryKey($idUser);
		//3. buat random password
		$passwordRandom = randomPassword();
		//4. set random password ke objek user
		$user = (array) $user;
		$user["password"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
		$user["first_login"] = 1;
		//5. simpan user
		$this->userModel->update($idUser,$user);
		$user["password_generated"] = $passwordRandom;
		echo sendEmail("Reset Password",$user,"Reset");
	}

    public function update($id)
    {
        $listUser = $this->userModel->getByPrimaryKey($id);
        $data = array(
            "users" => $listUser,
            "page" => "content/User/v_update_user",
            "header" => "Ubah Data User",
        );
        $this->load->view("layout/dashboard", $data);
    }

    // public function proses_update()
    // {
    //     $id = $this->input->post("id_user", true);
    //     $users = array(
    //         // "nama" => $this->input->post("namas",true),
    //         "username" => $this->input->post("username", true),
    //         "email" => $this->input->post("email", true),
    //         "level" => $this->input->post("rolelevel", true),
    //         "token" => md5($this->input->post("email", true)),
    //         "password" => sha1($this->input->post("password", true))
    //     );
    //     $this->userModel->update($id, $users);
    //     if ($this->db->from('user')->where("is_active" != 1)) {
    //         $this->sendEmail($users);
    //         redirect("User");
    //     }
    //     redirect("User");
    // }

    public function proses_hapus($id)
    {
        $this->userModel->delete($id);
        redirect("User");
    }
}
