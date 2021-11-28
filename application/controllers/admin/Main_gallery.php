<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class main_gallery extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_galeriut');
	}

	public function index()
	{
		$data = $this->m_galeriut->getAllGaleriut();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/galeriut/list_galeriut');
	}

	public function create_galeriut()
	{
		$this->load->view('admin/galeriut/create_galeriut');
	}

	function _fileMod()
	{
		define(MB, 1084576);
		$filter_1 = str_replace(' ', '_', $this->input->post('judul'));
		$judul = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/galeri_utama/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $judul . "_pic";
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

	public function save_galeriut()
	{
		$array_temp = array(
			'judul' => $this->input->post('judul')
		);

		$jud = $this->input->post('judul');
		$status = $this->input->post('status');
		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/main_gallery/create_galeriut');
		} elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		} else {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Harus menyertakan gambar</center>
      </div>';
			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/main_gallery/create_galeriut');
		}

		$this->m_galeriut->insertGaleriut($jud, $foto, $status);
		$alert = '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center>Foto Berhasil Ditambahkan</center>
    </div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/main_gallery');
	}

	public function delete_galeriut()
	{
		$id = $_GET['id'];
		$foto = $_GET['foto'];
		if ($foto != "image.jpg") {
			unlink("./upload/galeri_utama/" . $foto);
		}
		$this->m_galeriut->deleteGaleriut($id);
		$alert = '<div class="alert alert-danger alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Di Hapus</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/main_gallery');
	}

	

}

/* End of file main_gallery.php */
