<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_visi_misi');
		$this->load->model('M_kerja_sama');
		$this->load->model('M_posting');
		
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

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */

?>
