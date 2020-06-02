<?php

class Auth extends CI_Controller {

    public function login(){
        $data["page"] = "login";
        $this->load->view("layout/login", $data);
    }

    public function proses(){
        // echo "proses";
        // $data["page"] = "login/login";
        $post =  $this->input->post(null, TRUE);
        if(isset($post['login'])){
            $this->load->model('modelUser');
            $query = $this->userModel->login($post);
            if($query->num_rows() > 0) {
                echo "Login Sukses";
            } else {
                echo "Login Gagal";
            }
        }
    }
}