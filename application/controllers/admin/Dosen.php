<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('M_dosen');
	}

	public function index(){
		$data = $this->M_dosen->getAllDosen();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/dosen/list_dosen');
	}

	public function create_dosen()
	{
		$this->load->view('admin/dosen/create_dosen');
		
	}

	public function detail_dosen()
	{
		$query['data'] = $this->M_dosen->getDosenById($_GET['id']);
		$this->load->view('admin/dosen/detail_dosen', $query);
	}

	public function update_dosen()
	{
		$query['data'] = $this->M_dosen->getDosenById($_GET['id']);
		$this->load->view('admin/dosen/update_dosen', $query);
	}


	function _fileMod()
	{
		define(MB, 1084576);
		$filter_1 = str_replace(' ', '_', $this->input->post('nama_dosen'));
		$nama_dosen = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/dosen/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $nama_dosen . "_pic";
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


	public function save_dosen()
	{
		$array_temp = array(
			'nama_dosen' => $this->input->post('nama_dosen'),
			'nidn_dosen' => $this->input->post('nidn_dosen'),
			'nip_dosen' => $this->input->post('nip_dosen'),
			'prodi' => $this->input->post('prodi'),
			'email' => $this->input->post('email'),
			'jabatan_struktural' => $this->input->post('jabatan_struktural'),
			'nomor_telp' => $this->input->post('nomor_telp')
		);

		$nama_dosen = $this->input->post('nama_dosen');
		$nidn_dosen = $this->input->post('nidn_dosen');
		$nip_dosen = $this->input->post('nip_dosen');
		$prodi = $this->input->post('prodi');
		$email = $this->input->post('email');
		$jabatan_struktural = $this->input->post('jabatan_struktural');
		$nomor_telp = $this->input->post('nomor_telp');
		$id_admin = $this->session->userdata('admin_id_sess');
		$status = $this->input->post('status');

		//upload foto
		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/dosen/create_dosen');
		} elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		} else {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Harus menyertakan gambar</center>
      </div>';
			$this->session->set_flashdata('notif_action', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/dosen/create_dosen');
		}

		$this->M_dosen->inputDosen($nama_dosen, $nidn_dosen, $nip_dosen, $prodi, $email, $jabatan_struktural, $nomor_telp, $id_admin, $foto, $status);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Ditambahkan</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/dosen/');
	}

	public function edit_dosen()
	{
		$nama_dosen = $this->input->post('nama_dosen');
		$nidn_dosen = $this->input->post('nidn_dosen');
		$nip_dosen = $this->input->post('nip_dosen');
		$prodi = $this->input->post('prodi');
		$email = $this->input->post('email');
		$jabatan_struktural = $this->input->post('jabatan_struktural');
		$nomor_telp = $this->input->post('nomor_telp');
		$dosen_id = $this->input->post('dosen_id');
		$foto = addslashes($_FILES['foto']['name']);
		$old_foto = $this->input->post('old_foto');
		$status = $this->input->post('status');
	
		if ($foto != "") {
			unlink("./upload/dosen/".$old_foto);
			//upload foto
			define('MB', 1048576);
			if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger alert-dismissible">
       						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        					<center>Ukuran File Terlalu Besar</center>
    					  </div>';

				$this->session->set_flashdata('notif_action', $alert);
				redirect('admin/dosen/detail_dosen?id=' . $dosen_id);
			} elseif ($_FILES['foto']['size'] != 0) {
				$foto = $this->_fileMod();
			}
		}
		
		$this->M_dosen->editDosen($nama_dosen, $nidn_dosen, $nip_dosen, $prodi, $email, $jabatan_struktural, $nomor_telp, $foto, $status, $dosen_id);
		$alert = '<div class="alert alert-success alert-dismissible">
      				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      				<center>Data Berhasil Diedit</center>
    			</div>';

		$this->session->set_flashdata('notif_action', $alert);
		redirect('admin/dosen/detail_dosen?id='.$dosen_id);
	}

	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
