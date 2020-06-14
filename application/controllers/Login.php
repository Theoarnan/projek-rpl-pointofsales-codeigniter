<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
    }

    public function index()
    {
        // checkOnLogin();

        $data["page"] = "login";
        $data["header"] = "Login POSApp";
        $this->load->view("layout/login", $data);
    }

    public function proses()
    {
        $username =  $this->input->post("email", TRUE);
        // $email =  $this->input->post("username", TRUE);
        $password =  $this->input->post("password", TRUE);
        $user = $this->UserModel->getByEmailAndPassword($username, $password);
        if ($user == null) {
            $this->session->set_flashdata('error', 'Username atau Email dan Password anda tidak ditemukan!');
            redirect("login");
        } else {
            if ($user->is_active == "0") {
                // $this->error_login("Silahkan aktivasi akun anda");
                $this->session->set_flashdata('error', 'Akun Anda belum di aktivasi!');
                redirect("login");
            }
            if ($user->first_login == "1") {
                $this->session->set_userdata(array("idUser" => $user->id_user));
                $this->session->set_flashdata('success', 'Silahkan masukkan password baru anda!');
                redirect("login/firstLogin");
            }
            // Apa yang mau dikirimkan melalui session
            $dataSession = array(
                "idUser" => $user->id_user,
                "username" => $user->username,
                "email" => $user->email,
                "level" => $user->level,
                "is_active" => $user->is_active,
                "is_logged_in" => true
            );
            $this->session->set_userdata($dataSession);
            $this->session->set_flashdata('success', 'Selamat datang di POS Application  ' . $user->username);
            redirect("Welcome");
            

        }
        // $post =  $this->input->post(null, TRUE);
        // if (isset($post['login'])) {
        //     $this->load->model('userModel');
        //     $query = $this->userModel->login($post);
        //     if ($query->num_rows() > 0) {
        //         // echo "Login Sukses";
        //         $row = $query->row();
        //         $params = array(
        //             'idUser' => $row->id_user,
        //             'level' => $row->level
        //         );
        //         $this->session->set_userdata($params);
        //         echo "<script>
        //             alert('Selamat, Login Berhasil');
        //             window.location='".site_url('Welcome')."';
        //         </script>";
        //     } else {
        //         echo "<script>
        //         alert('Ops, Login Gagal');
        //         window.location='".site_url('Login')."';
        //     </script>";;
        //     }
        // }
    }

    public function firstLogin()
    {
        $idUser = $this->session->userdata("idUser");
        if ($idUser == null) {
            redirect("login/logout");
        }
        $this->load->view("layout/first_login");
    }

    public function saveNewPassword()
    {
        $password = $this->input->post("password");
        $idUser = $this->session->userdata("idUser");
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'first_login' => "0"
        );
        $this->load->model("UserModel");
        $this->UserModel->update($idUser, $data);
        $user = $this->UserModel->getByPrimaryKey($idUser);
        $dataSession = array(
            "idUser" => $user->id_user,
            "username" => $user->username,
            "email" => $user->email,
            "level" => $user->level,
            "is_logged_in" => true
        );
        $this->session->set_userdata($dataSession);
        redirect("welcome");
    }

    public function error_login($pesan)
    {

        echo $pesan;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
