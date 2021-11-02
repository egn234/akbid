<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_galerik extends CI_Model {

	public function getAllGaleriK(){
		$sql = "SELECT * FROM tb_galeri_kegiatan";
		return $this->db->query($sql)->result();
	}

	public function getGaleriKById($galeri_kegiatan_id){
		$sql = "SELECT * FROM tb_galeri_kegiatan WHERE galeri_kegiatan_id = $galeri_kegiatan_id";
		return $this->db->query($sql)->result();
	}

	public function insertPosts($judul, $foto){
		$object = array(
			'judul' => $judul,
			'foto' => $foto,
			'date_created' => date('Y-m-d H:i:s'),
			'admin_id' => $this->session->userdata('admin_id_sess')
		);

		$this->db->insert('tb_galeri_kegiatan', $object);
	}
}

/* End of file m_galerik.php */
/* Location: ./application/models/m_galerik.php */
 ?>