<?php
    //membuat class baru inherit CI_Model
    class Usermodel extends CI_Model
    {
        //fungsi untuk melakukan penambahan data pada database
        function tambah()
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $rol_id = $this->input->post('role');
            $usr_status = "Aktif";
            $dept_id = $this->input->post('dept');
            $usr_nama = $this->input->post('nama');
            $usr_pass = md5($this->input->post('pass'));
            $usr_namalengkap = $this->input->post('fullnama');
            $usr_email = $this->input->post('email');
            $usr_npk = $this->input->post('npk');
            $pla_id = $this->input->post('plant');
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");
            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            // $data = array('rol_deskripsi'=>$deskripsi, 'rol_status'=>$status, 'rol_createby'=>$createby, 'rol_createdate'=>$createdate, 'rol_modifby'=>$modifby, 'rol_modifdate'=>$modifdate);
            if($_FILES['file']['name']!=null)
            {
                echo "<script>
                    alert('cek".$_FILES['file']['name']."');
                    </script>";
                $ekstensi = array('png','jpg','jpeg');
                $nama = $_FILES['file']['name'];
                $x = explode('.',$nama);
                $eksten = strtolower(end($x));
                $file_tmp = $_FILES['file']['tmp_name'];
                $size = $_FILES['file']['size'];						
            }
            else
            {
                $nama = 'logo.png';
                $eksten = 'png';
                $ekstensi = array('png','jpg','jpeg');
                $size=100;
            }       

            if(in_array($eksten, $ekstensi)===true)
            {
                if($size<=2000000)
                {
                    move_uploaded_file($file_tmp,DOCROOT.'/gambar/'.$nama);
                    $data = array('rol_id'=>$rol_id, 'usr_status'=>$usr_status, 'pla_id'=>$pla_id, 'dept_id'=>$dept_id, 'usr_nama'=>$usr_nama, 'usr_pass'=>$usr_pass, 'usr_foto'=>$nama, 'usr_namalengkap'=>$usr_namalengkap, 'usr_email'=>$usr_email, 'usr_npk'=>$usr_npk, 'usr_createby'=>$createby, 'usr_createdate'=>$createdate);
                    //menginput array $data ke dalam tabel database
                    $this->db->insert('beam_ms_user', $data);
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
            
        }

        //fungsi untuk membaca data dari database
        function tampil()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_ms_user');
            
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
            $data = array('usr_status'=>$status);
            $this->db->where('usr_id', $id);
            $this->db->update('beam_ms_user', $data);
        }

        function hapusoff($id)
        {
            $status = "Aktif";
            $data = array('usr_status'=>$status);
            $this->db->where('usr_id', $id);
            $this->db->update('beam_ms_user', $data);
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampil($id)
        {
            //membaca dari tabel
            return $this->db->get_where('beam_ms_user', array('usr_id'=>$id))->row();
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampilprofil($id)
        {
            $sedekah = array();
            $this->db->select('beam_ms_user.usr_id, beam_ms_user.rol_id, beam_ms_user.usr_namalengkap, beam_ms_user.usr_npk, beam_ms_user.usr_status, beam_ms_role.rol_deskripsi, beam_ms_departemen.dept_nama, beam_ms_user.dept_id, beam_ms_user.usr_nama, beam_ms_user.usr_pass, beam_ms_user.usr_foto, beam_ms_user.usr_email, beam_ms_plant.pla_nama');
            $this->db->from('beam_ms_user');
            $this->db->join('beam_ms_role', 'beam_ms_user.rol_id = beam_ms_role.rol_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_user.dept_id = beam_ms_departemen.dept_id');
            $this->db->join('beam_ms_plant', 'beam_ms_plant.pla_id = beam_ms_user.pla_id');
            $this->db->where('beam_ms_user.usr_id',$id);
            $salur=$this->db->get()->row();
            //membaca dari tabel
            return $salur;
        }

        //fungsi ubah data
        function reset($id)
        {
            $usr_pass = md5('Astra123');
            $data = array('usr_pass'=>$usr_pass);
            $this->db->where('usr_id', $id);
            $this->db->update('beam_ms_user', $data);
        }

        //fungsi ubah data
        function ubah($id)
        {
            //mengambil dari post ke var
            $rol_id = $this->input->post('role');
            $dept_id = $this->input->post('dept');
            $usr_nama = $this->input->post('nama');
            $usr_pass = md5($this->input->post('pass'));
            $usr_namalengkap = $this->input->post('fullnama');
            $usr_email = $this->input->post('email');
            $usr_npk = $this->input->post('npk');
            $pla_id = $this->input->post('plant');
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");

            $bools = false;
            if($_FILES['file']['name']!=null)
            {
                $ekstensi = array('png','jpg','jpeg');
                $nama = $_FILES['file']['name'];
                $x = explode('.',$nama);
                $eksten = strtolower(end($x));
                $file_tmp = $_FILES['file']['tmp_name'];
                $size = $_FILES['file']['size'];
                $bools = true;
            }
            
            if($bools == true)
            {
                if(in_array($eksten, $ekstensi)==true)
                {
                    if($size<=2000000)
                    {
                        move_uploaded_file($file_tmp,DOCROOT.'/gambar/'.$nama);
                        //meletakkan isi variabel ke dalam array
                        //array adalah nama kolom di tabel pada database
                        $data = array('rol_id'=>$rol_id, 'dept_id'=>$dept_id, 'pla_id'=>$pla_id, 'usr_nama'=>$usr_nama, 'usr_foto'=>$nama, 'usr_namalengkap'=>$usr_namalengkap, 'usr_email'=>$usr_email, 'usr_npk'=>$usr_npk, 'usr_modifby'=>$modifby, 'usr_modifdate'=>$modifdate);

                        //kondisi yang akan dirubah by id
                        $this->db->where('usr_id', $id);

                        //update tabel ke array
                        $this->db->update('beam_ms_user', $data);
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
            else
            {
                $data = array('rol_id'=>$rol_id, 'pla_id'=>$pla_id, 'dept_id'=>$dept_id, 'usr_nama'=>$usr_nama, 'usr_namalengkap'=>$usr_namalengkap, 'usr_npk'=>$usr_npk, 'usr_email'=>$usr_email, 'usr_modifby'=>$modifby, 'usr_modifdate'=>$modifdate);
                $this->db->where('usr_id', $id);
                $this->db->update('beam_ms_user', $data);
                return true;
            }
        }

        //fungsi ubah data
        function ubah_pass($id)
        {
            //mengambil dari post ke var
            $pass = md5($this->input->post('passnew'));

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('usr_pass'=>$pass);

            //kondisi yang akan dirubah by id
            $this->db->where('usr_id', $id);

            //update tabel ke array
            $this->db->update('beam_ms_user', $data);
        }

        function tampil_user()
		{
			$sedekah = array();
            $this->db->select('beam_ms_user.usr_id, beam_ms_user.usr_nama, beam_ms_plant.pla_kodearea, beam_ms_role.rol_deskripsi, beam_ms_departemen.dept_nama, beam_ms_user.usr_status');
            $this->db->from('beam_ms_user');
            $this->db->join('beam_ms_role', 'beam_ms_role.rol_id = beam_ms_user.rol_id');
            $this->db->join('beam_ms_plant', 'beam_ms_plant.pla_id = beam_ms_user.pla_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_ms_user.dept_id');
            // $this->db->where('salur_sedekah.id_amil',$id);
            $this->db->order_by('beam_ms_user.usr_status', 'asc');
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
        
        function platampil_user($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_ms_user.usr_id, beam_ms_user.usr_nama, beam_ms_plant.pla_kodearea, beam_ms_role.rol_deskripsi, beam_ms_departemen.dept_nama, beam_ms_user.usr_status');
            $this->db->from('beam_ms_user');
            $this->db->join('beam_ms_role', 'beam_ms_role.rol_id = beam_ms_user.rol_id');
            $this->db->join('beam_ms_plant', 'beam_ms_plant.pla_id = beam_ms_user.pla_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_ms_user.dept_id');
            $this->db->where('beam_ms_user.pla_id',$plaid);
            $this->db->order_by('beam_ms_user.usr_status', 'asc');
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
            $this->db->select('beam_ms_user.pla_id');
            $this->db->from('beam_ms_user');
            $array = array('beam_ms_user.pla_id' => $plaid, 'beam_ms_user.usr_id' => $id);
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
    }
?>