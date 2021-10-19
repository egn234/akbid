<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// load model here

	}

	public function loginAuth(){
		if (!is_null($this->session->userdata('praktikan_id_sess'))) {
			redirect('praktikan/dashboard');
		}
	}

	public function laboranAuth(){
		if (is_null($this->session->userdata('laboran_id_sess'))) {
			$this->alertLogin('laboran');
		}else{
			$data['s_user'] = $this->m_laboran->getLaboranById($this->session->userdata('laboran_id_sess'))[0];
			$this->load->view('laboran/header', $data);
		}
	}

	public function dosenAuth(){
		if (is_null($this->session->userdata('dosen_id_sess'))) {
			$this->alertLogin('dosen');
		}else{
			$data['s_user'] = $this->m_dosen->getDosenById($this->session->userdata('dosen_id_sess'))[0];
			$this->load->view('dosen/header', $data);
		}
	}

	public function asprakAuth(){
		if (is_null($this->session->userdata('asprak_id_sess'))) {
			$this->alertLogin('asprak');
		}else{
			$data['s_user'] = $this->m_asprak->getAsprakById($this->session->userdata('asprak_id_sess'))[0];
			$this->load->view('asprak/header', $data);
		}
	}

	public function praktikanAuth(){
		if (is_null($this->session->userdata('praktikan_id_sess'))) {
			$this->alertLogin('praktikan');
		}else{
			$data['s_user'] = $this->m_praktikan->getPraktikanById($this->session->userdata('praktikan_id_sess'))[0];
			$this->load->view('praktikan/header', $data);
		}
	}

	function alertLogin($asal){
		$alert = '<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <center>Session Expired</center>
		      </div>';
		$this->session->set_flashdata('notif_login', $alert);
		redirect('login');
	}
}

/* End of file mY_controller.php */
/* Location: ./application/controllers/mY_controller.php */
