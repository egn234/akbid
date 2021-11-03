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

	function _fileMod()
	{
		define(MB, 1084576);
		$filter_1 = str_replace(' ', '_', $this->input->post('judul_pencapaian'));
		$judul_pencapaian = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/pencapaian/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $judul_pencapaian . "_pic";
		$config['overwrite'] = false;
		$config['max_size'] = 5 * MB;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format Foto Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/main_gallery');
		} else {
			return $this->upload->data('file_name');
		}
	}

	public function save_pencapaian()
	{
		$array_temp = array(
			'judul_pencapaian' => $this->input->post('judul_pencapaian'),
			'deskripsi_pencapaian' => $this->input->post('deskripsi_pencapaian'),
			'date_created' => $this->input->post('date_created')
		);
		$judul_pencapaian = $this->input->post('judul_pencapaian');
		$deskripsi_pencapaian = $this->input->post('deskripsi_pencapaian');
		$date = $this->input->post('date_created');

		//upload foto
		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/pencapaian/create_pencapaian');
		} elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		} else {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Harus menyertakan gambar</center>
      </div>';
			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/pencapaian/create_pencapaian');
		}
		
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
			//upload foto
			define('MB', 1048576);
			if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger alert-dismissible">
       						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        					<center>Ukuran File Terlalu Besar</center>
    					  </div>';

				$this->session->set_flashdata('notif_action', $alert);
				redirect('admin/pencapaian/detail_pencapaian?id=' . $pencapaian_id);
			} elseif ($_FILES['foto']['size'] != 0) {
				$foto = $this->_fileMod();
			}
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
