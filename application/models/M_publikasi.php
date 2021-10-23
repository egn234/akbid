<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_publikasi extends CI_Model {

	public function getAllPublikasi(){
		$sql = "SELECT * FROM tb_publikasi";
		return $this->db->query($sql)->result();
	}

	public function getPublikasiById($publikasi_id){
		$sql = "SELECT * FROM tb_publikasi WHERE publikasi_id = $publikasi_id";
		return $this->db->query($sql)->result();
	}

	public function insertPublikasi($judul_publikasi, $deskripsi_publikasi, $foto){
		$object = array(
			'judul_publikasi' => $judul_publikasi,
			'deskripsi_publikasi' => $deskripsi_publikasi,
			'foto' => $foto,
			'date_created' => date('Y-m-d H:i:s'),
			'admin_id' => $this->session->userdata('admin_id_sess')
		);

		$this->db->insert('tb_publikasi', $object);
	}

	public function updatePublikasi($judul_publikasi, $deskripsi_publikasi, $foto, $publikasi_id){
		$sql = "UPDATE tb_publikasi SET
			judul_publikasi = '$judul_publikasi',
			deskripsi_publikasi = '$deskripsi_publikasi',
			foto = '$foto',
			WHERE publikasi_id = $publikasi_id";

		$this->db->query($sql);
	}
}

/* End of file m_publikasi.php */
/* Location: ./application/models/m_publikasi.php */
 ?>