<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Starter extends CI_Controller {
	public function _construct()
	{
		session_start();
	}
	
	public function index()
	{
		$cek = $this->session->userdata('username');
		if(empty($cek))
		{
			// $this->load->model('Beritamodel');
			// $data['berita'] = $this->Beritamodel->tampil();
			// $data['jumlah'] = $this->Beritamodel->tampil();
			$this->load->view('p_login');
		}
		else
		{
			// $st= $this->session->userdata('status');
			// if($st== 'amil'||$st== 'duta')
			// {
				

				header('location:'.base_url().'home');
			// }
			// else
			// {
			// 	header('location:'.base_url().'home/home_user');	
			// }
		}
	}

	// public function detail($id)
	// {
	// 	$this->load->model('Beritamodel');
	// 	$data['berita'] = $this->Beritamodel->tampilId($id);
	// 	$this->load->view('detail_berita', $data);
	// }

	// function cara_donasi()
	// {
	// 	$this->load->view('user_cara_donasi');
	// }
}
?>