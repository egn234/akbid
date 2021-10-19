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
	public function upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
		$image_name	= addslashes($_FILES['foto']['name']);

		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
	}

	public function save_dosen()
	{
		$nama_dosen = $this->input->post('nama_dosen');
		$nidn_dosen = $this->input->post('nidn_dosen');
		$nip_dosen = $this->input->post('nip_dosen');
		$prodi = $this->input->post('prodi');
		$email = $this->input->post('email');
		$jabatan_struktural = $this->input->post('jabatan_struktural');
		$nomor_telp = $this->input->post('nomor_telp');
		$id_admin = $this->session->userdata('admin_id_sess');
		
		//file upload
		$foto = addslashes($_FILES['foto']['name']);
		$this->upload();

		$status = $this->input->post('status');

		$this->M_dosen->inputDosen($nama_dosen, $nidn_dosen, $nip_dosen, $prodi, $email, $jabatan_struktural, $nomor_telp, $id_admin, $foto, $status);
		$pesan = "Data Berhasil Ditambahkan";
		echo "<script type='text/javascript'>
			alert('$pesan');
			document.location = '" . base_url() . "admin/dosen';
			</script>";
	}

	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
