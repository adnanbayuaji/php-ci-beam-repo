<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('nama', 'judul', 'required');
		// $this->form_validation->set_rules('usernama', 'detail', 'required');
		// $this->form_validation->set_rules('password', 'First Field', 'trim|required|is_natural');
		// $this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');

    //     if ($this->form_validation->run() == TRUE)
    //     {
		// 	$cek = $this->session->userdata('username');
		// 	if(empty($cek))
		// 	{
		// 		//jika ada post submit yang diterima pada form
		// 		if($this->input->post('submit'))
		// 		{
		// 			//meload file model pengguna
		// 			$this->load->model('Penggunamodel');
		// 			$tampil= $this->Penggunamodel->idauto();

		// 			if(empty($tampil))
		// 			{
		// 				$idauto = "PG-0001";
		// 			}
		// 			else
		// 			{
		// 				foreach ($tampil as $data) 
		// 				{
		// 				  list($huruf, $angka) = explode('-', $data->id_pengguna);
		// 				  $angka = $angka + 1;
		// 				  if($angka<10)
		// 				  {
		// 				    $idauto = $huruf.'-000'.$angka;
		// 				  }
		// 				  else if($angka<100)
		// 				  {
		// 				    $idauto = $huruf.'-00'.$angka;
		// 				  }
		// 				  else if($angka<1000)
		// 				  {
		// 				    $idauto = $huruf.'-0'.$angka;
		// 				  }
		// 				  else if($angka<10000)
		// 				  {
		// 				    $idauto = $huruf.'-'.$angka;
		// 				  }
		// 				}  
		// 			}

		// 			//menjalankan fungsi tambah pada model
		// 			$this->Penggunamodel->tambah($idauto);

		// 			//mengarahkan file ke controller pengguna
		// 			//artinya mengarah ke pengguna/index
		// 			echo "<script>
		// 			alert('Data berhasil ditambahkan!');
		// 			window.location.href='index';
		// 			</script>";
		// 			// redirect('pengguna');
		// 		}
		// 		$this->load->view('p_register');
		// 	}
		// 	else
		// 	{
		// 		$st= $this->session->userdata('status');
		// 		if($st== 'admin')
		// 		{
		// 			header('location:'.base_url().'home');
		// 		}
		// 		else
		// 		{
		// 			header('location:'.base_url().'user');	
		// 		}
		// 	}
		// }
    //     else
    //     {
		// 	//meload tampilan program_tambah
		// 	$this->load->view('p_register');  
		//     }
		redirect('login');
	}

	public function index_register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('usernama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('notelp', 'Nomer Telepon', 'required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('password', 'Sandi', 'required');
		$this->form_validation->set_rules('repassword', 'Konfirmasi Sandi', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');

        if ($this->form_validation->run() == TRUE)
        {
			if($this->input->post('submit'))
			{
				//meload file model pengguna
				$this->load->model('Penggunamodel');
				$tampil= $this->Penggunamodel->idauto();

				if(empty($tampil))
				{
					$idauto = "PG-0001";
				}
				else
				{
					foreach ($tampil as $data) 
					{
					  list($huruf, $angka) = explode('-', $data->id_pengguna);
					  $angka = $angka + 1;
					  if($angka<10)
					  {
					    $idauto = $huruf.'-000'.$angka;
					  }
					  else if($angka<100)
					  {
					    $idauto = $huruf.'-00'.$angka;
					  }
					  else if($angka<1000)
					  {
					    $idauto = $huruf.'-0'.$angka;
					  }
					  else if($angka<10000)
					  {
					    $idauto = $huruf.'-'.$angka;
					  }
					}  
				}
				
				//menjalankan fungsi tambah pada model
				$this->Penggunamodel->tambah_register($idauto);

				//mengarahkan file ke controller pengguna
				//artinya mengarah ke pengguna/index
				echo "<script>
				alert('Data berhasil ditambahkan!');
				window.location.href='registeruser';
				</script>";
				// redirect('pengguna');
			}
			$this->load->view('register_user');
		}
        else
        {
			//meload tampilan program_tambah
			$this->load->view('register_user');  
        }
	}

	public function registeruser()
	{
		
		$this->load->view('register_user');
	}
}
?>