<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class m_visi_misi extends CI_Model {

	public function getAllVisimisi()
	{
		$sql = "SELECT * FROM tb_visi_misi";
		return $this->db->query($sql)->result();
	}

	public function getVisimisiById($visi_misi_id)
	{
		$sql = "SELECT * FROM tb_visi_misi WHERE visi_misi_id = $visi_misi_id";
		return $this->db->query($sql)->result();
	}

	public function getVisimisiByStatus($status)
	{
		$sql = "SELECT * FROM tb_visi_misi WHERE status = $status";
		return $this->db->query($sql)->result();
	}

	public function	inputVisimisi($deskripsi_visi_misi, $date, $status, $admin_id)
	{
		$data = array(
			'deskripsi_visi_misi' => $deskripsi_visi_misi,
			'date_created' => $date,
			'status' => $status,
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_visi_misi', $data);
	}

	public function	editVisimisi($visi_misi_id, $deskripsi_visi_misi, $date, $status)
	{
		$data = array(
			'deskripsi_visi_misi' => $deskripsi_visi_misi,
			'date_created' => $date,
			'status' => $status
		);
		$this->db->where('visi_misi_id', $visi_misi_id);
		$this->db->update('tb_visi_misi', $data);
	}

	public function deleteVisimisi($visi_misi_id)
	{
		$this->db->where('visi_misi_id', $visi_misi_id);
		$this->db->delete('tb_visi_misi');
	}
	
	}
	
	/* End of file m_visi_misi.php */
	
?>
