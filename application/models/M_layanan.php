<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_layanan extends CI_Model {

	public function getAllLayanan()
	{
		$sql = "SELECT * FROM tb_layanan";
		return $this->db->query($sql)->result();
	}

	public function getLayananById($staff_id)
	{
		$sql = "SELECT * FROM tb_layanan WHERE layanan_id = $staff_id";
		return $this->db->query($sql)->result();
	}

	public function inputlayanan($judul_layanan, $deskripsi_layanan, $file, $date, $admin_id)
	{
		$data = array(
			'judul_layanan' => $judul_layanan,
			'deskripsi_layanan' => $deskripsi_layanan,
			'file' => $file,
			'date_created' => $date,
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_layanan', $data);
	}

	public function editLayanan($layanan_id, $judul_layanan, $deskripsi_layanan, $file, $date)
	{
		$data = array(
			'judul_layanan' => $judul_layanan,
			'deskripsi_layanan' => $deskripsi_layanan,
			'date_created' => $date
		);
		if ($file != "") {
			$data['file'] = $file;
		}
		$this->db->where('layanan_id', $layanan_id);
		$this->db->update('tb_layanan', $data);
	}

	public function deleteLayanan($layanan_id)
	{
		$this->db->where('layanan_id', $layanan_id);
		$this->db->delete('tb_layanan');
	}

}

/* End of file M_layanan.php */

?>
