<?php
class Area extends CI_Controller
{
    private $filename = "import_data_itemcheck"; // Kita tentukan nama filenya
    //fungsi untuk menambahkan data
    function tambah()
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Areamodel');

                //menjalankan fungsi tambah data pada model
                $this->Areamodel->tambah();
                $this->session->set_flashdata('item','tambah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('area');
            }
        } 
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'area'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'area');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('area_tambah', $data);
        }
        else
        {
            redirect('area');
        }
    }

    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'area'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'area');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Areamodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $data['hasil'] = $this->Areamodel->tampil();

            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('area_tampil', $data);
        }
        else
        {
            redirect('home');
        }
    }

    // create xlsx
    function ekspor() {
        // create file name
        $fileName = 'excel/beam-area-'.time().'.xlsx';  
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
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Area');  

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
        foreach(range('A','A') as $columnID) {
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
        $objPHPExcel->getActiveSheet()->getStyle ( 'A1' )->applyFromArray ($thick);
        
        $thin = array ();
        $thin['borders']=array();
        $thin['borders']['allborders']=array();
        $thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_DASHDOT ;
        $objPHPExcel->getActiveSheet()->getStyle ( 'A2:A1000' )->applyFromArray($thin);

        $BStyle = array(
            'borders' => array(
              'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK
              )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle ( 'A2:A1000' )->applyFromArray($BStyle);

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
        $this->load->model('Areamodel');
		$upload = $this->Areamodel->upload_file($this->filename);
			
            if($upload['result'] == "success"){ // Jika proses upload sukses
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load(FCPATH.'excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            
            // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
            $data = array();
            
            $numrow = 1;
            foreach($sheet as $row){
                if($numrow > 1){
                    if($row['A']!= "")
                    {
                        $this->Areamodel->insert_import($row['A']);
                    }
                }
                $numrow++; // Tambah 1 setiap kali looping
            }
            // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
            // $this->SiswaModel->insert_multiple($data);
        }
        
        $this->session->set_flashdata('item','import');
		redirect("Area"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

    //fungsi hapus data
    function deleteon($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'area'))
        {
            //meload file model
            $this->load->model('Areamodel');
    
            //menjalankan fungsi hapus pada model
            $this->Areamodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
    
            //mengarahkan ke controller
            redirect('Area');
        }
        else
        {
            redirect('Area');
        }
    }

    //fungsi hapus data
    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'area'))
        {
            //meload file model
            $this->load->model('Areamodel');
    
            //menjalankan fungsi hapus pada model
            $this->Areamodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('Area');
        }
        else
        {
            redirect('Area');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'area'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'area');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Areamodel');
        
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Areamodel->ubah_tampil($id);
    
                //meload file view
                $this->load->view('area_ubah', $data);
            }
            else
            {
                redirect('area');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            if($this->form_validation->run() == true)
            {
                 //meload file model
                $this->load->model('Areamodel');

                //menjalankan fungsi ubah 
                $this->Areamodel->ubah($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Area');
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'area');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //mengarahkan file controller
                // redirect('Area/update/'.$id);//meload file model
                $this->load->model('Areamodel');
        
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Areamodel->ubah_tampil($id);
                $this->load->view('area_ubah',$data);
            }
        }
    }
}
?>