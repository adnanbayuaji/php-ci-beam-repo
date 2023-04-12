<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('role');
		if($cek!=null)
		{
			$this->load->model('Menumodel');
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'laporan');
			$data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $data['trial']=$this->Menumodel->gettrial($this->session->userdata('role'));
			
			$this->load->model('Checksheetmodel');
			//ALLPLANT
			$data['jumlahall']=$this->Checksheetmodel->getjumlah();
			$data['ontimeall']=$this->Checksheetmodel->getontime();
			$data['overdueall']=$this->Checksheetmodel->getoverdue();
			$data['datasall'] = $this->Checksheetmodel->tampil_grafik_harian();
			$data['datasallbeam'] = $this->Checksheetmodel->tampil_grafik_item_new();
			$data['tableallok'] = $this->Checksheetmodel->gettableallok();
			$data['tableallbeam'] = $this->Checksheetmodel->gettableallbeams();

			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{	
				$data['datanok']=$this->Checksheetmodel->getdatanokall();
				$data['dataokbyfunc']=$this->Checksheetmodel->getdataokbyfuncall();	

				//3 kotak angka 
				$data['jumlah']=$this->Checksheetmodel->getjumlah();
				$data['ontime']=$this->Checksheetmodel->getontime();
				$data['overdue']=$this->Checksheetmodel->getoverdue();
				
				$data['hasil'] = $this->Checksheetmodel->tampil_overdue(); //ovedue check equip
				$data['detailbeam'] = $this->Checksheetmodel->detailgrafikbeam(); //table detail grafik beam
				$data['csoverdue'] = $this->Checksheetmodel->tampilcsoverdue($this->session->userdata('role'), $this->session->userdata('dept')); //overdue checksheet
				$data['tabeloknok'] = $this->Checksheetmodel->tabeldetailoknok(); //table detail grafik ok/nok
				$data['catatan'] = $this->Checksheetmodel->dataCatatan($this->session->userdata('dept')); //table list catatan dept
				$data['catatanall'] = $this->Checksheetmodel->dataCatatan2(); //table list catatan all
				$data['feedback'] = $this->Checksheetmodel->dataFeedback(); //table list feedback
			
				//add for show 3 grafik
				$this->load->model('Checksheetmodel');
				$data['datas'] = $this->Checksheetmodel->tampil_grafik_harian();
				$data['datas2'] = $this->Checksheetmodel->tampil_grafik_item_new();
				$data['datas3'] = $this->Checksheetmodel->tampil_grafik_detok();
			}
			else
			{
				$data['datanok']=$this->Checksheetmodel->getdatanok($this->session->userdata('plant'));
				$data['dataokbyfunc']=$this->Checksheetmodel->getdataokbyfunc($this->session->userdata('plant'));

				//3 kotak angka 
				$data['jumlah']=$this->Checksheetmodel->plagetjumlah($this->session->userdata('plant'));
				$data['ontime']=$this->Checksheetmodel->plagetontime($this->session->userdata('plant'));
				$data['overdue']=$this->Checksheetmodel->plagetoverdue($this->session->userdata('plant'));
				
				$data['hasil'] = $this->Checksheetmodel->platampil_overdue($this->session->userdata('plant')); //ovedue check equip
				$data['detailbeam'] = $this->Checksheetmodel->pladetailgrafikbeam($this->session->userdata('plant')); //table detail grafik beam
				$data['csoverdue'] = $this->Checksheetmodel->platampilcsoverdue($this->session->userdata('role'), $this->session->userdata('dept'), $this->session->userdata('plant')); //overdue checksheet
				$data['tabeloknok'] = $this->Checksheetmodel->platabeldetailoknok($this->session->userdata('plant')); //table detail grafik ok/nok
				$data['catatan'] = $this->Checksheetmodel->pladataCatatan($this->session->userdata('dept'), $this->session->userdata('plant')); //table list catatan dept
				$data['catatanall'] = $this->Checksheetmodel->pladataCatatan2($this->session->userdata('plant')); //table list catatan all
				$data['feedback'] = $this->Checksheetmodel->pladataFeedback($this->session->userdata('plant')); //table list feedback
			
				//add for show 3 grafik
				$this->load->model('Checksheetmodel');
				$data['datas'] = $this->Checksheetmodel->platampil_grafik_harian($this->session->userdata('plant'));
				$data['datas2'] = $this->Checksheetmodel->platampil_grafik_item_new($this->session->userdata('plant'));
				$data['datas3'] = $this->Checksheetmodel->platampil_grafik_detok($this->session->userdata('plant'));
			}
			
			$this->load->view('p_home', $data);
		}
		else
		{
			header('location:'.base_url());
		}
	}
	
	// public function home_user()
	// {
		// $cek = $this->session->userdata('status');
		// if($cek!=null)
		// {
			// $this->load->view('user_home');
		// }
		// else
		// {
			// header('location:'.base_url());
		// }
	// }

	// function profil_user()
	// {
		// $id = $this->session->userdata('id');
		// $this->load->model('Penggunamodel');
		// $data['hasil']=$this->Penggunamodel->ubah_tampil($id);
		// $this->load->view('user_profil', $data);
	// }

	// function zakatdetail()
	// {
		// $this->load->view('user_zakat_detail');
	// }

	// function sedekahdetail()
	// {
		// $this->load->view('user_sedekah_detail');
	// }

	// function donasidetail()
	// {
		// $this->load->view('user_donasi_detail');
	// }
}
?>