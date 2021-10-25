<?php
defined('BASEPATH') or exit('No direct script access allowed');

class staff extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('M_staff');
	}

	public function index()
	{
		$data = $this->M_staff->getAllStaff();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/staff/list_staff');
	}

	public function create_staff()
	{
		$this->load->view('admin/staff/create_staff');
	}

	public function detail_staff()
	{
		$query['data'] = $this->M_staff->getStaffById($_GET['id']);
		$this->load->view('admin/staff/detail_staff', $query);
	}

	public function update_staff()
	{
		$query['data'] = $this->M_staff->getStaffById($_GET['id']);
		$this->load->view('admin/staff/update_staff', $query);
	}

	public function upload()
	{
		$config['upload_path'] = './upload/staff/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
		}
	}

	public function save_staff()
	{
		$nama_staff = $this->input->post('nama_staff');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$nip_staff = $this->input->post('nip_staff');
		$jabatan = $this->input->post('jabatan');
		$email = $this->input->post('email');
		$nomor_telp = $this->input->post('nomor_telp');
		$id_admin = $this->session->userdata('admin_id_sess');

		//file upload
		$foto = addslashes($_FILES['foto']['name']);
		$this->upload();

		$status = $this->input->post('status');

		$this->M_staff->inputStaff($nama_staff, $pendidikan_terakhir, $nip_staff, $jabatan, $email, $nomor_telp, $id_admin, $foto, $status);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/staff/');
	}

	public function edit_staff()
	{
		$nama_staff = $this->input->post('nama_staff');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$nip_staff = $this->input->post('nip_staff');
		$jabatan = $this->input->post('jabatan');
		$email = $this->input->post('email');
		$nomor_telp = $this->input->post('nomor_telp');
		$staff_id = $this->input->post('staff_id');
		
		$foto = addslashes($_FILES['foto']['name']);
		$old_foto = $this->input->post('old_foto');

		if ($foto != "") {
			unlink("./upload/staff/" . $old_foto);
			$this->upload();
		}
		$status = $this->input->post('status');

		$this->M_staff->editStaff($nama_staff, $pendidikan_terakhir, $nip_staff, $jabatan, $email, $nomor_telp, $staff_id, $foto, $status);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/staff/detail_staff?id='.$staff_id);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
