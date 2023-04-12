<?php
    //membuat class baru inherit CI_Model
    class Equipmodel extends CI_Model
    {
        //fungsi untuk melakukan penambahan data pada database
        function tambah()
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $equ_id = $this->input->post('equid');
            $deq_lokasi = $this->input->post('lokasi');
            $are_id = $this->input->post('area');
            $deq_jenis = $this->input->post('jenis');
            $deq_kapasitas = $this->input->post('kapasitas');
            $deq_kode = $this->input->post('kode');
            $deq_merk = $this->input->post('merk');
            $deq_model = $this->input->post('model');
            $dept_id = $this->input->post('dept');
            $noasset = $this->input->post('noasset');
            $time = strtotime($this->input->post('tglcek'));
            $pla_id = $this->input->post('plant');
            $tglcek = date('Y-m-d',$time);
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");

            //kondisi yang akan dirubah by id
            $this->db->where('deq_kode', $deq_kode);
            //mengambil data dari tabel database ke variabel 
            $cekin = $this->db->get('beam_dtl_equipment');
                        
            //memeriksa jumlah row != 0
            if($cekin->num_rows() > 0)
            {
                return false;
            }
            else
            {
                //meletakkan isi variabel ke dalam array
                //array adalah nama kolom di tabel pada database
                // $data = array('rol_deskripsi'=>$deskripsi, 'rol_status'=>$status, 'rol_createby'=>$createby, 'rol_createdate'=>$createdate, 'rol_modifby'=>$modifby, 'rol_modifdate'=>$modifdate);
                $data = array('equ_id'=>$equ_id, 'pla_id'=>$pla_id, 'deq_lokasi'=>$deq_lokasi, 'deq_status'=>'Aktif', 'are_id'=>$are_id, 'deq_jenis'=>$deq_jenis, 'deq_kapasitas'=>$deq_kapasitas, 'deq_kode'=>$deq_kode, 'deq_merk'=>$deq_merk, 'deq_model'=>$deq_model, 'dept_id'=>$dept_id, 'deq_tglcek'=>$tglcek, 'deq_noasset'=>$noasset, 'deq_createby'=>$createby, 'deq_createdate'=>$createdate);

                //menginput array $data ke dalam tabel database
                $this->db->insert('beam_dtl_equipment', $data);

                // BUAT QRCODE
                // tampung data kiriman
            
                // include file qrlib.php
                require  FCPATH.'assets/phpqrcode/qrlib.php'; 
            
                //Nama Folder file QR Code kita nantinya akan disimpan
                $tempdir = FCPATH."temp/";
            
                //jika folder belum ada, buat folder 
                if (!file_exists($tempdir)){
                    mkdir($tempdir);
                }
            
                #parameter inputan
                $isi_teks = $deq_kode;
                $namafile = $deq_kode.".png";
                $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
                $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
                $padding = 2;
            
                QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
                return true;
            }
        }

        //fungsi untuk membaca data dari database
        function tampil()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_dtl_equipment');
            
            //memeriksa jumlah row != 0
            if($tampil->num_rows() > 0)
            {
                //perulangan data diletakkan ke $data
                foreach ($tampil->result() as $data)
                {
                    //setiap data yang ditemukan diletakkan ke array 
                    $hasil[] = $data;
                }
                //mengembalikan nilai data dari array
                return $hasil;
            }
        }

        //fungsi untuk menghapus data di database
        function hapuson($id)
        {
            $status = "Tidak Aktif";
            $data = array('deq_status'=>$status);
            $this->db->where('deq_id', $id);
            $this->db->update('beam_dtl_equipment', $data);
        }

        function hapusoff($id)
        {
            $status = "Aktif";
            $data = array('deq_status'=>$status);
            $this->db->where('deq_id', $id);
            $this->db->update('beam_dtl_equipment', $data);
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampil($id)
        {
            //membaca dari tabel
            return $this->db->get_where('beam_dtl_equipment', array('deq_id'=>$id))->row();
        }

        //fungsi ubah data
        function ubah($id)
        {
            //mengambil dari post ke var
            $equ_id = $this->input->post('equid');
            $deq_lokasi = $this->input->post('lokasi');
            $are_id = $this->input->post('area');
            $deq_jenis = $this->input->post('jenis');
            $deq_kapasitas = $this->input->post('kapasitas');
            $deq_kode = $this->input->post('kode');
            $deq_merk = $this->input->post('merk');
            $deq_model = $this->input->post('model');
            $dept_id = $this->input->post('dept');
            $noasset = $this->input->post('noasset');
            $time = strtotime($this->input->post('tglcek'));
            $pla_id = $this->input->post('plant');
            $tglcek = date('Y-m-d',$time);
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");

            //kondisi yang akan dirubah by id
            $this->db->where('equ_id !=', $equ_id);
            $this->db->where('deq_kode', $deq_kode);
            //mengambil data dari tabel database ke variabel 
            $cekin = $this->db->get('beam_dtl_equipment');
                        
            //memeriksa jumlah row != 0
            if($cekin->num_rows() > 0)
            {
                return false;
            }
            else
            {
                //meletakkan isi variabel ke dalam array
                //array adalah nama kolom di tabel pada database
                $data = array('equ_id'=>$equ_id, 'pla_id'=>$pla_id, 'deq_lokasi'=>$deq_lokasi, 'are_id'=>$are_id, 'deq_jenis'=>$deq_jenis, 'deq_kapasitas'=>$deq_kapasitas, 'deq_kode'=>$deq_kode, 'deq_merk'=>$deq_merk, 'deq_model'=>$deq_model, 'dept_id'=>$dept_id, 'deq_tglcek'=>$tglcek, 'deq_noasset'=>$noasset, 'deq_modifby'=>$modifby, 'deq_modifdate'=>$modifdate);

                //kondisi yang akan dirubah by id
                $this->db->where('deq_id', $id);

                //update tabel ke array
                $this->db->update('beam_dtl_equipment', $data);
                $this->load->model('Equipmodel');
                
                // include file qrlib.php
                require  FCPATH.'assets/phpqrcode/qrlib.php'; 
                $this->Equipmodel->genqrcode($id);
                return true;
            }
        }

        function tampil_equip()
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_ms_plant.pla_kodearea, beam_dtl_equipment.deq_status, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_plant','beam_ms_plant.pla_id = beam_dtl_equipment.pla_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            // $this->db->where('salur_sedekah.id_amil',$id);
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }
        
        function tampil_equip_kode()
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_status, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.deq_kode !=', '');
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function detail($id)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_dtl_equipment.deq_noasset, beam_ms_equipment.equ_id, beam_ms_equipment.equ_nama, beam_ms_area.are_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_dtl_equipment.deq_tglcek, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_dtl_equipment.deq_id',$id);
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        // Fungsi untuk melakukan proses upload file
        function upload_file($filename){
            $this->load->library('upload'); // Load librari upload
            
            $config['upload_path'] = './excel/';
            $config['allowed_types'] = 'xlsx';
            $config['max_size']	= '2048';
            $config['overwrite'] = true;
            $config['file_name'] = $filename;
        
            $this->upload->initialize($config); // Load konfigurasi uploadnya
            if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
                // Jika berhasil :
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
                return $return;
            }else{
                // Jika gagal :
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
                return $return;
            }
        }

        public function insert_import($equid, $deqlokasi, $plaid, $areid, $deqjenis, $deqkapasitas, $deqkode, $deqmerk, $deqmodel, $deptid, $deqnoasset, $deqtglcek, $stats){
            // if (count($data) > 0) {
            //     foreach($data as $datas)
			// 	{
            //         $this->db->insert('beam_dtl_equipment', $data);
			// 	}
            // }
            
            $createby = $this->session->userdata('id');
            $time = strtotime($deqtglcek);
            $newformat = date('Y-m-d',$time);
            $createdate = date("Y-m-d H:i:s");
            if($deqtglcek=="")
            {
                $data = array('equ_id'=>$equid, 'pla_id'=>$plaid, 'deq_status'=>$stats, 'deq_lokasi'=>$deqlokasi, 'are_id'=>$areid, 'deq_jenis'=>$deqjenis, 'deq_kapasitas'=>$deqkapasitas, 'deq_kode'=>$deqkode, 'deq_merk'=>$deqmerk, 'deq_model'=>$deqmodel, 'dept_id'=>$deptid, 'deq_noasset'=>$deqnoasset, 'deq_tglcek'=>$createdate, 'deq_createby'=>$createby, 'deq_createdate'=>$createdate);
            }
            else
            {
                $data = array('equ_id'=>$equid, 'pla_id'=>$plaid, 'deq_status'=>$stats, 'deq_lokasi'=>$deqlokasi, 'are_id'=>$areid, 'deq_jenis'=>$deqjenis, 'deq_kapasitas'=>$deqkapasitas, 'deq_kode'=>$deqkode, 'deq_merk'=>$deqmerk, 'deq_model'=>$deqmodel, 'dept_id'=>$deptid, 'deq_noasset'=>$deqnoasset, 'deq_tglcek'=>$newformat, 'deq_createby'=>$createby, 'deq_createdate'=>$createdate);
            }
            
            $this->db->insert('beam_dtl_equipment', $data);

            $insert_id = $this->db->insert_id();

            $this->load->model('Equipmodel');
            $this->Equipmodel->genqrcode($insert_id);
        }

        public function genqrcode($id)
        {            
            $this->db->select('beam_dtl_equipment.deq_kode');
            $this->db->from('beam_dtl_equipment');
            $array = array('beam_dtl_equipment.deq_id' => $id);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                
                    //Nama Folder file QR Code kita nantinya akan disimpan
                    $tempdir = FCPATH."temp/";
                
                    //jika folder belum ada, buat folder 
                    if (!file_exists($tempdir)){
                        mkdir($tempdir);
                    }
                
                    #parameter inputan
                    $isi_teks = $data->deq_kode;
                    $namafile = $data->deq_kode.".png";
                    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
                    $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
                    $padding = 2;
                    
                    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
                }
			}
        }

        public function cetak_qrcode()
        {
            $id_item = $this->input->post('id_item');
            require  FCPATH.'assets/phpqrcode/qrlib.php'; 
            
            $pdf = new FPDF('P','mm','A4');
            $pdf->AddPage();
            $x=0; $y=0;
            foreach( $id_item as $key) {
                // echo '<script type="text/javascript">alert("'.$key.'");</script>';
                $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
                $this->db->from('beam_dtl_equipment');
                $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
                $array = array('beam_dtl_equipment.deq_id' => $key);
                $this->db->where($array);
                $salur=$this->db->get();
                //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                if($salur->num_rows()>0)
                {
                    foreach($salur->result() as $data)
                    {
                        try {
                            $file_handle = @fopen(FCPATH.'temp//'.$data->deq_kode.'.png',"r");
                            if (!$file_handle) {
                                throw new Exception('Failed to open uploaded file');
                            }
                        } catch (Exception $e) {
                            $this->load->model('Equipmodel');
                            $this->Equipmodel->genqrcode($data->deq_id);
                        }
                        $pdf->Image(FCPATH.'temp//'.$data->deq_kode.'.png',5+($x*34),5+($y*40),-110, -110);
                        $pdf->SetFont('Arial','',10);
                        $pdf->SetXY(6+($x*34),35+($y*40));
                        $pdf->Cell(30,1,substr($data->are_nama, 0, 5)."-".substr($data->deq_lokasi, 0, 10),0,0,'C');
                        $pdf->SetXY(6+($x*34),40+($y*40));
                        // $pdf->Cell(30,1,substr($data->deq_kode, 0, 9)." - ".substr($data->are_nama, 0, 5),0,0,'C');
                        $pdf->Cell(30,1,substr($data->deq_kode, 0, 16),0,0,'C');
                        $pdf->SetXY(6+($x*34),6+($y*40));
                        $pdf->Cell(31,38,'',1);
                        $x+=1;
                        if($x>5)
                        {
                            if($y>4)
                            {
                                $pdf->AddPage(); $x=0; $y=0;
                            }
                            else
                            {
                                $y+=1; $x=0;
                            }
                        }
                    }
                }
            }
            $pdf->Output();
        }

        public function returnfound($kode)
        {
            $this->db->select('beam_dtl_equipment.deq_id');
            $this->db->from('beam_dtl_equipment');
            $array = array('beam_dtl_equipment.deq_kode' => $kode);
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function ija_tampil_id($kode)
		{
            $salur2 = null;
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $array = array('beam_dtl_equipment.deq_kode' => $kode);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                foreach($salur->result() as $data)
                {
                    $sedekah = array();
                    $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_ms_equipment.equ_nama, beam_ms_area.are_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
                    $this->db->from('beam_dtl_equipment');
                    $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                    $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                    $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
                    $this->db->where('beam_dtl_equipment.deq_id',$data->deq_id);
                    $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
                    $salur2=$this->db->get()->row();
                }
            }

            return $salur2;  
        }

        function ija_tampilubah_dtl_item($kode)
		{
			$item = array();
            $this->db->select('beam_ms_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek, beam_ms_itemcheck.ite_standar, beam_ms_itemcheck.ite_metode, beam_ms_itemcheck.ite_alat');
            $this->db->from('beam_ms_itemcheck');
            // $this->db->join('beam_dtl_itemcheck', 'beam_ms_itemcheck.ite_id = beam_dtl_itemcheck.ite_id');
            // $this->db->where('beam_dtl_itemcheck.equ_id',$id);
            // $this->db->order_by('beam_ms_user.usr_status', 'asc');
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
					$item[] = $data;
				}
                return $item;
            }
        }

        function ija_tampilubah_dtl_poin($kode)
		{
            $salur2 = null;
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama,beam_ms_equipment.equ_id, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $array = array('beam_dtl_equipment.deq_kode' => $kode);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                foreach($salur->result() as $data)
                {
                    $item = array();
                    $this->db->select('beam_dtl_poin.dpo_id, beam_dtl_poin.dpo_namapoin, beam_dtl_poin.dpo_satuan, beam_dtl_poin.equ_id, beam_dtl_poin.dpo_standar_min, beam_dtl_poin.dpo_standar_max');
                    $this->db->from('beam_dtl_poin');
                    $this->db->where('beam_dtl_poin.equ_id',$data->equ_id);
                    // $this->db->order_by('beam_ms_user.usr_status', 'asc');
                    $salur2=$this->db->get();
                    //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    if($salur2->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($salur2->result() as $datas)
                        {
                            $item[] = $datas;
                        }
                        return $item;
                    }
                }
            }
        }

        function ija_tampilubah_checked_item($kode)
		{
            $salur2 = null;
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_ms_equipment.equ_id, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $array = array('beam_dtl_equipment.deq_kode' => $kode);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                foreach($salur->result() as $data)
                {
                    $item = array();
                    $this->db->select('beam_dtl_itemcheck.ite_id');
                    $this->db->from('beam_dtl_itemcheck');  
                    $this->db->where('beam_dtl_itemcheck.equ_id',$data->equ_id);
                    // $this->db->order_by('beam_ms_user.usr_status', 'asc');
                    $salur2=$this->db->get();
                    //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    if($salur2->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($salur2->result() as $datas)
                        {
                            $item[] = $datas;
                        }
                        return $item;
                    }
                }
            }
        }

        function platampil_equip($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_ms_plant.pla_kodearea, beam_dtl_equipment.deq_status, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_plant','beam_ms_plant.pla_id = beam_dtl_equipment.pla_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function returnbooldata($id, $plaid)
        {
            $this->db->select('beam_dtl_equipment.pla_id');
            $this->db->from('beam_dtl_equipment');
            $array = array('beam_dtl_equipment.pla_id' => $plaid, 'beam_dtl_equipment.deq_id' => $id);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function platampil_equip_kode($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_status, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_jenis, beam_dtl_equipment.deq_kapasitas, beam_dtl_equipment.deq_kode, beam_dtl_equipment.deq_merk, beam_dtl_equipment.deq_model, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_noasset');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.deq_kode !=', '');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }
    }
?>