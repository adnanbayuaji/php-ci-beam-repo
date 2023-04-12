<?php
    //membuat class baru inherit CI_Model
    class Typeequipmodel extends CI_Model
    {
        //fungsi untuk melakukan penambahan data pada database
        function tambah($usrid)
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $nama = $this->input->post('nama');
            $berkala = $this->input->post('berkala');
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            // $data = array('rol_deskripsi'=>$deskripsi, 'rol_status'=>$status, 'rol_createby'=>$createby, 'rol_createdate'=>$createdate, 'rol_modifby'=>$modifby, 'rol_modifdate'=>$modifdate);
            $data = array('equ_nama'=>$nama, 'equ_status'=>'Aktif', 'equ_berkala'=>$berkala, 'equ_createby'=>$createby, 'equ_createdate'=>$createdate);
            //menginput array $data ke dalam tabel database
            $this->db->insert('beam_ms_equipment', $data);

            $idequip = $this->db->insert_id();
            
            //isidata data dtl_itemcheck dan dtl_poin
            //hapus temp data itemcehck dan poin

            $id_item = $this->input->post('id_item');

            foreach( $id_item as $key) {
                $datar = array('ite_id'=>$key, 'equ_id'=>$idequip);
                $this->db->insert('beam_dtl_itemcheck', $datar);
            }

            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get_where('beam_temp_poin',array('usr_id'=>$usrid));
            
            //memeriksa jumlah row != 0
            if($tampil->num_rows() > 0)
            {
                //perulangan data diletakkan ke $datad
                foreach ($tampil->result() as $data)
                {
                    $datas = array('dpo_namapoin'=>$data->dpo_namapoin, 'dpo_satuan' => $data->dpo_satuan, 'equ_id'=>$idequip, 'dpo_standar_min' => $data->dpo_standar_min, 'dpo_standar_max' => $data->dpo_standar_max);
                    $this->db->insert('beam_dtl_poin', $datas);
                }

                $this->db->delete('beam_temp_poin', array('usr_id'=>$usrid));
                //mengembalikan nilai data dari array
                return $hasil;
            }
        }

        function tambah_poin($usrid)
        {
            $poinnama = $this->input->post('poinnama');
            $poinsatuan = $this->input->post('poinsatuan');
            $standarmin = $this->input->post('standarmin');
            $standarmax = $this->input->post('standarmax');
            $data = array('dpo_namapoin'=>$poinnama, 'dpo_satuan'=>$poinsatuan, 'usr_id'=>$usrid, 'dpo_standar_min'=>$standarmin, 'dpo_standar_max'=>$standarmax);

            //menginput array $data ke dalam tabel database
            $this->db->insert('beam_temp_poin', $data);
        }

        function tambah_dtl_poin($equid)
        {
            $poinnama = $this->input->post('poinnama');
            $poinsatuan = $this->input->post('poinsatuan');
            $standarmin = $this->input->post('standarmin');
            $standarmax = $this->input->post('standarmax');
            $data = array('dpo_namapoin'=>$poinnama, 'dpo_satuan'=>$poinsatuan, 'equ_id'=>$equid, 'dpo_standar_min'=>$standarmin, 'dpo_standar_max'=>$standarmax);

            //menginput array $data ke dalam tabel database
            $this->db->insert('beam_dtl_poin', $data);
        }

        function poin_exists($key)
        {
            $query = $this->db->get_where('beam_temp_poin',array('dpo_namapoin'=>$key, 'usr_id'=>$this->session->userdata('username')));
            if($query->num_rows()>0) return false;
            else return true;
        }

        function poin_dtl_exists($key, $equid)
        {
            $query = $this->db->get_where('beam_dtl_poin',array('dpo_namapoin'=>$key, 'equ_id' =>$equid));
            if($query->num_rows()>0) return false;
            else return true;
        }

        //fungsi untuk membaca data dari database
        function tampil()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_ms_equipment');
            
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

        //fungsi untuk membaca data dari database
        function tampil_aktif()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get_where('beam_ms_equipment', array('equ_status'=>'Aktif'));
            
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

        //fungsi untuk membaca data dari database
        function tampil_detail()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_ms_equipment');
            
            //memeriksa jumlah row != 0
            if($tampil->num_rows() > 0)
            {
                //perulangan data diletakkan ke $data
                foreach ($tampil->result() as $data)
                {
                    $query = $this->db->get_where('beam_dtl_poin',array('equ_id'=>$data->equ_id));
                    if($query->num_rows() > 0)
                    {
                        //perulangan data diletakkan ke $data
                        foreach ($query->result() as $datas)
                        {
                            $hasil_detail[] = $datas;
                        }
                    }
                }
                //mengembalikan nilai data dari array
                return $hasil_detail;
            }
        }

        // function tampil_dtl_item()
		// {
		// 	$item = array();
        //     $this->db->select('beam_ms_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek');
        //     $this->db->from('beam_ms_itemcheck');
        //     // $this->db->where('beam_ms_itemcheck.equ_id',$id);
        //     // $this->db->order_by('beam_ms_user.usr_status', 'asc');
        //     $salur=$this->db->get();
        //     //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
        //     if($salur->num_rows()>0)
        //     {
        //         //perulangan untuk setiap data yang ditemukan
        //         //akan diletakkan pada variabel $data
        //     	foreach($salur->result() as $data)
		// 		{
		// 			$item[] = $data;
		// 		}
        //         return $item;
        //     }
        // }

        function tampil_dtl_item_aktif()
		{
			$item = array();
            $this->db->select('beam_ms_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek');
            $this->db->from('beam_ms_itemcheck');
            $this->db->where('beam_ms_itemcheck.ite_status','Aktif');
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

        function tampilubah_dtl_item($id)
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

        function tampilubah_dtl_item_aktif($id)
		{
			$item = array();
            $this->db->select('beam_ms_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek, beam_ms_itemcheck.ite_standar, beam_ms_itemcheck.ite_metode, beam_ms_itemcheck.ite_alat');
            $this->db->from('beam_ms_itemcheck');
            // $this->db->join('beam_dtl_itemcheck', 'beam_ms_itemcheck.ite_id = beam_dtl_itemcheck.ite_id');
            $this->db->where('beam_ms_itemcheck.ite_status','Aktif');
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

        function tampilubah_checked_item($id)
		{
			$item = array();
            $this->db->select('beam_dtl_itemcheck.ite_id');
            $this->db->from('beam_dtl_itemcheck');  
            $this->db->where('beam_dtl_itemcheck.equ_id',$id);
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

        function tampilubah_dtl_poin($id)
		{
			$item = array();
            $this->db->select('beam_dtl_poin.dpo_id, beam_dtl_poin.dpo_namapoin, beam_dtl_poin.dpo_satuan, beam_dtl_poin.equ_id, beam_dtl_poin.dpo_standar_min, beam_dtl_poin.dpo_standar_max');
            $this->db->from('beam_dtl_poin');
            $this->db->where('beam_dtl_poin.equ_id',$id);
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

        function viewupdate_checked_item($id)
		{
            $item = array();
            
            $this->db->select('beam_tr_dtl_itemcheck.tdi_kondisi, beam_ms_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek, beam_ms_itemcheck.ite_standar, beam_ms_itemcheck.ite_metode, beam_ms_itemcheck.ite_alat');
            $this->db->from('beam_tr_dtl_itemcheck');
            $this->db->join('beam_ms_itemcheck', 'beam_tr_dtl_itemcheck.ite_id = beam_ms_itemcheck.ite_id');
            $this->db->where('beam_tr_dtl_itemcheck.tch_id',$id);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
            	foreach($salur->result() as $data)
				{
					$item[] = $data;
				}
                return $item;
            }
        }

        function viewupdate_dtl_poin($id)
		{
            $item = array();
            
            $this->db->select('beam_tr_dtl_poincheck.tdp_nilai, beam_tr_dtl_poincheck.dpo_id, beam_dtl_poin.dpo_namapoin, beam_dtl_poin.dpo_satuan, beam_dtl_poin.equ_id, beam_dtl_poin.dpo_standar_min, beam_dtl_poin.dpo_standar_max');
            $this->db->from('beam_tr_dtl_poincheck');
            $this->db->join('beam_dtl_poin', 'beam_tr_dtl_poincheck.dpo_id = beam_dtl_poin.dpo_id');
            $this->db->where('beam_tr_dtl_poincheck.tch_id',$id);
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
        
        function tampil_dtl_poin($usrid)
		{
			$item = array();
            $this->db->select('beam_temp_poin.usr_id, beam_temp_poin.dpo_namapoin, beam_temp_poin.dpo_satuan, beam_temp_poin.id, beam_temp_poin.dpo_standar_min, beam_temp_poin.dpo_standar_max');
            $this->db->from('beam_temp_poin');
            $this->db->where('beam_temp_poin.usr_id',$usrid);
            // $this->db->where('salur_sedekah.id_amil',$id);
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

        // //fungsi untuk menghapus data di database
        // function hapus($id)
        // {
        //     //menghapus data menggunakan id
        //     $this->db->delete('beam_ms_equipment', array('equ_id'=>$id));
        //     $this->db->delete('beam_dtl_itemcheck', array('equ_id'=>$id));
        //     $this->db->delete('beam_dtl_poin', array('equ_id'=>$id));
        // }

        //fungsi untuk menghapus data di database
        function hapuson($id)
        {
            $status = "Tidak Aktif";
            $data = array('equ_status'=>$status);
            $this->db->where('equ_id', $id);
            $this->db->update('beam_ms_equipment', $data);
        }

        function hapusoff($id)
        {
            $status = "Aktif";
            $data = array('equ_status'=>$status);
            $this->db->where('equ_id', $id);
            $this->db->update('beam_ms_equipment', $data);
        }

        //fungsi untuk menghapus data di database
        function hapus_item($itemid, $usrid)
        {
            //menghapus data menggunakan id
            $this->db->delete('beam_temp_itemcheck', array('ite_id'=>$itemid, 'usr_id'=>$usrid));
        }

        //fungsi untuk menghapus data di database
        function hapus_poin($id)
        {
            //menghapus data menggunakan id
            $this->db->delete('beam_temp_poin', array('id'=>$id));
        }

        //fungsi untuk menghapus data di database
        function hapus_dtl_poin($id)
        {
            //menghapus data menggunakan id
            $this->db->delete('beam_dtl_poin', array('dpo_id'=>$id));
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampil($id)
        {
            //membaca dari tabel
            return $this->db->get_where('beam_ms_equipment', array('equ_id'=>$id))->row();
        }

        //fungsi ubah data
        function ubah($id)
        {
            //mengambil dari post ke var
            $nama = $this->input->post('nama');
            $berkala = $this->input->post('berkala');
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");
            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('equ_nama'=>$nama, 'equ_berkala'=>$berkala, 'equ_modifby'=>$modifby, 'equ_modifdate'=>$modifdate);

            //kondisi yang akan dirubah by id
            $this->db->where('equ_id', $id);

            //update tabel ke array
            $this->db->update('beam_ms_equipment', $data);
            
            //isidata data dtl_itemcheck dan dtl_poin
            //hapus temp data itemcehck dan poin

            $id_item = $this->input->post('id_item');
            $this->db->delete('beam_dtl_itemcheck', array('equ_id'=>$id));
            
            foreach( $id_item as $key) {
                $datar = array('ite_id'=>$key, 'equ_id'=>$id);
                $this->db->insert('beam_dtl_itemcheck', $datar);
            }
        }

        //fungsi ubah data
        function ubah_poin($id)
        {
            //mengambil dari post ke var
            $satuan = $this->input->post('poinsatuan');
            $nama = $this->input->post('poinnama');
            $standarmin = $this->input->post('standarmin');
            $standarmax = $this->input->post('standarmax');

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('dpo_namapoin'=>$nama, 'dpo_satuan'=>$satuan, 'dpo_standar_min'=>$standarmin, 'dpo_standar_max'=>$standarmax);

            //kondisi yang akan dirubah by id
            $this->db->where('id', $id);

            //update tabel ke array
            $this->db->update('beam_temp_poin', $data);
        }

        
        //fungsi ubah data
        function ubah_poin2($dpoid)
        {
            //mengambil dari post ke var
            $satuan = $this->input->post('poinsatuan');
            $nama = $this->input->post('poinnama');
            $standarmin = $this->input->post('standarmin');
            $standarmax = $this->input->post('standarmax');

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('dpo_namapoin'=>$nama, 'dpo_satuan'=>$satuan, 'dpo_standar_min'=>$standarmin, 'dpo_standar_max'=>$standarmax);

            //kondisi yang akan dirubah by id
            $this->db->where('dpo_id', $dpoid);

            //update tabel ke array
            $this->db->update('beam_dtl_poin', $data);
        }
    }
?>