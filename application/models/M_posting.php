<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_posting extends CI_Model {

	public function getAllPosts(){
		$sql = "SELECT * FROM tb_posting";
		return $this->db->query($sql)->result();
	}

	public function getPostsById($posting_id){
		$sql = "SELECT * FROM tb_posting WHERE posting_id = $posting_id";
		return $this->db->query($sql)->result();
	}

	public function insertPosts($judul_posting, $deskripsi_posting, $foto){
		$object = array(
			'judul_posting' => $judul_posting,
			'deskripsi_posting' => $deskripsi_posting,
			'foto' => $foto,
			'date_created' => date('Y-m-d H:i:s'),
			'admin_id' => $this->session->userdata('admin_id_sess')
		);

		$this->db->insert('tb_posting', $object);
	}

	public function updatePosts($judul_posting, $deskripsi_posting, $foto, $posting_id){
		$sql = "UPDATE tb_posting SET
			judul_posting = '$judul_posting',
			deskripsi_posting = '$deskripsi_posting',
			foto = '$foto',
			WHERE posting_id = $posting_id";

		$this->db->query($sql);
	}

}

/* End of file m_posting.php */
/* Location: ./application/models/m_posting.php */
 ?>