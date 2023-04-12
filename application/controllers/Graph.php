<?php
class Graph extends CI_Controller
{       
    function index()
    {

    }
    
    // function load_grafik()
    // {
    //     $awal = isset($_POST['awal']) ? $_POST['awal'] : null;
    //     $akhir = isset($_POST['akhir']) ? $_POST['akhir'] : null;
    //     if($awal == null && $akhir == null)
    //     {
    //         $awal = $this->input->get('awal');
    //         $akhir = $this->input->get('akhir');
    //         $this->load->model('Grafikmodel');
    //         $result = $this->Grafikmodel->tampil_grafik_harian();
    //         //$this->load->view('grafik_zakat');
    //         echo json_encode($result);
    //     }
        // else if($awal == null)
        // {
        //     $awal = $this->input->get('awal');
        //     $akhir = $this->input->get('akhir');
        //     $this->load->model('Grafikmodel');
        //     $result = $this->Grafikmodel->tampil_grafik_harian();
        //     //$this->load->view('grafik_zakat');
        //     echo json_encode($result);
        // }
        // else if($akhir == null)
        // {
        //     $awal = $this->input->get('awal');
        //     $akhir = $this->input->get('akhir');
        //     $this->load->model('Grafikmodel');
        //     $result = $this->Grafikmodel->tampil_grafik_harian();
        //     //$this->load->view('grafik_zakat');
        //     echo json_encode($result);
        // }
        // else
        // {
        //     $awal = $this->input->get('awal');
        //     $akhir = $this->input->get('akhir');
        //     $this->load->model('Grafikmodel');
        //     $result = $this->Grafikmodel->tampil_grafik_harian();
        //     //$this->load->view('grafik_zakat');
        //     echo json_encode($result);
        // }
    // }
    
    function harian()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'laporan'))
        {
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
            // echo "<script type='text/javascript'>alert('$awal');</script>";
            
            $this->load->model('Checksheetmodel');
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                $this->load->model('Grafikmodel');
                $data['equip'] = $this->Grafikmodel->tabel_equip(); 
                $data['equips'] = $this->Grafikmodel->tabel_equip();
                if($awal == null && $akhir == null)
                {
                    $data['hasil'] = $this->Grafikmodel->tabel_harian1(null);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok1(null);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok1(null);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc1(null);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback1(null);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian(null);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc(null);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback(null);
                }
                else if($awal == null)
                {
                    $time = strtotime($this->input->post('akhir'));
                    $akhir = date('Y-m-d',$time);
                    $data['hasil'] = $this->Grafikmodel->tabel_harian3(null,$akhir);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok3(null,$akhir);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok3(null,$akhir);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc3(null,$akhir);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback3(null,$akhir);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian2(null,$akhir);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc2(null,$akhir);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback2(null,$akhir);
                }
                else if($akhir == null)
                {
                    $time = strtotime($this->input->post('awal'));
                    $awal = date('Y-m-d',$time);
                    
                    $data['hasil'] = $this->Grafikmodel->tabel_harian2(null,$awal);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok2(null,$awal);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok2(null,$awal);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc2(null,$awal);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback2(null,$awal);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian3(null,$awal);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc3(null,$awal);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback3(null,$awal);
                } 
                else
                {
                    $time = strtotime($this->input->post('awal'));
                    $awal = date('Y-m-d',$time);
                    $time = strtotime($this->input->post('akhir'));
                    $akhir = date('Y-m-d',$time);
                    $data['hasil'] = $this->Grafikmodel->tabel_harian4(null,$awal,$akhir);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok4(null,$awal,$akhir);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok4(null,$awal,$akhir);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc4(null,$awal,$akhir);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback4(null,$awal,$akhir);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian4(null,$awal,$akhir);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc4(null,$awal,$akhir);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback4(null,$awal,$akhir);
                } 
            }
            else
            {
                $this->load->model('Grafikmodel');
                $data['equip'] = $this->Grafikmodel->tabel_equip(); 
                $data['equips'] = $this->Grafikmodel->tabel_equip();
                if($awal == null && $akhir == null)
                {
                    $data['hasil'] = $this->Grafikmodel->tabel_harian1($this->session->userdata('plant'));
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok1($this->session->userdata('plant'));
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok1($this->session->userdata('plant'));
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc1($this->session->userdata('plant'));
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback1($this->session->userdata('plant'));
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian($this->session->userdata('plant'));
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc($this->session->userdata('plant'));
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback($this->session->userdata('plant'));
                }
                else if($awal == null)
                {
                    $time = strtotime($this->input->post('akhir'));
                    $akhir = date('Y-m-d',$time);
                    $data['hasil'] = $this->Grafikmodel->tabel_harian3($this->session->userdata('plant'),$akhir);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok3($this->session->userdata('plant'),$akhir);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok3($this->session->userdata('plant'),$akhir);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc3($this->session->userdata('plant'),$akhir);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback3($this->session->userdata('plant'),$akhir);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian2($this->session->userdata('plant'),$akhir);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc2($this->session->userdata('plant'),$akhir);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback2($this->session->userdata('plant'),$akhir);
                }
                else if($akhir == null)
                {
                    $time = strtotime($this->input->post('awal'));
                    $awal = date('Y-m-d',$time);
                    
                    $data['hasil'] = $this->Grafikmodel->tabel_harian2($this->session->userdata('plant'),$awal);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok2($this->session->userdata('plant'),$awal);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok2($this->session->userdata('plant'),$awal);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc2($this->session->userdata('plant'),$awal);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback2($this->session->userdata('plant'),$awal);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian3($this->session->userdata('plant'),$awal);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc3($this->session->userdata('plant'),$awal);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback3($this->session->userdata('plant'),$awal);
                } 
                else
                {
                    $time = strtotime($this->input->post('awal'));
                    $awal = date('Y-m-d',$time);
                    $time = strtotime($this->input->post('akhir'));
                    $akhir = date('Y-m-d',$time);
                    $data['hasil'] = $this->Grafikmodel->tabel_harian4($this->session->userdata('plant'),$awal,$akhir);
                    $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok4($this->session->userdata('plant'),$awal,$akhir);
                    $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok4($this->session->userdata('plant'),$awal,$akhir);
                    $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc4($this->session->userdata('plant'),$awal,$akhir);
                    $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback4($this->session->userdata('plant'),$awal,$akhir);
                    $data['datas'] = $this->Grafikmodel->tampil_grafik_harian4($this->session->userdata('plant'),$awal,$akhir);
                    $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc4($this->session->userdata('plant'),$awal,$akhir);
                    $data['feedback'] = $this->Grafikmodel->tampil_feedback4($this->session->userdata('plant'),$awal,$akhir);
                } 
            }
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'laporan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('grafik_harian', $data);
        }
        else
        {
            redirect('home');
        }
    }

    function bulanan_ajax()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'laporan'))
        {
            $tahun = $this->input->post('tahun');
            
            $this->load->model('Checksheetmodel');
			
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'laporan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            //ddl
            // $arraytahun = array('' => '--Pilih Tahun--');
            $this->load->model('Checksheetmodel');
            $data['tahun'] = $this->Checksheetmodel->tampil_tahun_admin();
            $this->load->view('grafik_bulanan_ajax', $data);
        }
        else
        {
            redirect('home');
        }
    }
    
    function kondisiitem()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'laporan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'laporan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->model('Checksheetmodel');
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                $this->load->model('Grafikmodel');
                $data['hasil'] = $this->Grafikmodel->tabel_item(null);
                $data['datas'] = $this->Grafikmodel->tampil_grafik_item(null);
            }
            else
            {
                $this->load->model('Grafikmodel');
                $data['hasil'] = $this->Grafikmodel->tabel_item($this->session->userdata('plant'));
                $data['datas'] = $this->Grafikmodel->tampil_grafik_item($this->session->userdata('plant'));
            }
            $this->load->view('grafik_kondisi_item_filter', $data);
        }
        else
        {
            redirect('home');
        }
    }

    function load_grafik_bulan_admin($tahun)
    { 
        $this->load->model('Checksheetmodel');
        $result = $this->Checksheetmodel->tampil_grafik_bulan_admin($tahun);
        echo json_encode($result);
    }

    function bulanan()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'laporan'))
        {
            $tahun = $this->input->post('tahun');
            
            $this->load->model('Checksheetmodel');
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                $this->load->model('Grafikmodel');
                $data['equip'] = $this->Grafikmodel->tabel_equip(); 
                $data['equips'] = $this->Grafikmodel->tabel_equip();
                
                $data['hasil'] = $this->Grafikmodel->tabel_harian_bulan(null,$tahun);
                $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok_bulan(null,$tahun);
                $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok_bulan(null,$tahun);
                $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc_bulan(null,$tahun);
                $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback_bulan(null,$tahun);
                $data['datas'] = $this->Grafikmodel->tampil_grafik_bulan(null,$tahun);
                $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc_bulan(null,$tahun);
                $data['feedback'] = $this->Grafikmodel->tampil_feedback_bulan(null,$tahun);
            }
            else
            {
                $this->load->model('Grafikmodel');
                $data['equip'] = $this->Grafikmodel->tabel_equip(); 
                $data['equips'] = $this->Grafikmodel->tabel_equip();
                
                $data['hasil'] = $this->Grafikmodel->tabel_harian_bulan($this->session->userdata('plant'),$tahun);
                $data['hasilok'] = $this->Grafikmodel->tabel_harian_ok_bulan($this->session->userdata('plant'),$tahun);
                $data['hasilnok'] = $this->Grafikmodel->tabel_harian_nok_bulan($this->session->userdata('plant'),$tahun);
                $data['hasilokbyfunc'] = $this->Grafikmodel->tabel_harian_okbyfunc_bulan($this->session->userdata('plant'),$tahun);
                $data['hasilfeedback'] = $this->Grafikmodel->tabel_harian_feedback_bulan($this->session->userdata('plant'),$tahun);
                $data['datas'] = $this->Grafikmodel->tampil_grafik_bulan($this->session->userdata('plant'),$tahun);
                $data['oknokbyfunc'] = $this->Grafikmodel->tampil_oknokbyfunc_bulan($this->session->userdata('plant'),$tahun);
                $data['feedback'] = $this->Grafikmodel->tampil_feedback_bulan($this->session->userdata('plant'),$tahun);
            }
            $tahun = array('' => '--Pilih Lokasi--');
            $this->load->model('Checksheetmodel');
            $cari = $this->Checksheetmodel->tampil_tahun_admin();
            if($cari != null)
            {
                foreach ( $cari as $key) 
                {
                    $tahun[$key->tahun] = $key->tahun;
                }
                $data['tahun'] = $tahun;
            }
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'laporan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('grafik_bulanan', $data);
        }
        else
        {
            redirect('home');
        }
    }
}
?>