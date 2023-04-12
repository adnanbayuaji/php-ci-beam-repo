<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function _construct()
	{
		session_start();
	}
	public function index()
	{
		$cek = $this->session->userdata('username');
		if(empty($cek))
		{
			$this->load->view('p_login');
		}
		else
		{
			$st= $this->session->userdata('status');
			// if($st== 'admin')
			// {
			// 	header('location:'.base_url().'home');
			// }
			// else
			// {
			// 	header('location:'.base_url().'user');	
			// }
			header('location:'.base_url().'home');
		}
	}
	
	public function logingmail()
	{
		
			//meload file model komentar
			$this->load->view('google-login');
	}
}
?>