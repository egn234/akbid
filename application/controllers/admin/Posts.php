<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class posts extends MY_Controller {

	public function __construct(){
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_posting');
	}

	public function index(){
		redirect('admin/posts/list');
	}

	public function list(){
		$data['posting'] = $this->m_posting->getAllPosts();
		$this->load->view('admin/posts/list_posting', $data);
	}

	public function add(){
		$this->load->view('admin/posts/add_posting');
	}

	public function edit($posting_id){
		$data['editPos'] = $this->m_posting->getPostsById($posting_id)[0];
		$this->load->view('admin/posts/edit_posting', $data);
	}

	public function add_proc(){
		$array_temp = array(
			'judul_posting' => $this->input->post('judul_posting'),
			'deskripsi_posting' => $this->input->post('deskripsi_posting')
		 );

		$jud = $this->input->post('judul_posting');
		$desc = $this->input->post('deskripsi_posting');

		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_posting', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/posts/add');
		}elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		}else{
			$foto = 'none';
		}

		$this->m_posting->insertPosts($jud, $desc, $foto);
		$alert = '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center>Post Berhasil Ditambahkan</center>
    </div>';

		$this->session->set_flashdata('notif_posting', $alert);
		redirect('admin/posts/list');
	}

	public function edit_proc($posting_id){
		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_posting', $alert);

			redirect('admin/posts/edit/'.$posting_id);
		}elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		}else{
			$foto = $this->m_posting->getPostsById($posting_id)[0]->foto;
		}

		$jud = $this->input->post('judul_posting');
		$desc = $this->input->post('deskripsi_posting');

		$this->m_posting->updatePosts($jud, $desc, $foto, $posting_id);
		$alert = '<div class="alert alert-success alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <center>Artikel berhasil diubah</center>
	      </div>';
		
		$this->session->set_flashdata('notif_posting', $alert);
		redirect('admin/posts/edit/'.$posting_id);
	}

	function _fileMod(){
		$filter_1 = str_replace(' ', '_', $this->input->post('judul_posting'));
		$judul_posting = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/posts/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $judul_posting."_pic";
		$config['overwrite'] = false;
		$config['max_size'] = '4000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('foto')){
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format Foto Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_posting', $alert);
			redirect('admin/posts/list');
		}else{
			return $this->upload->data('file_name');
		}
	}

	
}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */

?>
