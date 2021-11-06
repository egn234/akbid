<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_visi_misi');
		$this->load->model('M_kerja_sama');
		
	}
	
	public function index(){
		$this->load->view('homepage/home');
	}

	public function Visimisi()
	{
		$data = $this->M_visi_misi->getAllVisimisi();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/visimisi');
	}

	public function Kerjasama()
	{
		$data = $this->M_kerja_sama->getAllKerjasama();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/kerja_sama');
	}

	public function contact()
	{
		$this->load->view('homepage/contact');
	}

	public function blog()
	{
		
		$this->load->view('homepage/blog');
	}
	
	public function blog_details()
	{
		$this->load->view('homepage/blog_details');
		
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */

?>
