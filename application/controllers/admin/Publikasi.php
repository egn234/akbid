<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class publikasi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_publikasi');
	}

	public function index(){
		redirect('admin/publikasi/list');
	}

	public function list(){
		$data['listPub'] = $this->m_publikasi->getAllPublikasi();
		$this->load->view('admin/publikasi/list_publikasi', $data);
	}

	public function detail($publikasi_id){
		$data['pub'] = $this->m_publikasi->getPublikasiById($publikasi_id)[0];
		$this->load->view('admin/publikasi/detail_publikasi', $data);
	}

	public function add(){
		$this->load->view('admin/publikasi/add_publikasi');
	}

	public function add_proc(){
		$array_temp = array(
			'judul_publikasi' => $this->input->post('judul_publikasi'),
			'deskripsi_publikasi' => $this->input->post('deskripsi_publikasi')
		 );

		$jud = $this->input->post('judul_publikasi');
		$desc = $this->input->post('deskripsi_publikasi');

		define('MB', 1048576);
		if ($_FILES['file_upload']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_publikasi', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/publikasi/add');
		}elseif ($_FILES['file_upload']['size'] != 0) {
			$file_upload = $this->_fileMod();
		}else{
			$file_upload = null;
		}

		$this->m_publikasi->insertPublikasi($jud, $desc, $file_upload);
		$alert = '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center>Data Publikasi Berhasil Ditambahkan</center>
    </div>';

		$this->session->set_flashdata('notif_publikasi', $alert);
		redirect('admin/publikasi/list');
	}

	public function edit($publikasi_id){
		$data['editPub'] = $this->m_publikasi->getPublikasiById($publikasi_id)[0];
		$this->load->view('admin/publikasi/edit_publikasi', $data);
	}

	public function edit_proc($publikasi_id){
		define('MB', 1048576);
		if ($_FILES['file_upload']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_publikasi', $alert);

			redirect('admin/publikasi/edit/'.$publikasi_id);
		}elseif ($_FILES['file_upload']['size'] != 0) {
			$file_upload = $this->_fileMod();
		}else{
			$file_upload = $this->m_publikasi->getPublikasiById($publikasi_id)[0]->file_upload;
		}

		$jud = $this->input->post('judul_publikasi');
		$desc = $this->input->post('deskripsi_publikasi');

		$this->m_publikasi->updatePublikasi($jud, $desc, $file_upload, $publikasi_id);
		$alert = '<div class="alert alert-success alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <center>Publikasi berhasil diubah</center>
	      </div>';
		
		$this->session->set_flashdata('notif_publikasi', $alert);
		redirect('admin/publikasi/detail/'.$publikasi_id);
	}

	function delete($publikasi_id, $admin_id){
		$cek_adm = $this->m_admin->cekAdminById($admin_id)[0]->hitung;

		if ($cek_adm != 0) {
			$this->db->where('publikasi_id', $publikasi_id);
			$this->db->delete('tb_publikasi');

			$alert = '<div class="alert alert-success alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      <center>Publikasi berhasil dihapus</center>
	    </div>';
		}else{
			$alert = '<div class="alert alert-danger alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      <center>anda tidak bisa menghapus data ini</center>
	    </div>';
		}

		$this->session->set_flashdata('notif_publikasi', $alert);
		redirect('admin/publikasi/list');
	}

	function _fileMod(){
		$filter_1 = str_replace(' ', '_', $this->input->post('judul_publikasi'));
		$judul_publikasi = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/publikasi/';
		$config['allowed_types'] = 'png|jpg|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx';
		$config['file_name'] = $judul_publikasi;
		$config['overwrite'] = true;
		$config['max_size'] = '4000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('file_upload')){
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format File Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_publikasi', $alert);
			redirect('admin/publikasi/list');
		}else{
			return $this->upload->data('file_name');
		}
	}
}

/* End of file publikasi.php */
/* Location: ./application/controllers/publikasi.php */

?>
