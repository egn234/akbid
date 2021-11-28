<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_visi_misi');
		$this->load->model('M_kerja_sama');
		$this->load->model('M_posting');
		$this->load->model('M_publikasi');
		$this->load->model('M_pencapaian');
		$this->load->model('M_layanan');
		$this->load->model('M_dosen');
		$this->load->model('M_staff');
		$this->load->model('M_galerik');
		$this->load->model('M_galeriut');
		$this->load->model('M_about');
		
	}
	
	public function index(){
		$query['data_pencapaian'] = $this->M_pencapaian->getPencapaianWithLimit(0, 3);
		$query['data_layanan'] = $this->M_layanan->getLayananWithLimit(0, 3);
		$query['data_posts'] = $this->M_posting->getPostsWithLimit(0,3);
		$query['data_about'] = $this->M_about->getAboutWithLimit(0, 1);
		$query['galeri_utama'] = $this->M_galeriut->getAllGaleriutWithStatus('aktif');
		$this->load->view('homepage/home', $query);
	}

	public function Visimisi()
	{
		$data = $this->M_visi_misi->getAllVisimisi();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/visimisi');
	}

	//About
	public function detail_about($id)
	{
		$query['data'] = $this->M_about->getAboutById($id);
		$this->load->view('homepage/about', $query);
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

	//Publikasi
	public function publikasi()
	{
		$batas = 9;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

		$jumlah_data = count($this->M_publikasi->getAllPublikasi());
		$total_halaman = ceil($jumlah_data / $batas);
		$data = $this->M_publikasi->getPublikasiWithLimit($halaman_awal, $batas);
		$this->session->set_userdata('all_data', $data);
		$query['halaman'] = $halaman;
		$query['total_halaman'] = $total_halaman;
		$this->load->view('homepage/publikasi', $query);
	}
	//Detail Publikasi
	public function publikasi_details($id_publikasi)
	{
		$recentPublikasi = $this->M_publikasi->getPublikasiWithLimit(0, 3);
		$this->session->set_userdata('recentData', $recentPublikasi);
		$query['data'] = $this->M_publikasi->getPublikasiById($id_publikasi);
		$this->load->view('homepage/publikasi_details', $query);
	}

	//pencapaian
	public function pencapaian()
	{
		$batas = 9;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

		$jumlah_data = count($this->M_pencapaian->getAllPencapaian());
		$total_halaman = ceil($jumlah_data / $batas);
		$data = $this->M_pencapaian->getPencapaianWithLimit($halaman_awal, $batas);
		$this->session->set_userdata('all_data', $data);
		$query['halaman'] = $halaman;
		$query['total_halaman'] = $total_halaman;
		$this->load->view('homepage/pencapaian', $query);
	}
	//Detail Pencapaian
	public function pencapaian_details($id_pencapaian)
	{
		$recentPencapaian = $this->M_pencapaian->getPencapaianWithLimit(0, 3);
		$this->session->set_userdata('recentData', $recentPencapaian);
		$query['data'] = $this->M_pencapaian->getPencapaianById($id_pencapaian);
		$this->load->view('homepage/pencapaian_details', $query);
	}

	//layanan
	public function layanan()
	{
		$batas = 9;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

		$jumlah_data = count($this->M_layanan->getAllLayanan());
		$total_halaman = ceil($jumlah_data / $batas);
		$data = $this->M_layanan->getLayananWithLimit($halaman_awal, $batas);
		$this->session->set_userdata('all_data', $data);
		$query['halaman'] = $halaman;
		$query['total_halaman'] = $total_halaman;
		$this->load->view('homepage/layanan', $query);
	}
	//Detail Layanan
	public function layanan_details($id_layanan)
	{
		$recentLayanan = $this->M_layanan->getLayananWithLimit(0, 3);
		$this->session->set_userdata('recentData', $recentLayanan);
		$query['data'] = $this->M_layanan->getLayananById($id_layanan);
		$this->load->view('homepage/layanan_details', $query);
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

	//Galeri Kegiatan 
	public function galeri_kegiatan()
	{
		$data = $this->M_galerik->getAllGaleriK();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('homepage/galeri_kegiatan');
	}
	//Galeri Detail
	public function galerik_detail()
	{
		if ($this->input->post('rowid')) {
			$id = $this->input->post('rowid');
			$dataGaleriK = $this->M_galerik->getGaleriKById($id);
			foreach ($dataGaleriK as $data) {
				echo '<table class="table">
				<tr>
					<td></td>
					<td class="text-center text-uppercase"><b>' . $data->judul . '</b></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3"><img src="' . base_url() . 'upload/galeri_kegiatan/' . $data->foto . '" class="rounded mx-auto d-block" style="max-height: 90%; max-width: 90%;"></td>
				</tr>
				</table>';
			}
		}
	}

	

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */

?>
