<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pencapaian extends CI_Model {

	public function getAllPencapaian()
	{
		$sql = "SELECT * FROM tb_pencapaian";
		return $this->db->query($sql)->result();
	}

	public function getPencapaianById($staff_id)
	{
		$sql = "SELECT * FROM tb_pencapaian WHERE pencapaian_id = $staff_id";
		return $this->db->query($sql)->result();
	}

	public function inputPencapaian($judul_pencapaian, $deskripsi_pencapaian, $foto, $date, $admin_id)
	{
		$data = array(
			'judul_pencapaian' => $judul_pencapaian,
			'deskripsi_pencapaian' => $deskripsi_pencapaian,
			'foto' => $foto,
			'date_created' => $date,
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_pencapaian', $data);
	}

	public function editPencapaian($pencapaian_id,$judul_pencapaian, $deskripsi_pencapaian, $foto, $date)
	{
		$data = array(
			'judul_pencapaian' => $judul_pencapaian,
			'deskripsi_pencapaian' => $deskripsi_pencapaian,
			'date_created' => $date
		);
		if ($foto != "") {
			$data['foto'] = $foto;
		}
		$this->db->where('pencapaian_id', $pencapaian_id);
		$this->db->update('tb_pencapaian', $data);
	}

	public function deletePencapaian($pencapaian_id)
	{
		$this->db->where('pencapaian_id', $pencapaian_id);
		$this->db->delete('tb_pencapaian');
	}

}

/* End of file m_pencapaian.php */

?>
