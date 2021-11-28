<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_about extends CI_Model {

	public function getAllAbout()
	{
		$sql = "SELECT * FROM tb_about";
		return $this->db->query($sql)->result();
	}

	public function getAboutById($about_id)
	{
		$sql = "SELECT * FROM tb_about WHERE about_id = $about_id";
		return $this->db->query($sql)->result();
	}

	public function inputAbout($judul_about, $deskripsi_about, $file, $date, $admin_id)
	{
		$data = array(
			'judul_about' => $judul_about,
			'deskripsi_about' => $deskripsi_about,
			'file' => $file,
			'date_created' => $date,
			'admin_id' => $admin_id
		);

		$this->db->insert('tb_about', $data);
	}

	public function editAbout($about_id, $judul_about, $deskripsi_about, $file, $date)
	{
		$data = array(
			'judul_about' => $judul_about,
			'deskripsi_about' => $deskripsi_about,
			'date_created' => $date
		);
		if ($file != "") {
			$data['file'] = $file;
		}
		$this->db->where('about_id', $about_id);
		$this->db->update('tb_about', $data);
	}

	public function deleteAbout($about_id)
	{
		$this->db->where('about_id', $about_id);
		$this->db->delete('tb_about');
	}

	public function getAboutWithLimit($halaman_awal, $batas)
	{
		$this->db->order_by('date_created', 'DESC');
		$query = $this->db->get('tb_about', $batas, $halaman_awal);
		// $sql = "SELECT * FROM tb_posting LIMIT $halaman_awal, $batas";
		return $query->result();
	}

}

/* End of file M_layanan.php */
