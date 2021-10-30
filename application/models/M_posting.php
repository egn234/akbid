<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_posting extends CI_Model {

	public function getAllPosts(){
		$sql = "SELECT * FROM tb_posting";
		return $this->db->query($sql)->result();
	}		

}

/* End of file m_posting.php */
/* Location: ./application/models/m_posting.php */
 ?>