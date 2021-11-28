<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::adminAuth();

		$this->load->model('m_admin');
	}

	public function detail($username){
		$data['admin_data'] = $this->m_admin->getAdminByUsername($username)[0];
		$this->load->view('admin/profile/detail_admin', $data);
	}

	public function edit($admin_id){
		$data['admin_data'] = $this->m_admin->getAdminById($admin_id)[0];
		$this->load->view('admin/profile/edit_admin', $data);
	}

	public function edit_proc(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nomor_telp = $this->input->post('nomor_telp');
		$admin_id = $this->input->post('admin_id');
		$foto = addslashes($_FILES['foto']['name']);
		$old_foto = $this->input->post('old_foto');
		$username = $this->input->post('username');
		$username_old = $this->input->post('username_old');
		$status = $this->input->post('status');

		$password = md5($this->input->post('pass'));
		$password2 = md5($this->input->post('pass2'));
		$cek_username = $this->m_admin->cekAdminByUsername($username)[0]->hitung;
		$validasi = true;

		if ($foto != "") {
			unlink("./upload/admin/".$old_foto);
			//upload foto
			define('MB', 1048576);
			if ($_FILES['foto']['size'] > 5 * MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger alert-dismissible">
       						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        					<center>Ukuran File Terlalu Besar</center>
    					  </div>';

				$this->session->set_flashdata('notif_action', $alert);
				redirect('admin/profile/edit/'.$admin_id);
			} elseif ($_FILES['foto']['size'] != 0) {
				$foto = $this->_fileMod();
			}
		}else{
			$foto = $old_foto;
		}

		if ($password != $password2) {
			$validasi = false;
			$alert = '<div class="alert alert-danger alert-dismissible">
						    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						    <center>Password tidak sesuai</center>
						  </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/profile/edit/'.$admin_id);
		}

			//UPDATE USERNAME
		if ($username != $username_old) {
			if ($cek_username != 0) {
				$validasi = false;
				$alert = '<div class="alert alert-danger alert-dismissible">
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					    <center>Username telah terpakai</center>
					  </div>';

				$this->session->set_flashdata('notif_action', $alert);
				redirect('admin/profile/edit/'.$admin_id);
			}
			else{
				$validasi = true;
			}
		}

		//OVERRIDE PERUBAHAN AGAR SEKALIGUS
		if ($validasi == true) {
			$this->m_admin->updateAdmin($nama, $email, $nomor_telp, $password, $username, $foto, $admin_id);

			$alert = '<div class="alert alert-success alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <center>Profil berhasil diubah</center>
				  </div>';
			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/profile/detail/'.$username);		

		}else{
			$alert = '<div class="alert alert-danger alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <center>Data salah</center>
				  </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/profile/edit/'.$admin_id);
		}
	}

	function _fileMod(){
		define(MB, 1084576);
		$filter_1 = str_replace(' ', '_', $this->input->post('nama'));
		$nama = str_replace('.', '_', $filter_1);

		$config['upload_path'] = './upload/admin/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $nama . "_pic";
		$config['overwrite'] = true;
		$config['max_size'] = 5 * MB;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>Format Foto Tidak Sesuai</center>
      </div>';

			$this->session->set_flashdata('notif_action', $alert);
			redirect('admin/dashboard');
		} else {
			return $this->upload->data('file_name');
		}
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */

?>