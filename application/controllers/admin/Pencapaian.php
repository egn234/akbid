<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pencapaian extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('M_pencapaian');
	}
	
	public function index()
	{
		$data = $this->M_pencapaian->getAllPencapaian();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/pencapaian/list_pencapaian');
	}

	public function create_pencapaian()
	{
		$this->load->view('admin/pencapaian/create_pencapaian');
	}

	public function detail_pencapaian()
	{
		$query['data'] = $this->M_pencapaian->getPencapaianById($_GET['id']);
		$this->load->view('admin/pencapaian/detail_pencapaian', $query);
	}

	public function update_pencapaian()
	{
		$query['data'] = $this->M_pencapaian->getPencapaianById($_GET['id']);
		$this->load->view('admin/pencapaian/update_pencapaian', $query);
	}

	public function upload()
	{
		$config['upload_path'] = './upload/pencapaian/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
		}
	}

	public function save_pencapaian()
	{
		$judul_pencapaian = $this->input->post('judul_pencapaian');
		$deskripsi_pencapaian = $this->input->post('deskripsi_pencapaian');
		//file upload
		$foto = addslashes($_FILES['foto']['name']);
		$this->upload();
		$date = $this->input->post('date_created');
		
		$admin_id =	$this->session->userdata('admin_id_sess');

		$this->M_pencapaian->inputPencapaian($judul_pencapaian, $deskripsi_pencapaian, $foto, $date, $admin_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/pencapaian');
	}

	public function edit_pencapaian()
	{
		$pencapaian_id = $this->input->post('pencapaian_id');
		$judul_pencapaian = $this->input->post('judul_pencapaian');
		$deskripsi_pencapaian = $this->input->post('deskripsi_pencapaian');
		$date = $this->input->post('date_created');
		
		//file upload
		$foto = addslashes($_FILES['foto']['name']);
		$old_foto = $this->input->post('old_foto');
		
		if ($foto != "") {
			unlink("./upload/pencapaian/". $old_foto);
			$this->upload();
		}
		$this->M_pencapaian->editPencapaian($pencapaian_id ,$judul_pencapaian, $deskripsi_pencapaian, $foto, $date);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/pencapaian/detail_pencapaian?id=' . $pencapaian_id);
	}

	public function delete_pencapaian()
	{
		$id = $_GET['id'];
		$foto = $_GET['foto'];
		unlink("./upload/pencapaian/" . $foto);
		$this->M_pencapaian->deletePencapaian($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/pencapaian');
	}

}

/* End of file pencapaian.php */

?>
