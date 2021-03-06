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

	public function insertPublikasi($judul_publikasi, $deskripsi_publikasi, $file_upload){
		$object = array(
			'judul_publikasi' => $judul_publikasi,
			'deskripsi_publikasi' => $deskripsi_publikasi,
			'file_upload' => $file_upload,
			'date_created' => date('Y-m-d H:i:s'),
			'admin_id' => $this->session->userdata('admin_id_sess')
		);

		$this->db->insert('tb_publikasi', $object);
	}

	public function updatePublikasi($judul_publikasi, $deskripsi_publikasi, $file_upload, $publikasi_id){
		$sql = "UPDATE tb_publikasi SET
			judul_publikasi = '$judul_publikasi',
			deskripsi_publikasi = '$deskripsi_publikasi',
			file_upload = '$file_upload'
			WHERE publikasi_id = $publikasi_id";

		$this->db->query($sql);
	}

	public function getPublikasiWithLimit($halaman_awal, $batas)
	{
		$this->db->order_by('date_created', 'DESC');
		$query = $this->db->get('tb_publikasi', $batas, $halaman_awal);
		// $sql = "SELECT * FROM tb_posting LIMIT $halaman_awal, $batas";
		return $query->result();
	}
}

/* End of file m_publikasi.php */
/* Location: ./application/models/m_publikasi.php */
 ?>
