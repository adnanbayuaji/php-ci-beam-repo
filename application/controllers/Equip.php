<?php
class Equip extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya
    //fungsi untuk menambahkan data
    function tambah()
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('equid', 'Nama Peralatan', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
            $this->form_validation->set_rules('area', 'Area', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
            $this->form_validation->set_rules('kode', 'Kode', 'required');
            $this->form_validation->set_rules('merk', 'Merk', 'required');
            $this->form_validation->set_rules('model', 'Model', 'required');
            $this->form_validation->set_rules('dept', 'Departemen', 'required');
            $this->form_validation->set_rules('tglcek', 'Awal Pengecekan', 'required');
            $this->form_validation->set_rules('plant', 'Lokasi Pabrik', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Equipmodel');
                //ada pengecekan true false dari kesamaan kode di db
                //menjalankan fungsi tambah data pada model
                if($this->Equipmodel->tambah())
                {
                    $this->session->set_flashdata('item','tambah');
                    //mengarahkan file ke controller 
                    //artinya mengarahkan ke index
                    redirect ('equip');
                }
                else
                {
                    $this->session->set_flashdata('item','error_kode');
                    redirect ('equip/tambah');
                }
            }
            else
            {
                $this->session->set_flashdata('item','error_required');
                redirect ('equip/tambah');
            }
        }  
        else
        {
            //dropdownlist value
            $equid = array('' => '--Pilih Jenis Alat--');
            $this->load->model('Typeequipmodel');
            $cari = $this->Typeequipmodel->tampil_aktif();
            if($cari != null)
            {
                foreach ( $cari as $key) 
                {
                    $equid[$key->equ_id] = $key->equ_nama;
                }
            }
            $data['equid'] = $equid;

            //dropdownlist value
            $area = array('' => '--Pilih Area--');
            $this->load->model('Areamodel');
            $cari = $this->Areamodel->tampil_aktif();
            if($cari != null)
            {
                foreach ( $cari as $key) 
                {
                    $area[$key->are_id] = $key->are_nama;
                }
            }
            $data['area'] = $area;

            //dropdownlist value
            $dept = array('' => '--Pilih Departemen--');
            $this->load->model('Departemenmodel');
            $cari = $this->Departemenmodel->tampil_aktif();
            if($cari != null)
            {
                foreach ( $cari as $key) 
                {
                    $dept[$key->dept_id] = $key->dept_nama;
                }
            }
            $data['dept'] = $dept;

            //dropdownlist value
            $ddlbool = false;
            $this->load->model('Checksheetmodel');
            if(!$this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
            {
                $ddlbool = true;
            }
            $plant = array('' => '--Pilih Lokasi--');
            $this->load->model('Plantmodel');
            $cari = $this->Plantmodel->tampil_aktif();
            if($cari != null)
            {
                foreach ( $cari as $key) 
                {
                    if($ddlbool)
                    {
                        if($key->pla_id==$this->session->userdata('plant'))
                        {
                            $plant[$key->pla_id] = $key->pla_kodearea." - ".$key->pla_nama;
                        }
                    }
                    else
                    {
                        $plant[$key->pla_id] = $key->pla_kodearea." - ".$key->pla_nama;
                    }
                }
                $data['plant'] = $plant;
            }
            
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'peralatan'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                $this->load->view('equip_tambah', $data);
            }
            else
            {
                redirect('equip');
            }
        }
    }

    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'peralatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $this->load->model('Checksheetmodel');
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                $this->load->model('Equipmodel');
                $data['hasil'] = $this->Equipmodel->tampil_equip();
            }
            else
            { 
                $this->load->model('Equipmodel');
                $data['hasil'] = $this->Equipmodel->platampil_equip($this->session->userdata('plant'));
            }


            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('equip_tampil', $data);
        }
        else
        {
            redirect('home');
        }
    }

     //fungsi untuk melakukan perubahan data
     function detail($id)
     {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'peralatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

            $this->load->model('Checksheetmodel');
            if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
            {  
                $this->load->model('Equipmodel');
                $data['hasil'] = $this->Equipmodel->detail($id);
            }
            else
            {
                //meload file model
                $this->load->model('Equipmodel');
                if($this->Equipmodel->returnbooldata($id, $this->session->userdata('plant')))
                {
                    $data['hasil'] = $this->Equipmodel->detail($id);
                }
                else
                {
                    redirect('Equip');
                }
            }
            $this->load->view('equip_detail', $data);
        }
        else
        {
            redirect('home');
        }
     }

    //fungsi hapus data
    function deleteon($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'peralatan'))
        {
            //meload file model
            $this->load->model('Equipmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Equipmodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
    
            //mengarahkan ke controller
            redirect('equip');
        }
        else
        {
            redirect('equip');
        }
    }

    //fungsi hapus data
    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'peralatan'))
        {
            //meload file model
            $this->load->model('Equipmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Equipmodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('equip');
        }
        else
        {
            redirect('equip');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {

        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'peralatan'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //dropdownlist value
                $equid = array('' => '--Pilih Jenis Alat--');
                $this->load->model('Typeequipmodel');
                $cari = $this->Typeequipmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $equid[$key->equ_id] = $key->equ_nama;
                    }
                }
                $data['equid'] = $equid;

                //dropdownlist value
                $area = array('' => '--Pilih Area--');
                $this->load->model('Areamodel');
                $cari = $this->Areamodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $area[$key->are_id] = $key->are_nama;
                    }
                }
                $data['area'] = $area;

                //dropdownlist value
                $ddlbool = false;
                $this->load->model('Checksheetmodel');
                if(!$this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                {
                    $ddlbool = true;
                }
                $plant = array('' => '--Pilih Lokasi--');
                $this->load->model('Plantmodel');
                $cari = $this->Plantmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        if($ddlbool)
                        {
                            if($key->pla_id==$this->session->userdata('plant'))
                            {
                                $plant[$key->pla_id] = $key->pla_kodearea." - ".$key->pla_nama;
                            }
                        }
                        else
                        {
                            $plant[$key->pla_id] = $key->pla_kodearea." - ".$key->pla_nama;
                        }
                    }
                    $data['plant'] = $plant;
                }

                //dropdownlist value
                $dept = array('' => '--Pilih Departemen--');
                $this->load->model('Departemenmodel');
                $cari = $this->Departemenmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $dept[$key->dept_id] = $key->dept_nama;
                    }
                }
                $data['dept'] = $dept;

                //return nilai didapat berupa array
                $this->load->model('Checksheetmodel');
                if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                {  
                    $this->load->model('Equipmodel');
                    $data['hasil'] = $this->Equipmodel->ubah_tampil($id);
                }
                else
                {
                    //meload file model
                    $this->load->model('Equipmodel');
                    if($this->Equipmodel->returnbooldata($id, $this->session->userdata('plant')))
                    {
                        //menjalankan fungsi ubah tampil
                        $data['hasil'] = $this->Equipmodel->ubah_tampil($id);
                    }
                    else
                    {
                        redirect('Equip');
                    }
                }
                //meload file view
                $this->load->view('equip_ubah', $data);
            }
            else
            {
                redirect('Equip');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('equid', 'Nama Peralatan', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
            $this->form_validation->set_rules('area', 'Area', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
            $this->form_validation->set_rules('kode', 'Kode', 'required');
            $this->form_validation->set_rules('merk', 'Merk', 'required');
            $this->form_validation->set_rules('model', 'Model', 'required');
            $this->form_validation->set_rules('dept', 'Departemen', 'required');
            $this->form_validation->set_rules('plant', 'Lokasi Pabrik', 'required');
            if($this->form_validation->run() == true)
            {
                //meload file model
                $this->load->model('Equipmodel');
                
                if($this->Equipmodel->ubah($id))
                {
                    $this->session->set_flashdata('item','ubah');
                    //mengarahkan file controller
                    redirect('Equip');
                }
                else
                {
                    $this->session->set_flashdata('item','error_kode');
                    redirect ('equip/update/'.$id);
                }
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'peralatan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

                //dropdownlist value
                $equid = array('' => '--Pilih Jenis Alat--');
                $this->load->model('Typeequipmodel');
                $cari = $this->Typeequipmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $equid[$key->equ_id] = $key->equ_nama;
                    }
                }
                $data['equid'] = $equid;

                //dropdownlist value
                $plant = array('' => '--Pilih Lokasi--');
                $this->load->model('Plantmodel');
                $cari = $this->Plantmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $plant[$key->pla_id] = $key->pla_kodearea." - ".$key->pla_nama;
                    }
                    $data['plant'] = $plant;
                }

                //dropdownlist value
                $area = array('' => '--Pilih Area--');
                $this->load->model('Areamodel');
                $cari = $this->Areamodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $area[$key->are_id] = $key->are_nama;
                    }
                }
                $data['area'] = $area;

                //dropdownlist value
                $dept = array('' => '--Pilih Departemen--');
                $this->load->model('Departemenmodel');
                $cari = $this->Departemenmodel->tampil_aktif();
                if($cari != null)
                {
                    foreach ( $cari as $key) 
                    {
                        $dept[$key->dept_id] = $key->dept_nama;
                    }
                }
                $data['dept'] = $dept;
                
                //meload file model
                $this->load->model('Equipmodel');

                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Equipmodel->ubah_tampil($id);

                //meload file view
                $this->load->view('equip_ubah', $data);
            }
        }
    }

    // create xlsx
    function ekspor() {
        // create file name
        $fileName = 'excel/beam-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        // $mobiledata = $this->export->mobileList();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("GA Ops 3")
            ->setLastModifiedBy("Adnan Bayu Aji")
            ->setTitle("BEAM Import")
            ->setSubject("Template BEAM Import Data")
            ->setDescription("Template BEAM Import Data XLSX, generated using PHP classes.")
            ->setKeywords("template beam import data")
            ->setCategory("Template BEAM Import Data");

        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Jenis Alat');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lokasi Pabrik');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Area');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Departemen');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Jenis');    
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Kapasitas');      
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Kode');             
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Merk');           
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Model');             
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'No Aset');              
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Tanggal Cek');    

        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '00e676')
            )
        );
        
        $objPHPExcel->setActiveSheetIndex(0);
        foreach(range('A','L') as $columnID) {
            if($columnID=='A')
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setWidth(30);
            }
            else
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setWidth(20);
            }
            $objPHPExcel->getActiveSheet()->getStyle($columnID."1")->getFont()->setBold( true );
            $objPHPExcel->getActiveSheet()->getStyle($columnID."1")->applyFromArray($style);
        }

        $thick = array ();
        $thick['borders']=array();
        $thick['borders']['allborders']=array();
        $thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THICK ;
        $objPHPExcel->getActiveSheet()->getStyle ( 'A1:L1' )->applyFromArray ($thick);
        
        $thin = array ();
        $thin['borders']=array();
        $thin['borders']['allborders']=array();
        $thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_DASHDOT ;
        $objPHPExcel->getActiveSheet()->getStyle ( 'A2:L1000' )->applyFromArray($thin);

        $BStyle = array(
            'borders' => array(
              'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK
              )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle ( 'A2:L1000' )->applyFromArray($BStyle);
        $objPHPExcel->getActiveSheet()->getStyle('L2:L1000')->getNumberFormat()->setFormatCode('dd-mm-yyyy');
        
        $this->load->model('Departemenmodel');
        $cari = $this->Departemenmodel->tampil_aktif();
        if($cari != null)
        {
            $objPHPExcel->createSheet(1);           
            $objPHPExcel->setActiveSheetIndex(1); // This is the second required line
            $this->validations = $objPHPExcel->getActiveSheet();
            $this->validations->setTitle('Validations');
            $x = 1;
            foreach ( $cari as $key) 
            {
                $this->validations->setCellValue('A'.$x, $key->dept_nama);
                $x++;
            }
            $x-=1;
        }

        $this->load->model('Areamodel');
        $cari = $this->Areamodel->tampil_aktif();
        if($cari != null)
        {        
            $objPHPExcel->setActiveSheetIndex(1); // This is the second required line
            $this->validations = $objPHPExcel->getActiveSheet();
            $y = 1;
            foreach ( $cari as $key) 
            {
                $this->validations->setCellValue('B'.$y, $key->are_nama);
                $y++;
            }
            $y-=1;
        }

        $this->load->model('Typeequipmodel');
        $cari = $this->Typeequipmodel->tampil_aktif();
        if($cari != null)
        {        
            $objPHPExcel->setActiveSheetIndex(1); // This is the second required line
            $this->validations = $objPHPExcel->getActiveSheet();
            $z = 1;
            foreach ( $cari as $key) 
            {
                $this->validations->setCellValue('C'.$z, $key->equ_nama);
                $z++;
            }
            $z-=1;
        }

        $ddlbool = false;
        $this->load->model('Checksheetmodel');
        if(!$this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
        {
            $ddlbool = true;
        }
        $this->load->model('Plantmodel');
        $cari = $this->Plantmodel->tampil_aktif();
        if($cari != null)
        {        
            $objPHPExcel->setActiveSheetIndex(1); // This is the second required line
            $this->validations = $objPHPExcel->getActiveSheet();
            $aa = 1;
            foreach ( $cari as $key) 
            {
                if($ddlbool)
                {
                    if($key->pla_id==$this->session->userdata('plant'))
                    {
                        $this->validations->setCellValue('D'.$z, $key->pla_kodearea);
                        $aa++;
                    }
                }
                else
                {
                    $this->validations->setCellValue('D'.$aa, $key->pla_kodearea);
                    $aa++;
                }
            }
            $aa-=1;
        }

        for($i = 2; $i < 1001; $i++)
        {
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('E'.$i, "--Pilih--")
                ;

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Input error');
            $objValidation->setError('Value is not in list.');
            $objValidation->setPromptTitle('Pilih Departemen');
            $objValidation->setPrompt('Pilih Departemen berdasarkan opsi yang tersedia');
            $objValidation->setFormula1('Validations!A1:A'.$x);

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getDataValidation();
            $objValidation->setPromptTitle('Masukan Tanggal');
            $objValidation->setPrompt('Masukkan tanggal dengan format "dd-mm-yyyy", ex: 31-12-2019');
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);


            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('C'.$i, "--Pilih--")
                ;

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Input error');
            $objValidation->setError('Value is not in list.');
            $objValidation->setPromptTitle('Pilih Area');
            $objValidation->setPrompt('Pilih Area berdasarkan opsi yang tersedia');
            $objValidation->setFormula1('Validations!B1:B'.$y);


            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('A'.$i, "--Pilih--")
                ;

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Input error');
            $objValidation->setError('Value is not in list.');
            $objValidation->setPromptTitle('Pilih Jenis Alat');
            $objValidation->setPrompt('Pilih Jenis Alat berdasarkan opsi yang tersedia');
            $objValidation->setFormula1('Validations!C1:C'.$z);

            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('B'.$i, "--Pilih--")
                ;

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Input error');
            $objValidation->setError('Value is not in list.');
            $objValidation->setPromptTitle('Pilih Lokasi Pabrik');
            $objValidation->setPrompt('Pilih Lokasi Pabrik berdasarkan opsi yang tersedia');
            $objValidation->setFormula1('Validations!D1:D'.$aa);
        }

        $objPHPExcel->getSheetByName('Validations')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_HIDDEN);
        $objPHPExcel->getActiveSheet()->getSheetView()->setView(PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW);

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url().$fileName);              
    }
    
    public function import(){
        // load excel library
        $this->load->library('excel');
        $this->load->model('Equipmodel');
        $upload = $this->Equipmodel->upload_file($this->filename);
        
        // include file qrlib.php
        require  FCPATH.'assets/phpqrcode/qrlib.php'; 
			
        if($upload['result'] == "success"){ // Jika proses upload sukses
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load(FCPATH.'excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            
            // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
            $data = array();
            
            $numrow = 1;
            foreach($sheet as $row){
                if($numrow > 1){
                    if($row['A']!= "--Pilih--")
                    {
                        // Kita push (add) array data ke variabel data
                        $this->load->model('Departemenmodel');
                        $cari = $this->Departemenmodel->tampil();
                        if($cari != null)
                        {
                            foreach ( $cari as $key) 
                            {
                                if($key->dept_nama == $row['E'])
                                {
                                    $row['E'] = $key->dept_id;
                                }
                            }
                        }

                        $this->load->model('Typeequipmodel');
                        $cari = $this->Typeequipmodel->tampil();
                        if($cari != null)
                        {
                            foreach ( $cari as $key) 
                            {
                                if($key->equ_nama == $row['A'])
                                {
                                    $row['A'] = $key->equ_id;
                                }
                            }
                        }

                        $this->load->model('Areamodel');
                        $cari = $this->Areamodel->tampil();
                        if($cari != null)
                        {
                            foreach ( $cari as $key) 
                            {
                                if($key->are_nama == $row['C'])
                                {
                                    $row['C'] = $key->are_id;
                                }
                            }
                        }

                        $ddlbool = false;
                        $savebool = false;
                        $this->load->model('Checksheetmodel');
                        if(!$this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                        {
                            $ddlbool = true;
                        }
                        // Kita push (add) array data ke variabel data
                        $this->load->model('Plantmodel');
                        $cari = $this->Plantmodel->tampil();
                        if($cari != null)
                        {
                            foreach ( $cari as $key) 
                            {
                                if($ddlbool)
                                {
                                    if($key->pla_id==$this->session->userdata('plant'))
                                    {
                                        if($key->pla_kodearea == $row['B'])
                                        {
                                            $row['B'] = $key->pla_id;
                                            $savebool = true;
                                        }
                                    }
                                }
                                else
                                {
                                    if($key->pla_kodearea == $row['B'])
                                    {
                                        $row['B'] = $key->pla_id;
                                        $savebool = true;
                                    }
                                }
                            }
                        }

                        // array_push($data, array(
                        //     'equ_id'=>$row['A'], // Insert data nis dari kolom A di excel
                        //     'are_id'=>$row['B'], // Insert data nama dari kolom B di excel
                        //     'deq_lokasi'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
                        //     'dept_id'=>$row['D'], // Insert data alamat dari kolom D di excel
                        //     'deq_jenis'=>$row['E'], // Insert data alamat dari kolom D di excel
                        //     'deq_kapasitas'=>$row['F'], // Insert data alamat dari kolom D di excel
                        //     'deq_kode'=>$row['G'], // Insert data alamat dari kolom D di excel
                        //     'deq_merk'=>$row['H'], // Insert data alamat dari kolom D di excel
                        //     'deq_model'=>$row['I'], // Insert data alamat dari kolom D di excel
                        //     'deq_noasset'=>$row['J'] // Insert data alamat dari kolom D di excel
                        //     // 'deq_tglcek'=>$row['K'] // Insert data alamat dari kolom D di excel
                        // ));
                        // echo '<script language="javascript">';
                        // echo 'alert("a'.$row['K'].'")';
                        // echo '</script>';

                        //ada pengecekan true false dari kesamaan kode di db
                        //jika ada yang sama, maka kosongkan kode dan ngga generate
                        //jika beda, maka isi kode dan generate 
                        
                        if($savebool)
                        {
                            $this->Equipmodel->insert_import($row['A'],$row['D'],$row['B'],$row['C'],$row['F'],$row['G'],$row['H'],$row['I'],$row['J'],$row['E'],$row['K'],$row['L'], 'Aktif');
                        }
                        //kode ada di deret G
                        //validasi ada di kode harus unique
                        //jika import, maka jika ada kode yang tidak unique maka kode dikosongkan dan barcode tidak di generate 
                        //jika tambah, maka jika ada kode yang tidak unique maka data ditolak dan kembali ke halaman tambah data


                    }
                }
                $numrow++; // Tambah 1 setiap kali looping
            }
            // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
            // $this->SiswaModel->insert_multiple($data);
        }
        
        $this->session->set_flashdata('item','import');
		redirect("Equip"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }
    
    function generateqr($id)
    {    
        // include file qrlib.php
        require  FCPATH.'assets/phpqrcode/qrlib.php'; 
        $this->load->model('Equipmodel');
        $this->Equipmodel->genqrcode($id);
        $this->session->set_flashdata('item','genqrcode');
        redirect('equip');
    }
}
?>