<?php
Class Pdfqrcode extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index(){
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'peralatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

            $this->load->model('Checksheetmodel');
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                $this->load->model('Equipmodel');
                $data['hasil'] = $this->Equipmodel->tampil_equip_kode();
            }
            else
            {
                $this->load->model('Equipmodel');
                $data['hasil'] = $this->Equipmodel->platampil_equip_kode($this->session->userdata('plant'));
            }
            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('equip_cetak', $data);
        }
        else
        {
            redirect('home');
        }
    }

    function cetakqr(){
        $id_item = $this->input->post('id_item');
        if($id_item != "")
        {
            if($this->input->post('submit'))
            {
                $this->load->model('Equipmodel');
                $this->Equipmodel->cetak_qrcode();
            } 
            else
            {
                redirect('equip');
            }
        }
        else
        {
            $this->session->set_flashdata('item','error_choose');
            redirect ('pdfqrcode');
        }
    }
}