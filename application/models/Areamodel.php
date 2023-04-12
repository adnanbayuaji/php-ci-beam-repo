<?php
    //membuat class baru inherit CI_Model
    class Areamodel extends CI_Model
    {
        //fungsi untuk melakukan penambahan data pada database
        function tambah()
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $nama = $this->input->post('nama');
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('are_nama'=>$nama, 'are_status'=>"Aktif", 'are_createby'=>$createby, 'are_createdate'=>$createdate);

            //menginput array $data ke dalam tabel database
            $this->db->insert('beam_ms_area', $data);
        }

        //fungsi untuk membaca data dari database
        function tampil()
        {
            //mengambil data dari tabel database ke variabel 
            $tampil = $this->db->get('beam_ms_area');
            
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
            $tampil = $this->db->get_where('beam_ms_area', array('are_status' => 'Aktif'));
            
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
            $data = array('are_status'=>$status);
            $this->db->where('are_id', $id);
            $this->db->update('beam_ms_area', $data);
        }

        function hapusoff($id)
        {
            $status = "Aktif";
            $data = array('are_status'=>$status);
            $this->db->where('are_id', $id);
            $this->db->update('beam_ms_area', $data);
        }

        //fungsi menampilkan saat akan mengubah
        function ubah_tampil($id)
        {
            //membaca dari tabel
            return $this->db->get_where('beam_ms_area', array('are_id'=>$id))->row();
        }

        //fungsi ubah data
        function ubah($id)
        {
            //mengambil dari post ke var
            $nama = $this->input->post('nama');
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");

            //meletakkan isi variabel ke dalam array
            //array adalah nama kolom di tabel pada database
            $data = array('are_nama'=>$nama, 'are_modifby'=>$modifby, 'are_modifdate'=>$modifdate);

            //kondisi yang akan dirubah by id
            $this->db->where('are_id', $id);

            //update tabel ke array
            $this->db->update('beam_ms_area', $data);
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

        public function insert_import($itearea){
            // if (count($data) > 0) {
            //     foreach($data as $datas)
			// 	{
            //         $this->db->insert('beam_dtl_equipment', $data);
			// 	}
            // }
            
            $createby = $this->session->userdata('id');
            $createdate = date("Y-m-d H:i:s");
            $data = array('are_nama'=>$itearea, 'are_status'=>'Aktif', 'are_createby'=>$createby, 'are_createdate'=>$createdate);

            $this->db->insert('beam_ms_area', $data);
        }
    }
?>