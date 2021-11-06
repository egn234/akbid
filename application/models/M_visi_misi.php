<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class m_visi_misi extends CI_Model {

	public function getAllVisimisi()
	{
		$this->db->order_by('status', 'ASC');
		$query = $this->db->get('tb_visi_misi');
		return $query->result();
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

	public function	inputVisimisi($deskripsi_visi_misi, $date, $admin_id)
	{
		$data = array(
			'deskripsi_visi_misi' => $deskripsi_visi_misi,
			'date_created' => $date,
			'status' => 'aktif',
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_visi_misi', $data);
	}

	public function	editVisimisi($visi_misi_id, $deskripsi_visi_misi, $date)
	{
		$data = array(
			'deskripsi_visi_misi' => $deskripsi_visi_misi,
			'date_created' => $date
		);
		$this->db->where('visi_misi_id', $visi_misi_id);
		$this->db->update('tb_visi_misi', $data);
	}

	public function deleteVisimisi($visi_misi_id)
	{
		$this->db->where('visi_misi_id', $visi_misi_id);
		$this->db->delete('tb_visi_misi');
	}

	public function turnOn($visi_misi_id)
	{
		$sql = "UPDATE tb_visi_misi SET status ='aktif' WHERE visi_misi_id = $visi_misi_id";
		return $this->db->query($sql);
	}

	public function turnOff($visi_misi_id)
	{
		$sql = "UPDATE tb_visi_misi SET status ='non-aktif' WHERE visi_misi_id != $visi_misi_id";
		return $this->db->query($sql);
	}

	public function turnOffAll()
	{
		$sql = "UPDATE tb_visi_misi SET status ='non-aktif'";
		return $this->db->query($sql);
	}
	
	}
	
	/* End of file m_visi_misi.php */
	
?>
