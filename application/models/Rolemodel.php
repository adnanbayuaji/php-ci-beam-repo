<?php
    //membuat class baru inherit CI_Model
    class Rolemodel extends CI_Model
    {
        //fungsi untuk melakukan penambahan data pada database
        function tambah()
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $deskripsi = $this->input->post('deskripsi');
            $status = 'Aktif';
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            // $data = array('rol_deskripsi'=>$deskripsi, 'rol_status'=>$status, 'rol_createby'=>$createby, 'rol_createdate'=>$createdate, 'rol_modifby'=>$modifby, 'rol_modifdate'=>$modifdate);
            $data = array('rol_deskripsi'=>$deskripsi, 'rol_status'=>$status, 'rol_createby'=>$createby, 'rol_createdate'=>$createdate);

            //menginput array $data ke dalam tabel database
            $this->db->insert('beam_ms_role', $data);

            $idrol = $this->db->insert_id();
            for($i = 1; $i < 17; $i++)
            {
                if($i==1) $menu = 'keloladata';
                else if($i==2) $menu = 'hakakses';
                else if($i==3) $menu = 'pengguna';
                else if($i==4) $menu = 'plant';
                else if($i==5) $menu = 'area';
                else if($i==6) $menu = 'departemen';
                else if($i==7) $menu = 'itempemeriksaan';
                else if($i==8) $menu = 'jenisperalatan';
                else if($i==9) $menu = 'peralatan';
                else if($i==10) $menu = 'transaksi';
                else if($i==11) $menu = 'pemindaikode';
                else if($i==12) $menu = 'lembarpemeriksaan';
                else if($i==13) $menu = 'sentdraft';
                else if($i==14) $menu = 'sentapprovega';
                else if($i==15) $menu = 'sentapproveuser';
                else if($i==16) $menu = 'laporan';
                
                // if(!($menu=='keloladata' || $menu=='transaksi'))
                // {
                for($x = 1; $x < 6; $x++)
                {
                    if(strcmp( $this->input->post($i.$x), "1" )==0) 
                    {
                        if($x==1) $access = 1; 
                        else if($x==2) $insert = 1;
                        else if($x==3) $update = 1;
                        else if($x==4) $delete = 1;
                        else if($x==5) $special = 1;
                    }
                    else
                    {
                        if($x==1) $access = 0; 
                        else if($x==2) $insert = 0;
                        else if($x==3) $update = 0;
                        else if($x==4) $delete = 0;
                        else if($x==5) $special = 0;
                    }
                }
                $datas = array('rol_id'=>$idrol, 'men_nama'=>$menu, 'men_access'=>$access, 'men_insert'=>$insert, 'men_update'=>$update, 'men_delete'=>$delete, 'men_special'=>$special, 'men_status'=>'Aktif', 'men_createby'=>$createby, 'men_createdate'=>$createdate);
                $this->db->insert('beam_ms_menu', $datas);
                // }
                // else
                // {
                //     $datas = array('rol_id'=>$idrol, 'men_nama'=>$menu, 'men_access'=>"0", 'men_insert'=>"0", 'men_update'=>"0", 'men_delete'=>"0", 'men_special'=>"0", 'men_status'=>'Aktif');
                //     $this->db->insert('beam_ms_menu', $datas);
                // }
            }
        }

        //fungsi untuk membaca data dari database
        function tampil()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_ms_role');
            
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
            $tampil = $this->db->get_where('beam_ms_role', array('rol_status' => 'Aktif'));
            
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
            $data = array('rol_status'=>$status);
            $this->db->where('rol_id', $id);
            $this->db->update('beam_ms_role', $data);
        }

        function hapusoff($id)
        {
            $status = "Aktif";
            $data = array('rol_status'=>$status);
            $this->db->where('rol_id', $id);
            $this->db->update('beam_ms_role', $data);
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampil($id)
        {
            //membaca dari tabel
            return $this->db->get_where('beam_ms_role', array('rol_id'=>$id))->row();
        }

        //fungsi untuk membaca data dari database
        function ubah_tampil_detail($id)
        {
            //mengambil data dari tabel database ke variabel 
            $this->db->where('rol_id', $id);
            $tampil = $this->db->get('beam_ms_menu');
            
            //memeriksa jumlah row != 0
            if($tampil->num_rows() > 0)
            {
                //perulangan data diletakkan ke $data
                foreach ($tampil->result() as $data)
                {
                    //setiap data yang ditemukan diletakkan ke array 
                    $hasilnew[] = $data;
                }
                //mengembalikan nilai data dari array
                return $hasilnew;
            }
        }

        //fungsi ubah data
        function ubah($id)
        {
            //mengambil dari post ke var
            $deskripsi = $this->input->post('deskripsi');
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('rol_deskripsi'=>$deskripsi, 'rol_modifby'=>$modifby, 'rol_modifdate'=>$modifdate);

            //kondisi yang akan dirubah by id
            $this->db->where('rol_id', $id);

            //update tabel ke array
            $this->db->update('beam_ms_role', $data);

            for($i = 1; $i < 17; $i++)
            {
                if($i==1) $menu = 'keloladata';
                else if($i==2) $menu = 'hakakses';
                else if($i==3) $menu = 'pengguna';
                else if($i==4) $menu = 'plant';
                else if($i==5) $menu = 'area';
                else if($i==6) $menu = 'departemen';
                else if($i==7) $menu = 'itempemeriksaan';
                else if($i==8) $menu = 'jenisperalatan';
                else if($i==9) $menu = 'peralatan';
                else if($i==10) $menu = 'transaksi';
                else if($i==11) $menu = 'pemindaikode';
                else if($i==12) $menu = 'lembarpemeriksaan';
                else if($i==13) $menu = 'sentdraft';
                else if($i==14) $menu = 'sentapprovega';
                else if($i==15) $menu = 'sentapproveuser';
                else if($i==16) $menu = 'laporan';
                
                // if(!($menu=='keloladata' || $menu=='transaksi'))
                // {
                for($x = 1; $x < 6; $x++)
                {
                    if(strcmp( $this->input->post($i.$x), "1" )==0) 
                    {
                        if($x==1) $access = 1; 
                        else if($x==2) $insert = 1;
                        else if($x==3) $update = 1;
                        else if($x==4) $delete = 1;
                        else if($x==5) $special = 1;
                    }
                    else
                    {
                        if($x==1) $access = 0; 
                        else if($x==2) $insert = 0;
                        else if($x==3) $update = 0;
                        else if($x==4) $delete = 0;
                        else if($x==5) $special = 0;
                    }
                }
                $datas = array('rol_id'=>$id, 'men_nama'=>$menu, 'men_access'=>$access, 'men_insert'=>$insert, 'men_update'=>$update, 'men_delete'=>$delete, 'men_special'=>$special, 'men_status'=>'Aktif', 'men_modifby'=>$modifby, 'men_modifdate'=>$modifdate);
                
                $arrays = array('rol_id' => $id, 'men_nama' => $menu);
                $this->db->where($arrays); 
                $this->db->update('beam_ms_menu', $datas);
                // }
                // else
                // {
                //     $datas = array('rol_id'=>$idrol, 'men_nama'=>$menu, 'men_access'=>"0", 'men_insert'=>"0", 'men_update'=>"0", 'men_delete'=>"0", 'men_special'=>"0", 'men_status'=>'Aktif');
                //     $this->db->insert('beam_ms_menu', $datas);
                // }
            }
        }

    }
?>