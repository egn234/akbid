<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class visi_misi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();
		$this->load->model('M_visi_misi');
	}

	public function index()
	{
		$data = $this->M_visi_misi->getAllVisimisi();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/visi_misi/list_visi_misi');
	}

	public function create_visi_misi()
	{
		$this->load->view('admin/visi_misi/create_visi_misi');
	}

	public function detail_visi_misi()
	{
		$query['data'] = $this->M_visi_misi->getVisimisiById($_GET['id']);
		$this->load->view('admin/visi_misi/detail_visi_misi', $query);
	}

	public function update_visi_misi()
	{
		$query['data'] = $this->M_visi_misi->getVisimisiById($_GET['id']);
		$this->load->view('admin/visi_misi/update_visi_misi', $query);
	}

	public function save_visi_misi()
	{
		$this->M_visi_misi->turnOffAll();
		$deskripsi_visi_misi = $this->input->post('deskripsi_visi_misi');
		$date = $this->input->post('date_created');
		$admin_id =	$this->session->userdata('admin_id_sess');

		$this->M_visi_misi->inputVisimisi($deskripsi_visi_misi, $date, $admin_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/visi_misi');
	}

	public function edit_visi_misi()
	{
		$visi_misi_id = $this->input->post('visi_misi_id');
		$deskripsi_visi_misi = $this->input->post('deskripsi_visi_misi');
		$date = $this->input->post('date_created');

		$old_file = $this->input->post('old_file');

		$this->M_visi_misi->editVisimisi($visi_misi_id ,$deskripsi_visi_misi, $date);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/visi_misi/detail_visi_misi?id=' . $visi_misi_id);
	}

	public function change_status($visi_misi_id)
	{
		$this->M_visi_misi->turnOff($visi_misi_id);
		$this->M_visi_misi->turnOn($visi_misi_id);

		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Status Berhasil DiAktifkan</center>
    			</div>';
		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/visi_misi');
	}

	public function delete_visi_misi()
	{
		$id = $_GET['id'];
		$this->M_visi_misi->deleteVisimisi($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/visi_misi');
	}
	
	}
	
	/* End of file visi_misi.php */
	
?>
