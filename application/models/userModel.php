<?php
class userModel extends CI_Model{
	var $table = "user";
    var $primaryKey = "id_user";
    var $username = "username";
    var $password = "password";

    public function login($post){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;  
	}
	
	public function getByEmailAndPassword($username, $password) {
        // $where = array(
		// 	"email" => $username,
        //     // "email" => $email,
        //     // "password" => sha1($password
        // );
        $this->db->where('email', $username)->or_where('username', $username);
		$user = $this->db->get("user")->row();
		if(!$user){
			return false;
		}
		$passwordUser = $user->password;
		//2.JIka password yang dimasukkan salah
		if(!password_verify($password,$passwordUser)){
			return false;
		}
		return $user;
	}
	
	public function getByToken($token) {
        $this->db->where("token", $token);
        return $this->db->get("user")->row();
    }

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function getAll(){
		return $this->db->get($this->table)->result();
	}

	public function getJoin($id = null){
		$where = "jabatan='1' OR jabatan='2' OR jabatan='3'";
		$this->db->select('user.*, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan, pegawai.alamat_pegawai as alamat_pegawai')
		->join("pegawai", 'pegawai.id_pegawai = user.pegawai_id')
		->where($where);
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function getJoinById($id = null){
		$this->db->select('user.*, pegawai.id_pegawai as id_pegawai, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan, pegawai.alamat_pegawai as alamat_pegawai')
		->join("pegawai", 'pegawai.id_pegawai = user.pegawai_id')
		->where("id_user", $id);
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data){
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}

	// Hitung Total User
	public function hitungUser() {
		$sql = "SELECT count(id_user) as id_user FROM user";
		$result =  $this->db->query($sql);
		return $result->row()->id_user;
	}
}