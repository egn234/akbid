<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_kerja_sama extends CI_Model {

	public function getAllKerjasama()
	{
		$this->db->order_by('status', 'ASC');
		$query = $this->db->get('tb_kerja_sama');
		return $query->result();
	}

	public function getKerjasamaById($kerja_sama_id)
	{
		$sql = "SELECT * FROM tb_kerja_sama WHERE kerja_sama_id = $kerja_sama_id";
		return $this->db->query($sql)->result();
	}

	public function	inputKerjasama($deskripsi_kerja_sama, $date, $admin_id)
	{
		$data = array(
			'deskripsi_kerja_sama' => $deskripsi_kerja_sama,
			'date_created' => $date,
			'status' => 'aktif',
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_kerja_sama', $data);
	}

	public function	editKerjasama($kerja_sama_id, $deskripsi_kerja_sama, $date)
	{
		$data = array(
			'deskripsi_kerja_sama' => $deskripsi_kerja_sama,
			'date_created' => $date
		);
		$this->db->where('kerja_sama_id', $kerja_sama_id);
		$this->db->update('tb_kerja_sama', $data);
	}

	public function deleteKerjasama($kerja_sama_id)
	{
		$this->db->where('kerja_sama_id', $kerja_sama_id);
		$this->db->delete('tb_kerja_sama');
	}

	public function turnOn($kerja_sama_id)
	{
		$sql = "UPDATE tb_kerja_sama SET status ='aktif' WHERE kerja_sama_id = $kerja_sama_id";
		return $this->db->query($sql);
	}

	public function turnOff($kerja_sama_id)
	{
		$sql = "UPDATE tb_kerja_sama SET status ='non-aktif' WHERE kerja_sama_id != $kerja_sama_id";
		return $this->db->query($sql);
	}

	public function turnOffAll()
	{
		$sql = "UPDATE tb_kerja_sama SET status ='non-aktif'";
		return $this->db->query($sql);
	}

}

/* End of file m_kerja_sama.php */
