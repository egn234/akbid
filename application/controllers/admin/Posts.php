<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class posts extends MY_Controller {

	public function __construct(){
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_posting');
	}

	public function index(){
		redirect('admin/posts/list');
	}

	public function list(){
		$data['posting'] = $this->m_posting->getAllPosts();
		$this->load->view('admin/posts/list_posting', $data);
	}

}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */

?>