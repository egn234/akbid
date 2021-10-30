<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class layanan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();
		$this->load->model('M_layanan');
	}

	public function index(){
		$data = $this->M_layanan->getAllLayanan();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/layanan/list_layanan');
	}

	public function create_layanan()
	{
		$this->load->view('admin/layanan/create_layanan');
	}

	public function detail_layanan()
	{
		$query['data'] = $this->M_layanan->getLayananById($_GET['id']);
		$this->load->view('admin/layanan/detail_layanan', $query);
	}

	public function update_layanan()
	{
		$query['data'] = $this->M_layanan->getLayananById($_GET['id']);
		$this->load->view('admin/layanan/update_layanan', $query);
	}

	function _fileMod()
	{
		$filter_1 = str_replace(' ', '_', $this->input->post('judul_layanan'));
		$judul_layanan = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/layanan/';
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['file_name'] = $judul_layanan . "_file";
		$config['overwrite'] = false;
		$config['max_size'] = '4000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format File Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/layanan/');
		} else {
			return $this->upload->data('file_name');
		}
	}

	public function save_layanan()
	{
		//temporary 
		$array_temp = array(
			'judul_layanan' => $this->input->post('judul_layanan'),
			'deskripsi_layanan' => $this->input->post('deskripsi_layanan'),
			'date_created' => $this->input->post('date_created')
		);

		$judul_layanan = $this->input->post('judul_layanan');
		$deskripsi_layanan = $this->input->post('deskripsi_layanan');
		$date = $this->input->post('date_created');

		$admin_id =	$this->session->userdata('admin_id_sess');

		//file upload
		define(MB, 1048576);
		if ($_FILES['file']['size'] > 4 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        				<center>Ukuran File Terlalu Besar</center>
      				</div>';

			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/layanan/');
		} elseif ($_FILES['file']['size'] != 0) {
			$file = $this->_fileMod();
		} else {
			$file = 'empty';
		}
		

		$this->M_layanan->inputLayanan($judul_layanan, $deskripsi_layanan, $file, $date, $admin_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/layanan');
	}

	public function edit_layanan()
	{
		$layanan_id = $this->input->post('layanan_id');
		$judul_layanan = $this->input->post('judul_layanan');
		$deskripsi_layanan = $this->input->post('deskripsi_layanan');
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
			redirect('admin/layanan/detail_layanan?id=' . $layanan_id);
		} elseif ($_FILES['file']['size'] != 0) {
			unlink("./upload/layanan/" . $old_file);
			print_r($old_file);
			$file = $this->_fileMod();
		}

		$this->M_layanan->editLayanan($layanan_id, $judul_layanan, $deskripsi_layanan, $file, $date);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/layanan/detail_layanan?id=' . $layanan_id);
	}

	public function delete_layanan()
	{
		$id = $_GET['id'];
		$foto = $_GET['file'];
		unlink("./upload/layanan/" . $foto);
		$this->M_layanan->deleteLayanan($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/layanan');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
