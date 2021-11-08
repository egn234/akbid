<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_visi_misi');
		$this->load->model('M_kerja_sama');
		$this->load->model('M_posting');
		$this->load->model('M_dosen');
		$this->load->model('M_staff');
		
	}
	
	public function index(){
		$this->load->view('homepage/home');
	}

	public function Visimisi()
	{
		$data = $this->M_visi_misi->getAllVisimisi();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/visimisi');
	}

	public function Kerjasama()
	{
		$data = $this->M_kerja_sama->getAllKerjasama();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/kerja_sama');
	}

	public function contact()
	{
		$this->load->view('homepage/contact');
	}

	//Postingan
	public function posts()
	{
		$batas = 9;
		$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

		$jumlah_data = count($this->M_posting->getAllPosts());
		$total_halaman = ceil($jumlah_data/$batas);
		$data = $this->M_posting->getPostsWithLimit($halaman_awal, $batas);
		$this->session->set_userdata('all_data', $data);
		$query['halaman'] = $halaman;
		$query['total_halaman'] = $total_halaman;
		$this->load->view('homepage/posts', $query);
	}
	//Detail Postingan
	public function posts_details($id_posts)
	{
		$recentPosts = $this->M_posting->getPostsWithLimit(0,3);
		$this->session->set_userdata('recentData', $recentPosts);
		$query['data'] = $this->M_posting->getPostsById($id_posts);
		$this->load->view('homepage/posts_details', $query);
		
	}

	//Dosen
	public function dosen()
	{
		$data = $this->M_dosen->getAllDosen();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/dosen_page');
	}
	//detail dosen
	public function modal_detail()
	{
		if ($this->input->post('rowid')) {
			$id = $this->input->post('rowid');
			$dataDosen = $this->M_dosen->getDosenById($id);
			foreach ($dataDosen as $data) {
				echo '<table class="table">
				<tr>
					<td colspan="3"><img src="'.base_url().'upload/dosen/'.$data->foto. '" class="rounded mx-auto d-block" style="max-height: 320px; max-width: 320px;"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>'.$data->nama. '</td>
				</tr>
				<tr>
					<td>NIDN</td>
					<td>:</td>
					<td>' . $data->nidn_dosen . '</td>
				</tr>
				<tr>
					<td>NIP</td>
					<td>:</td>
					<td>' . $data->nip_dosen . '</td>
				</tr>
				<tr>
					<td>Prodi</td>
					<td>:</td>
					<td>' . $data->prodi . '</td>
				</tr>
				<tr>
					<td>email</td>
					<td>:</td>
					<td>' . $data->email . '</td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td>:</td>
					<td>' . $data->nomor_telp . '</td>
				</tr>
				<tr>
					<td>Jabatan Struktural</td>
					<td>:</td>
					<td>' . $data->jabatan_struktural . '</td>
				</tr>
				</table>';
			}
		}
	}

	//Staff
	public function staff()
	{
		$data = $this->M_staff->getAllStaff();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/staff_page');
	}
	//detail Staff
	public function modal_detail_staff()
	{
		if ($this->input->post('rowid')) {
			$id = $this->input->post('rowid');
			$dataStaff = $this->M_staff->getStaffById($id);
			foreach ($dataStaff as $data) {
				echo '<table class="table">
				<tr>
					<td colspan="3"><img src="' . base_url() . 'upload/staff/' . $data->foto . '" class="rounded mx-auto d-block" style="max-height: 320px; max-width: 320px;"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>' . $data->nama . '</td>
				</tr>
				<tr>
					<td>NIDN</td>
					<td>:</td>
					<td>' . $data->pendidikan_terakhir . '</td>
				</tr>
				<tr>
					<td>NIP</td>
					<td>:</td>
					<td>' . $data->nip_staff . '</td>
				</tr>
				<tr>
					<td>Prodi</td>
					<td>:</td>
					<td>' . $data->jabatan . '</td>
				</tr>
				<tr>
					<td>email</td>
					<td>:</td>
					<td>' . $data->email . '</td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td>:</td>
					<td>' . $data->nomor_telp . '</td>
				</tr>
				</table>';
			}
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */

?>
