<?php
    //membuat class baru inherit CI_Model
    class Menumodel extends CI_Model
    {
        function getstatus($id, $mennama)
		{
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama );
            $this->db->where($array);
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function returnbool($id, $mennama)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama, 'beam_ms_menu.men_access' => '1');
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function returnbooladd($id, $mennama)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama, 'beam_ms_menu.men_insert' => '1');
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function returnbooledit($id, $mennama)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama, 'beam_ms_menu.men_update' => '1');
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function returnboolprofil($id)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id);
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function returnbooldelete($id, $mennama)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama, 'beam_ms_menu.men_delete' => '1');
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function getmenu($id)
		{
			$sedekah = array();
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_access' => '1');
            $this->db->where($array);
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

        function returnboolspecial($id, $mennama)
        {
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id, 'beam_ms_menu.men_nama' => $mennama, 'beam_ms_menu.men_special' => '1');
            $this->db->where($array);
            $salur=$this->db->get();
            if ($salur->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function gettrial($id)
		{
            $bool1 = false;
            $bool2 = false;
            $bool3 = false;
            $bool4 = false;
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id);
            $this->db->where($array);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'lembarpemeriksaan')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool4 = true; 
                        }
                    }
                }

                if($bool1 && $bool2 && $bool3 && $bool4)
                {
                    return 1;
                }
                else if($bool1 && $bool3)
                {
                    return 2;
                }
                else if($bool4)
                {
                    return 3;
                }
                else
                {
                    return 0;
                }
            }
        }
    }
?>