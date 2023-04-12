<?php
class Checksheet extends CI_Controller
{
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
			if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
			{
                //mengambil nilai pengambalian dari fungsi tampil pada model
                //return nilai didapat berupa array
                $data['hasil'] = $this->Checksheetmodel->tampil();
            }
            else
            {
                $data['hasil'] = $this->Checksheetmodel->platampil($this->session->userdata('plant'));
            }
            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('checksheet_equip', $data);
        }
        else
        {
            redirect('home');
        }
    }

    //fungsi untuk melakukan perubahan data
    function insert()
    {   
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            // $this->form_validation->set_rules('nama', 'Nama', 'required');

            // if($this->form_validation->run() == true)
            // {
                //load file model 
                $this->load->model('Checksheetmodel');

                //menjalankan fungsi tambah data pada model
                $bool = $this->Checksheetmodel->tambah($this->session->userdata('id'));
                if($bool)
                {
                    $this->session->set_flashdata('item','tambah');
                    //mengarahkan file ke controller 
                    //artinya mengarahkan ke index
                    redirect ('checksheet/sentdraft');
                }
                else
                {

                }
            // }
        } 

        $equid =  $this->uri->segment(3);
        $deqid =  $this->uri->segment(4);

        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'lembarpemeriksaan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah tampil
            $data['hasil'] = $this->Checksheetmodel->tampil_id($deqid);
            $this->load->model('Typeequipmodel');
            //tampil data poin yang ada di dtl_poin
            $data['dtl_item'] = $this->Typeequipmodel->tampilubah_dtl_item($equid);
            $data['dtl_poin'] = $this->Typeequipmodel->tampilubah_dtl_poin($equid);
            $data['cek_item'] = $this->Typeequipmodel->tampilubah_checked_item($equid);
            //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
            //meload file view
            $this->load->view('checksheet_insert', $data);
        }
        else
        {
            redirect('home');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            // $update = $this->uri->segment(3);
            // $equid =  $this->uri->segment(4);
            // $deqid =  $this->uri->segment(5);

            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'lembarpemeriksaan'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                
                //meload file model
                $this->load->model('Checksheetmodel');
                
                //TAMPIL YANG BAGIAN TRANSAKSI UTAMA 
                $data['hasil'] = $this->Checksheetmodel->updateshow($id);
                
                //TAMPIL DATA MASTER [DETAIL TRANSAKSI]
                $this->load->model('Typeequipmodel');
                //tampil data poin yang ada di dtl_poin

                $data['dtl_poin'] = $this->Typeequipmodel->viewupdate_dtl_poin($id);
                $data['dtl_item'] = $this->Typeequipmodel->viewupdate_checked_item($id);

                //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
                //meload file view
                $this->load->view('checksheet_update', $data);
            }
            else
            {
                redirect('checksheet');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            // $this->form_validation->set_rules('nama', 'Nama', 'required');

            // if($this->form_validation->run() == true)
            // {
                //load file model 
                $this->load->model('Checksheetmodel');

                //menjalankan fungsi tambah data pada model
                $this->Checksheetmodel->updatedraft($id);
                $this->session->set_flashdata('item','ubah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('checksheet/sentdraft');
            // }
        }
    }

    //fungsi untuk melakukan perubahan data
    function history()
    {   
        $equid =  $this->uri->segment(3);
        $deqid =  $this->uri->segment(4);

        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'lembarpemeriksaan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah tampil
            $data['hasil'] = $this->Checksheetmodel->tampil_id($deqid);
            $data['detail'] = $this->Checksheetmodel->detail_id($deqid);

            $this->load->view('checksheet_history', $data);
        }
        else
        {
            redirect('home');
        }
    }

    //fungsi untuk melakukan perubahan data
    function detail_history()
    {   
        $deqid =  $this->uri->segment(3);
        $tchid =  $this->uri->segment(4);
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'lembarpemeriksaan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'lembarpemeriksaan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah tampil
            $data['hasil'] = $this->Checksheetmodel->tampil_id($deqid); 
            $data['tch'] = $this->Checksheetmodel->tampil_idtch($tchid); 
            $data['item'] = $this->Checksheetmodel->tampil_dtl_history1($tchid); 
            $data['poin'] = $this->Checksheetmodel->tampil_dtl_history2($tchid); 
            //meload file view
            $this->load->view('checksheet_detailhistory', $data);
        }
        else
        {
            redirect('home');
        }
    }

    //fungsi untuk melakukan perubahan data
    function sentdraft()
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnboolspecial($this->session->userdata('role'), 'sentdraft'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'sentdraft');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                
                //menampilkan data draft, approvega, approveuser, dan approved
                $this->load->model('Checksheetmodel');
                if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                {
                    $data['draft'] = $this->Checksheetmodel->tampil_draft($this->session->userdata('role')); 
                    $data['approvega'] = $this->Checksheetmodel->daftar_approvega(); 
                    $data['approved'] = $this->Checksheetmodel->tampil_approved(); 
                    $data['rejected'] = $this->Checksheetmodel->tampil_rejected(); 
                }
                else
                {
                    $data['draft'] = $this->Checksheetmodel->platampil_draft($this->session->userdata('role'), $this->session->userdata('plant')); 
                    $data['approvega'] = $this->Checksheetmodel->pladaftar_approvega($this->session->userdata('plant')); 
                    $data['approved'] = $this->Checksheetmodel->platampil_approved($this->session->userdata('plant')); 
                    $data['rejected'] = $this->Checksheetmodel->platampil_rejected($this->session->userdata('plant')); 
                }
                $this->load->view('checksheet_sentdraft', $data);
            }
            else
            {
                $this->load->helper('url');
                $this->session->set_userdata('last_page', current_url());
                redirect('home');
            }
        }
        else
        {
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah 
            $boolean = $this->Checksheetmodel->sent();
            if($boolean) $this->session->set_flashdata('item','ubah');
            else $this->session->set_flashdata('item','error_sent');
            //mengarahkan file controller
            echo "<script>
			window.location.href='sentdraft';
			</script>";
            // redirect('Checksheet/sentdraft');
        }
    }

    //fungsi untuk melakukan perubahan data
    public function listjumlah()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Daftar Lembar Pemeriksaan";
        $data['datalist'] = $this->Checksheetmodel->listchecksheet($this->session->userdata('plant'),"jumlah"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listontime()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Lembar Pemeriksaan Tepat Waktu ";
        $data['datalist'] = $this->Checksheetmodel->listchecksheet($this->session->userdata('plant'),"ontime"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listoverdue()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Lembar Pemeriksaan Terlambat";
        $data['datalist'] = $this->Checksheetmodel->listchecksheet($this->session->userdata('plant'),"overdue"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listjumlahall()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Daftar Lembar Pemeriksaan";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetall("jumlah"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listontimeall()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Lembar Pemeriksaan Tepat Waktu ";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetall("ontime"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listoverdueall()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Lembar Pemeriksaan Terlambat";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetall("overdue"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listnok()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Peralatan yang tidak OK";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetnokbyfunc($this->session->userdata('plant'),"nok"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listokbyfunc()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Peralatan yang OK secara fungsi";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetnokbyfunc($this->session->userdata('plant'),"okbyfunc"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listnokall()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Peralatan yang tidak OK";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetnokbyfuncall("nok"); 
        $this->load->view('checksheet_list', $data);
    }

    public function listokbyfuncall()
    {
        $this->load->model('Checksheetmodel');
        $data['title']="Peralatan yang OK secara fungsi";
        $data['datalist'] = $this->Checksheetmodel->listchecksheetnokbyfuncall("okbyfunc"); 
        $this->load->view('checksheet_list', $data);
    }

    function berandakonfir()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->berandakonfir();
        if($boolean) $this->session->set_flashdata('item','ubah');
        else $this->session->set_flashdata('item','error_ubah');
        //mengarahkan file controller
        redirect('Home');
    }

    function tolakdata()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->tolakdraft();
        if($boolean) $this->session->set_flashdata('item','tolak');
        else $this->session->set_flashdata('item','error_tolak');
        //mengarahkan file controller
        redirect('Checksheet/sentdraft');
    }

    function tolakdatadash()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->tolakdatadash();
        if($boolean) $this->session->set_flashdata('item','tolak');
        else $this->session->set_flashdata('item','error_tolak');
        //mengarahkan file controller
        redirect('Home');
    }

    function tolakdataga()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->tolakbyga();
        if($boolean) $this->session->set_flashdata('item','tolak');
        else $this->session->set_flashdata('item','error_tolak');

        //mengarahkan file controller
        // redirect('Checksheet/sentapprovega');
        echo "<script>
        window.location.href='sentapprovega';
        </script>";
    }

    // function tolakdatauser()
    // {
    //     //meload file model
    //     $this->load->model('Checksheetmodel');
    //     //menjalankan fungsi ubah 
    //     $boolean = $this->Checksheetmodel->tolakbyuser();
    //     if($boolean) $this->session->set_flashdata('item','tolak');
    //     else $this->session->set_flashdata('item','error_tolak');

    //     //mengarahkan file controller
    //     // redirect('Checksheet/sentapproveuser');
        
    //     echo "<script>
    //     window.location.href='sentapproveuser';
    //     </script>";
    // }

    //fungsi untuk melakukan perubahan data
    function sentapprovega()
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnboolspecial($this->session->userdata('role'), 'sentapprovega'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'sentapprovega');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

                $this->load->model('Checksheetmodel');
                if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                {
                    $data['approvega'] = $this->Checksheetmodel->tampil_approvega(); 
                    $data['approved'] = $this->Checksheetmodel->tampil_approved(); 
                }
                else
                {
                    $data['approvega'] = $this->Checksheetmodel->platampil_approvega($this->session->userdata('plant')); 
                    $data['approved'] = $this->Checksheetmodel->platampil_approved($this->session->userdata('plant')); 
                }
                $this->load->view('checksheet_sentapprovega', $data);
            }
            else
            {
                $this->load->helper('url');
                $this->session->set_userdata('last_page', current_url());
                redirect('home');
            }
        }
        else
        {
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah 
            $boolean = $this->Checksheetmodel->sentapprovega();
            if($boolean) $this->session->set_flashdata('item','ubah');
            else $this->session->set_flashdata('item','error_sent');

            //mengarahkan file controller
            // redirect('Checksheet/sentapprovega');
            
            echo "<script>
			window.location.href='sentapprovega';
			</script>";
        }
    }

    //fungsi untuk melakukan perubahan data
    function readCatatan()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->readCatatan();
        if($boolean) $this->session->set_flashdata('item','ubah');
        else $this->session->set_flashdata('item','error_sent');

        //mengarahkan file controller
        // redirect('Checksheet/sentapprovega');
        
        echo "<script>
        window.location.href='../../home';
        </script>";
    }

    //fungsi untuk melakukan perubahan data
    function readFeedback()
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $boolean = $this->Checksheetmodel->readFeedback();
        if($boolean) $this->session->set_flashdata('item','ubah');
        else $this->session->set_flashdata('item','error_sent');

        //mengarahkan file controller
        // redirect('Checksheet/sentapprovega');
        
        echo "<script>
        window.location.href='../../home';
        </script>";
    }

    //fungsi untuk melakukan perubahan data
    function sentapproveuser()
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnboolspecial($this->session->userdata('role'), 'sentapproveuser'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'sentapproveuser');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

                $this->load->model('Checksheetmodel');
                if($this->Checksheetmodel->returnbooladmin($this->session->userdata('role')))
                {
                    $data['approveuser'] = $this->Checksheetmodel->tampil_approveuser($this->session->userdata('role'), $this->session->userdata('dept')); 
                    $data['approved'] = $this->Checksheetmodel->tampil_approved(); 
                }
                else
                {
                    $data['approveuser'] = $this->Checksheetmodel->platampil_approveuser($this->session->userdata('role'), $this->session->userdata('dept'), $this->session->userdata('plant')); 
                    $data['approved'] = $this->Checksheetmodel->platampil_approved($this->session->userdata('plant')); 
                }
                $this->load->view('checksheet_sentapproveuser', $data);
            }
            else
            {
                $this->load->helper('url');
                $this->session->set_userdata('last_page', current_url());
                redirect('home');
            }
        }
        else
        {
            //meload file model
            $this->load->model('Checksheetmodel');
            //menjalankan fungsi ubah 
            $boolean = $this->Checksheetmodel->sentapproveuser();
            if($boolean) $this->session->set_flashdata('item','ubah');
            else $this->session->set_flashdata('item','error_sent');

            //mengarahkan file controller
            // redirect('Checksheet/sentapproveuser');
            echo "<script>
			window.location.href='sentapproveuser';
			</script>";
        }
    }

    public function getViewData()
	{
        $tchData = $this->input->post('tchData');
        if(isset($tchData) and !empty($tchData)){
            $this->load->model('Checksheetmodel');
            $records = $this->Checksheetmodel->getViewData($tchData);
            $output = '';
            // $row = $records->row();
            foreach($records->result_array() as $row){
                if($row["tch_approval"]=="draft")$row["tch_approval"]="Draft";
                else if($row["tch_approval"]=="approvebyga")$row["tch_approval"]="Approve By PIC GA";
                else if($row["tch_approval"]=="approvebyuser")$row["tch_approval"]="Approve By PIC User";
                else if($row["tch_approval"]=="approved")$row["tch_approval"]="Approved";
                else if($row["tch_approval"]=="rejectedbyga")$row["tch_approval"]="Rejected By PIC GA";
                else if($row["tch_approval"]=="rejectedbyuser")$row["tch_approval"]="Rejected By PIC User";
                else if($row["tch_approval"]=="rejected")$row["tch_approval"]="Rejected";
                if($row["tch_alasan"]=="")$row["tch_alasan"]="-";
                if($row["ok_item"]=="") $row["ok_item"] = "-";
                if($row["repair_item"]=="") $row["repair_item"] = "-";
                if($row["broken_item"]=="") $row["broken_item"] = "-";
                $output .= '
                <h4 class="modal-title">Detail Data <label class="control-label" id="lblJudul">'.$row["equ_nama"].' '.$row["are_nama"].' '.$row["deq_lokasi"].'</label></h4>
                <hr/>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <div class="form-group">
                            <label class="control-label">Tanggal</label><br/>'.$row["tch_tanggal"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode</label><br/>'.$row["deq_kode"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kondisi</label><br/>'.$row["tch_oknok"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">Dibuat oleh</label><br/>'.$row["usr_nama"].'
                        </div>
                        </div>
                        <div class="col-md-6" align="center">
                        <div class="form-group">
                            <label class="control-label">Total Itemcheck</label><br/>'.$row["total_item"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">OK</label><br/>'.$row["ok_item"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">Repaired</label><br/>'.$row["repair_item"].'
                        </div>
                        <div class="form-group">
                            <label class="control-label">Broken</label><br/>'.$row["broken_item"].'
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" align="center">
                            <label class="control-label">Status</label><br/>'.$row["tch_statuscek"].'
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" align="center">
                            <label class="control-label">Status Pengajuan</label><br/>'.$row["tch_approval"].'
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" align="center">
                            <label class="control-label">Alasan Penolakan</label><br/>'.$row["tch_alasan"].'
                        </div>
                    </div>
                </div>
                <hr>';
                if($row["tch_statusketerangan"]=="1"||$row["tch_statuscatatan"]=="1"||$row["tch_statusfeedback"]=="1"){
                    $output .= '
                    <div class="table-responsive text-align:center">
                    <table id="example999" class="table table-striped center">
                        <thead>
                            <tr>
                                <th><center>Dari</center></th>
                                <th><center>Deskripsi</center></th>
                                <th><center>Bukti</center></th>
                            </tr>
                        </thead>
                        <tbody class="table">';
                        if($row["tch_statusketerangan"]=="1"){
                            $output .= '
                            <tr>
                                <td><center>Teknisi</center></td>
                                <td>'.$row["tch_keterangan"].'</td>
                                <td><center><img src="'.base_url().'/gambar/'.$row["tch_fotoketerangan"].'" height="100" alt="User Image"></center></td>
                            </tr>';
                        }
                        if($row["tch_statuscatatan"]=="1"){
                            $output .= '
                            <tr>
                                <td><center>PIC GA</center></td>
                                <td>'.$row["tch_catatan"].'</td>
                                <td><center><img src="'.base_url().'/gambar/'.$row["tch_fotocatatan"].'" height="100" alt="User Image"></center></td>
                            </tr>';
                        }
                        if($row["tch_statusfeedback"]=="1"){
                            $output .= '
                            <tr>
                                <td><center>PIC User</center></td>
                                <td>'.$row["tch_feedback"].'</td>
                                <td><center><img src="'.base_url().'/gambar/'.$row["tch_fotofeedback"].'" height="100" alt="User Image"></center></td>
                            </tr>';
                        }
                        $output .= '
                        </tbody>
                    </table>
                    </div>
                    <hr/>
                    ';
                }

                $this->load->model('Checksheetmodel');
                $ress = $this->Checksheetmodel->tampilansaae($row["tch_id"]);
                if(!empty($ress))
                {
                    $output .= '
                    <div class="table-responsive text-align:center">
                        <table id="example998" class="table table-striped center">
                            <thead>
                                <tr>
                                    <th><center>Poin Pemeriksaan</center></th>
                                    <th><center>Standard</center></th>
                                    <th><center>Angka</center></th>
                                </tr>
                            </thead>
                            <tbody class="table">
                            ';
                    foreach($ress->result_array() as $rowss){    
                        $output .= '<tr>
                        <td>'.$rowss["dpo_namapoin"].'</td>
                        <td>'.$rowss["dpo_standar_min"].'-'.$rowss["dpo_standar_max"].'</td>
                        <td>'.$rowss["tdp_nilai"].' '.$rowss["dpo_satuan"].'</td>
                        </tr>';
                    }
                    $output .='
                            </tbody>
                        </table>
                    </div>
                    ';
                }

                $this->load->model('Checksheetmodel');
                $ress = $this->Checksheetmodel->tampilanjoss($row["tch_id"]);
                if(!empty($ress))
                {
                    $output .= '
                    <div class="table-responsive text-align:center">
                        <table id="example998" class="table table-striped center">
                            <thead>
                                <tr>
                                    <th><center>Item Pemeriksaan</center></th>
                                    <th><center>Kriteria</center></th>
                                </tr>
                            </thead>
                            <tbody class="table">
                            ';
                    foreach($ress->result_array() as $rowss){    
                        $output .= '<tr>
                        <td>'.$rowss["ite_obyek"].'</td>';
                        if($rowss["tdi_kondisi"]=='1')$output .= '<td>OK</td></tr>';
                        if($rowss["tdi_kondisi"]=='2')$output .= '<td>Repaired</td></tr>';
                        if($rowss["tdi_kondisi"]=='3')$output .= '<td>Broken</td></tr>';
                    }
                    $output .='
                            </tbody>
                        </table>
                    </div>
                    ';
                }
                
                $output .= '
                </div>
                        ';

            }				
            echo $output;
        }
        else {
            echo '
            <h4 class="modal-title">Detail Data <label class="control-label" id="lblJudul"></label></h4>
            </div>
            <div class="modal-body">
            <center><ul class="list-group"><li class="list-group-item">'.'Select a Checksheet'.'</li></ul></center>';
        }
 
    }
    
    public function setCatatan()
	{
        $tchData = $this->input->post('tchData');
        if(isset($tchData) and !empty($tchData)){
            $this->load->model('Checksheetmodel');
            $records = $this->Checksheetmodel->getCatatan($tchData);
            $output = '';
            foreach($records->result_array() as $row){
                echo '
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Catatan untuk <b>'.$row["equ_nama"].' '.$row['are_nama'].' '.$row['deq_lokasi'].'</b>'.'</h4>
                    </div>';
                        echo form_open('checksheet/catatan/'.$tchData, 'enctype="multipart/form-data" id="frm-tolak"');
                echo '
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="control-label">Catatan untuk User</label>
                        ';
                    
                if($row["tch_catatan"]!="")
                {
                    $data = array(
                        'name'        => 'txtCatatan',
                        'id'          => 'txtCatatan',
                        'rows'        => '5',
                        'cols'        => '10',
                        'style'       => 'width:100%',
                        'class'       => 'form-control tinymce',
                        'value'       => $row['tch_catatan']
                    );
                    echo form_textarea($data);
                } 
                else
                {
                    $data = array(
                        'name'        => 'txtCatatan',
                        'id'          => 'txtCatatan',
                        'rows'        => '5',
                        'cols'        => '10',
                        'style'       => 'width:100%',
                        'class'       => 'form-control tinymce'
                    );
                    echo form_textarea($data);
                }      
                
                echo '
                <label class="control-label">Unggah Gambar</label>
                <input type="file" name="file" class="form-control">
                </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                ';
                echo form_submit('submit', 'Simpan', 'id="submit-poin" class="btn btn-primary" data-loading-text="Processing"');
                echo '
                </div>';
            }				
            echo $output;
        } 
    }

    public function setFeedback()
	{
        $tchData = $this->input->post('tchData');
        if(isset($tchData) and !empty($tchData)){
            $this->load->model('Checksheetmodel');
            $records = $this->Checksheetmodel->getFeedback($tchData);
            $output = '';
            foreach($records->result_array() as $row){
                echo '
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Feedback untuk '.$row["equ_nama"].' '.$row['are_nama'].' '.$row['deq_lokasi'].''.'</h4>
                    </div>';
                        echo form_open('checksheet/feedback/'.$tchData, 'enctype="multipart/form-data" id="frm-tolak"');
                echo '
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="control-label">Feedback untuk GA</label>';
                
                if($row["tch_feedback"]!="")
                {
                    $data = array(
                        'name'        => 'txtFeedback',
                        'id'          => 'txtFeedback',
                        'rows'        => '5',
                        'cols'        => '10',
                        'style'       => 'width:100%',
                        'class'       => 'form-control',
                        'value'       => $row['tch_feedback']
                    );
                    echo form_textarea($data);
                } 
                else
                {
                    $data = array(
                        'name'        => 'txtFeedback',
                        'id'          => 'txtFeedback',
                        'rows'        => '5',
                        'cols'        => '10',
                        'style'       => 'width:100%',
                        'class'       => 'form-control'
                    );
                    echo form_textarea($data);
                }      
                
                echo '
                <label class="control-label">Unggah Gambar</label>
                <input type="file" name="file" class="form-control">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                ';
                echo form_submit('submit', 'Simpan', 'id="submit-poin" class="btn btn-primary" data-loading-text="Processing"');
                echo '
                </div>';
            }				
            echo $output;
        } 
    }
    
    //fungsi untuk melakukan perubahan data
    function catatan($id)
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $bool = $this->Checksheetmodel->catat($id);

        if($bool)
        {
            $this->session->set_flashdata('item','ubah');
            echo "<script>
            window.location.href='../sentapprovega';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Format yang dimasukkan salah atau Size > 2MB!');
            window.location.href='tambah';
            </script>";
        }
    }

    //fungsi untuk melakukan perubahan data
    function feedback($id)
    {
        //meload file model
        $this->load->model('Checksheetmodel');
        //menjalankan fungsi ubah 
        $bool = $this->Checksheetmodel->feed($id);
        if($bool)
        {
            $this->session->set_flashdata('item','ubah');
            echo "<script>
            window.location.href='../sentapproveuser';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Format yang dimasukkan salah atau Size > 2MB!');
            window.location.href='tambah';
            </script>";
        }
    }
}
?>
