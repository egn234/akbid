<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_galeriut extends CI_Model {

	public function getAllGaleriut(){
		$sql = "SELECT * FROM tb_galeri_utama";
		return $this->db->query($sql)->result();
	}

	public function getGaleriutById($galeri_utama_id){
		$sql = "SELECT * FROM tb_galeri_utama WHERE galeri_utama_id = $galeri_utama_id";
		return $this->db->query($sql)->result();
	}

	public function insertGaleriut($judul, $foto){
		$object = array(
			'judul' => $judul,
			'foto' => $foto,
			'date_created' => date('Y-m-d H:i:s'),
			'admin_id' => $this->session->userdata('admin_id_sess')
		);

		$this->db->insert('tb_galeri_utama', $object);
	}

	public function deleteGaleriut($galeri_utama_id)
	{
		$this->db->where('galeri_utama_id', $galeri_utama_id);
		$this->db->delete('tb_galeri_utama');
	}
}

/* End of file m_galeriut.php */
/* Location: ./application/models/m_galeriut.php */
