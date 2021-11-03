<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class act_gallery extends MY_Controller {

	public function __construct(){
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_galerik');
	}

	public function index(){
		redirect('admin/act_gallery/list');
	}

	public function list(){
		$data['galeri'] = $this->m_galerik->getAllGaleriK();
		$this->load->view('admin/galerik/list_galerik', $data);
	}

	public function add(){
		$this->load->view('admin/galerik/add_galerik');
	}

	public function add_proc(){
		$array_temp = array(
			'judul' => $this->input->post('judul')
		 );

		$jud = $this->input->post('judul');

		define('MB', 1048576);
		if ($_FILES['foto']['size'] > 5*MB) { // JIKA FILE DI UPLOAD OLEH USER
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Ukuran File Terlalu Besar</center>
      </div>';

			$this->session->set_flashdata('notif_galerik', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/act_gallery/add');
		}elseif ($_FILES['foto']['size'] != 0) {
			$foto = $this->_fileMod();
		}else{
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Harus menyertakan gambar</center>
      </div>';

			$this->session->set_flashdata('notif_galerik', $alert);
			$this->session->set_flashdata($array_temp);

			redirect('admin/act_gallery/add');
		}

		$this->m_galerik->insertGaleriK($jud, $foto);
		$alert = '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center>Foto Berhasil Ditambahkan</center>
    </div>';

		$this->session->set_flashdata('notif_galerik', $alert);
		redirect('admin/act_gallery/list');
	}

	function delete($galeri_kegiatan_id, $admin_id){
		$cek_adm = $this->m_admin->cekAdminById($admin_id)[0]->hitung;

		if ($cek_adm != 0) {
			$this->db->where('galeri_kegiatan_id', $galeri_kegiatan_id);
			$this->db->delete('tb_galeri_kegiatan');

			$alert = '<div class="alert alert-success alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      <center>Foto berhasil dihapus</center>
	    </div>';
		}else{
			$alert = '<div class="alert alert-danger alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      <center>anda tidak bisa menghapus data ini</center>
	    </div>';
		}

		$this->session->set_flashdata('notif_galerik', $alert);
		redirect('admin/act_gallery/list');
	}

	function _fileMod(){
		define(MB, 1084576);
		$filter_1 = str_replace(' ', '_', $this->input->post('judul'));
		$judul = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/galeri_kegiatan/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $judul."_pic";
		$config['overwrite'] = false;
		$config['max_size'] = 5*MB;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('foto')){
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format Foto Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_galerik', $alert);
			redirect('admin/act_gallery/list');
		}else{
			return $this->upload->data('file_name');
		}
	}

}

/* End of file act_gallery.php */
/* Location: ./application/controllers/act_gallery.php */

?>
