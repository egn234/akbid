<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class kerja_sama extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();
		$this->load->model('M_kerja_sama');
	}

	public function index()
	{
		$data = $this->M_kerja_sama->getAllKerjasama();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/kerja_sama/list_kerja_sama');
	}

	public function create_kerja_sama()
	{
		$this->load->view('admin/kerja_sama/create_kerja_sama');
	}

	public function detail_kerja_sama()
	{
		$query['data'] = $this->M_kerja_sama->getKerjasamaById($_GET['id']);
		$this->load->view('admin/kerja_sama/detail_kerja_sama', $query);
	}

	public function update_kerja_sama()
	{
		$query['data'] = $this->M_kerja_sama->getKerjasamaById($_GET['id']);
		$this->load->view('admin/kerja_sama/update_kerja_sama', $query);
	}

	public function save_kerja_sama()
	{
		$this->M_kerja_sama->turnOffAll();
		$deskripsi_kerja_sama = $this->input->post('deskripsi_kerja_sama');
		$date = $this->input->post('date_created');
		$admin_id =	$this->session->userdata('admin_id_sess');

		$this->M_kerja_sama->inputKerjasama($deskripsi_kerja_sama, $date, $admin_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/kerja_sama');
	}

	public function edit_kerja_sama()
	{
		$kerja_sama_id = $this->input->post('kerja_sama_id');
		$deskripsi_kerja_sama = $this->input->post('deskripsi_kerja_sama');
		$date = $this->input->post('date_created');

		$old_file = $this->input->post('old_file');

		$this->M_kerja_sama->editKerjasama($kerja_sama_id, $deskripsi_kerja_sama, $date);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/kerja_sama/detail_kerja_sama?id=' . $kerja_sama_id);
	}

	public function change_status($kerja_sama_id)
	{
		$this->M_kerja_sama->turnOff($kerja_sama_id);
		$this->M_kerja_sama->turnOn($kerja_sama_id);

		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Status Berhasil DiAktifkan</center>
    			</div>';
		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/kerja_sama');
	}

	public function delete_kerja_sama()
	{
		$id = $_GET['id'];
		$this->M_kerja_sama->deleteKerjasama($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/kerja_sama');
	}

}

/* End of file kerja_sama.php */
