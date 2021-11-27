<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

	public function getAllAdmin(){
		$sql = "SELECT * FROM tb_admin";
		return $this->db->query($sql)->result();
	}

	public function getAdminById($admin_id){
		$sql = "SELECT * FROM tb_admin WHERE admin_id = $admin_id";
		return $this->db->query($sql)->result();
	}

	public function getAdminByUsername($username){
		$sql = "SELECT * FROM tb_admin WHERE username = '$username'";
		return $this->db->query($sql)->result();
	}

	public function cekAdminById($admin_id){
		$sql = "SELECT count(admin_id) AS hitung FROM tb_admin WHERE admin_id = $admin_id";
		return $this->db->query($sql)->result();
	}

	public function cekAdminByUsername($username){
		$sql = "SELECT count(admin_id) AS hitung FROM tb_admin WHERE username = '$username'";
		return $this->db->query($sql)->result();
	}

	public function updateAdmin($nama, $email, $nomor_telp, $password, $username, $foto, $admin_id){
		$sql = "UPDATE tb_admin SET
			nama = '$nama',
			email = '$email',
			nomor_telp = '$nomor_telp',
			password = '$password',
			username = '$username',
			foto = '$foto'
			WHERE admin_id = $admin_id";

		$this->db->query($sql);
	}
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */


?>