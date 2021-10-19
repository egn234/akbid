<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class login extends MY_Controller {

		public function __construct(){
			parent::__construct();
			parent::loginAuth();
		}

		public function index(){
			$this->load->view('admin/loginpage');
		}


	}

	/* End of file login.php */
	/* Location: ./application/controllers/login.php */
?>