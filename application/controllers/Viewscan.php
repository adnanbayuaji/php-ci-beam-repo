<?php
class Viewscan extends CI_Controller
{
    //SCAN BARCODE CODE
    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'lembarpemeriksaan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Checksheetmodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            // $data['hasil'] = $this->Checksheetmodel->tampil();

            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('checksheet_scanbarcode', $data);
        }
        else
        {
            redirect('home');
        }
        
    }

    function showscan()
    {
        $this->load->model('Equipmodel');
        if($this->Equipmodel->returnfound($_POST['noijazah']))
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'lembarpemeriksaan'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Equipmodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Equipmodel->ija_tampil_id($_POST['noijazah']);
                //tampil data poin yang ada di dtl_poin
                $data['dtl_item'] = $this->Equipmodel->ija_tampilubah_dtl_item($_POST['noijazah']);
                $data['dtl_poin'] = $this->Equipmodel->ija_tampilubah_dtl_poin($_POST['noijazah']);
                $data['cek_item'] = $this->Equipmodel->ija_tampilubah_checked_item($_POST['noijazah']);
                //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
                //meload file view
                $this->load->view('checksheet_insert', $data);
            }
            else
            {
                redirect('home');
            }
        }
        else
        {
            $this->session->set_flashdata('item','error_found');
            redirect ('viewscan');
        }
    }
}
?>