<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_kerja_sama extends CI_Model {

	public function getAllKerjasama()
	{
		$sql = "SELECT * FROM tb_kerja_sama";
		return $this->db->query($sql)->result();
	}

	public function getKerjasamaById($kerja_sama_id)
	{
		$sql = "SELECT * FROM tb_kerja_sama WHERE kerja_sama_id = $kerja_sama_id";
		return $this->db->query($sql)->result();
	}

	public function	inputKerjasama($deskripsi_kerja_sama, $date, $status, $admin_id)
	{
		$data = array(
			'deskripsi_kerja_sama' => $deskripsi_kerja_sama,
			'date_created' => $date,
			'status' => $status,
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_kerja_sama', $data);
	}

	public function	editKerjasama($kerja_sama_id, $deskripsi_kerja_sama, $date, $status)
	{
		$data = array(
			'deskripsi_kerja_sama' => $deskripsi_kerja_sama,
			'date_created' => $date,
			'status' => $status
		);
		$this->db->where('kerja_sama_id', $kerja_sama_id);
		$this->db->update('tb_kerja_sama', $data);
	}

	public function deleteKerjasama($kerja_sama_id)
	{
		$this->db->where('kerja_sama_id', $kerja_sama_id);
		$this->db->delete('tb_kerja_sama');
	}

}

/* End of file m_kerja_sama.php */
