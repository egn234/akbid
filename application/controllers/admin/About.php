<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('M_about');
	}

	public function index()
	{
		$data = $this->M_about->getAllAbout();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/about/list_about');
	}

	public function create_about()
	{
		$this->load->view('admin/about/create_about');
	}

	public function detail_about()
	{
		$query['data'] = $this->M_about->getAboutById($_GET['id']);
		$this->load->view('admin/about/detail_about', $query);
	}

	public function update_about()
	{
		$query['data'] = $this->M_about->getAboutById($_GET['id']);
		$this->load->view('admin/about/update_about', $query);
	}

	function _fileMod()
	{
		$filter_1 = str_replace(' ', '_', $this->input->post('judul_about'));
		$judul_about = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/about/';
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['file_name'] = $judul_about . "_file";
		$config['overwrite'] = false;
		$config['max_size'] = '4000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format File Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/about/');
		} else {
			return $this->upload->data('file_name');
		}
	}

	public function save_about()
	{
		//temporary 
		$array_temp = array(
			'judul_about' => $this->input->post('judul_about'),
			'deskripsi_about' => $this->input->post('deskripsi_about'),
			'date_created' => $this->input->post('date_created')
		);

		$judul_about = $this->input->post('judul_about');
		$deskripsi_about = $this->input->post('deskripsi_about');
		$date = $this->input->post('date_created');

		$admin_id =	$this->session->userdata('admin_id_sess');

		//file upload
		define('MB', 1048576);
		if ($_FILES['file']['size'] > 4 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        				<center>Ukuran File Terlalu Besar</center>
      				</div>';

			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/about/');
		} elseif ($_FILES['file']['size'] != 0) {
			$file = $this->_fileMod();
		} else {
			$file = 'empty';
		}


		$this->M_about->inputAbout($judul_about, $deskripsi_about, $file, $date, $admin_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/about');
	}

	public function edit_about()
	{
		$about_id = $this->input->post('about_id');
		$judul_about = $this->input->post('judul_about');
		$deskripsi_about = $this->input->post('deskripsi_about');
		$date = $this->input->post('date_created');

		$old_file = $this->input->post('old_file');

		//file upload
		define(MB, 1048576);
		if ($_FILES['file']['size'] > 4 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        				<center>Ukuran File Terlalu Besar</center>
      				</div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/about/detail_about?id=' . $about_id);
		} elseif ($_FILES['file']['size'] != 0) {
			unlink("./upload/about/" . $old_file);
			print_r($old_file);
			$file = $this->_fileMod();
		}

		$this->M_about->editAbout($about_id, $judul_about, $deskripsi_about, $file, $date);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/about/detail_about?id=' . $about_id);
	}

	public function delete_about()
	{
		$id = $_GET['id'];
		$foto = $_GET['file'];
		unlink("./upload/about/" . $foto);
		$this->M_about->deleteAbout($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/about');
	}

}

/* End of file About.php */

?>
