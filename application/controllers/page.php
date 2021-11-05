<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {

	public function index(){
		$this->load->view('homepage/home');
	}

	public function about()
	{
		$this->load->view('homepage/about');
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
