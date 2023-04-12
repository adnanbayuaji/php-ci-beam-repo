<?php
    //membuat class baru inherit CI_Model
    class Checksheetmodel extends CI_Model
    {
        function tampil_dtl_history1($id)
		{
			$sedekah = array();
            $this->db->select("beam_tr_dtl_itemcheck.tch_id, beam_tr_dtl_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek, beam_tr_dtl_itemcheck.tdi_kondisi");
            $this->db->from('beam_tr_dtl_itemcheck');
            $this->db->join('beam_ms_itemcheck', 'beam_ms_itemcheck.ite_id = beam_tr_dtl_itemcheck.ite_id');
            $this->db->where('beam_tr_dtl_itemcheck.tch_id',$id);
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

        function tampil_dtl_history2($id)
		{
			$sedekah = array();
            $this->db->select("beam_tr_dtl_poincheck.tch_id, beam_tr_dtl_poincheck.dpo_id, beam_dtl_poin.dpo_namapoin, beam_dtl_poin.dpo_standar_min, beam_dtl_poin.dpo_standar_max, beam_dtl_poin.dpo_satuan, beam_tr_dtl_poincheck.tdp_nilai");
            $this->db->from('beam_tr_dtl_poincheck');
            $this->db->join('beam_dtl_poin', 'beam_dtl_poin.dpo_id = beam_tr_dtl_poincheck.dpo_id');
            $this->db->where('beam_tr_dtl_poincheck.tch_id',$id);
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

        function tampilansaae($id)
		{
            $this->db->select("beam_tr_dtl_poincheck.tch_id, beam_tr_dtl_poincheck.dpo_id, beam_dtl_poin.dpo_namapoin, beam_dtl_poin.dpo_standar_min, beam_dtl_poin.dpo_standar_max, beam_dtl_poin.dpo_satuan, beam_tr_dtl_poincheck.tdp_nilai");
            $this->db->from('beam_tr_dtl_poincheck');
            $this->db->join('beam_dtl_poin', 'beam_dtl_poin.dpo_id = beam_tr_dtl_poincheck.dpo_id');
            $this->db->where('beam_tr_dtl_poincheck.tch_id',$id);
            $salur=$this->db->get();
            return $salur;
        }

        function tampilanjoss($id)
		{
            $this->db->select("beam_tr_dtl_itemcheck.tch_id, beam_tr_dtl_itemcheck.ite_id, beam_ms_itemcheck.ite_obyek, beam_tr_dtl_itemcheck.tdi_kondisi");
            $this->db->from('beam_tr_dtl_itemcheck');
            $this->db->join('beam_ms_itemcheck', 'beam_ms_itemcheck.ite_id = beam_tr_dtl_itemcheck.ite_id');
            $this->db->where('beam_tr_dtl_itemcheck.tch_id',$id);
            $salur=$this->db->get();
            return $salur;
        }

        function tampil()
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_dtl_equipment.deq_status, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
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

        function tampil_overdue()
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.deq_tglcek <=', date("Y-m-d"));
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
        
        function tampil_id($id)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_dtl_equipment.deq_id',$id);
            $this->db->order_by('beam_ms_equipment.equ_nama', 'asc');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function updateshow($id)
		{
            $sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_statuscek, beam_tr_checksheet.tch_oknok, beam_ms_user.usr_namalengkap, beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_user','beam_ms_user.usr_id = beam_tr_checksheet.usr_id');
            $this->db->where('beam_tr_checksheet.tch_id',$id);
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function tampil_idtch($id)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.deq_id, beam_ms_user.usr_npk, beam_ms_user.usr_namalengkap, beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_ms_user','beam_ms_user.usr_id = beam_tr_checksheet.usr_id');
            $this->db->where('beam_tr_checksheet.tch_id',$id);
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function getjumlah()
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as jumlah');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function getdatanok($plant)
		{
            $query = $this->db->query("select count(t.deq_id) as nok
            FROM beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok= 'nok' and d.pla_id = ".$plant)->row(); 
            return $query;  
        }

        function getdataokbyfunc($plant)
		{
            $query = $this->db->query("select count(t.deq_id) as okbyfunc
            FROM beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok= 'okbyfunc' and d.pla_id = ".$plant)->row(); 
            return $query;  
        }

        function getdatanokall()
		{
            $query = $this->db->query("select count(t.deq_id) as nok
            FROM beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok= 'nok'")->row(); 
            return $query;  
        }

        function getdataokbyfuncall()
		{
            $query = $this->db->query("select count(t.deq_id) as okbyfunc
            FROM beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok= 'okbyfunc'")->row(); 
            return $query;  
        }

        function getontime()
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as ontime');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_statuscek','ontime');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function getoverdue()
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as overdue');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_statuscek !=','ontime');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function detail_id($id)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_statuscek, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval, beam_tr_checksheet.deq_id, beam_tr_checksheet.tch_tanggal, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when "1" then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when "2" then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when "3" then 1 else null end) as broken_item', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->where('beam_tr_checksheet.deq_id',$id);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_tr_checksheet.deq_id');
            // $this->db->having(array('ok_item =' => '3', 'repair_item =' => '2', 'broken_item =' => '1'));
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

        function detailgrafikbeam()
		{
			$sedekah = array();
            $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, e.equ_nama, t.tch_statuscek, t.deq_id, t.tch_tanggal, count(i.tdi_kondisi) as total_item, sum(case i.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case i.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case i.tdi_kondisi when '3' then 1 else null end) as broken_item FROM beam_tr_checksheet t 
            INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
            INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved'
            group by t.tch_id, d.deq_lokasi, a.are_nama, e.equ_nama, t.tch_statuscek, t.deq_id, t.tch_tanggal
			");
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function tabeldetailoknok()
		{
            $sedekah = array();
            
            $bool1 = false;
            $bool2 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('laporan');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'laporan')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                        if($data->men_update == 1)
                        {
                            $bool2 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2)
            {
				$honey = false;
            }
            else if($bool2)
            {
                $honey = true;
            }
			else
			{
				$honey = false;
			}
            if($honey){
                $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
                INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
                INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
                INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
                INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
                INNER JOIN 
                (
                    select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
                ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
                WHERE t.tch_approval='approved' and d.dept_id = ".$this->session->userdata('dept')."
                group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
                order by kondisi
                ");
            }else{
                $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
                INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
                INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
                INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
                INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
                INNER JOIN 
                (
                    select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
                ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
                WHERE t.tch_approval='approved'
                group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
                order by kondisi
                ");
            }
            
            
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function tambah($id)
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $deqid = $this->input->post('hidden_deqid');
            $equid = $this->input->post('hidden_equid');
            $oknok = $this->input->post('oknok');
            
            //get deq_tglcek dari deqid lalu compare dan set untuk overdue dll
            $this->db->where('deq_id', $deqid);
            $array_dit = $this->db->get('beam_dtl_equipment');

            // //memeriksa jumlah row != 0
            if($array_dit->num_rows() > 0)
            {
                //perulangan data diletakkan ke $datad
                foreach ($array_dit->result() as $data_dit)
                {
                    $datetime1 = date_create($data_dit->deq_tglcek); 
                    $datetime2 = date_create(date('Y-m-d')); 
                    $interval = date_diff($datetime1, $datetime2); 
                    // printing result in days format 

                    if($datetime1 < $datetime2)
                    {
                        $status = "overdue for ".$interval->format('%R%a days');
                    }
                    else
                    {
                        $status = "ontime";
                    }
                }
            }

            $keterangan = $this->input->post('txtKeterangan');;
            $createby = $id;
            $createdate = date("Y-m-d H:i:s");
            if($_FILES['file']['name']!=null)
            {
                // echo "<script>
                //     alert('cek');
                //     </script>";
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

            if(in_array($eksten, $ekstensi)==true)
            {
                if($size<=2000000)
                {
                    if($file_tmp!=null) move_uploaded_file($file_tmp,DOCROOT.'/gambar/'.$nama);
                    if($keterangan=="")
                    {
                        $blabla = 0;
                    }
                    else
                    {
                        $blabla = 1;
                    }
                    $data = array('deq_id'=>$deqid, 'usr_id'=>$id, 'tch_keterangan'=>$keterangan, 'tch_statusketerangan'=>$blabla, 'tch_fotoketerangan'=>$nama, 'tch_tanggal'=>date('Y-m-d'), 'tch_statuscek'=>$status, 'tch_approval'=>'draft', 'tch_oknok'=>$oknok, 'tch_createby' => $createby, 'tch_createdate' => $createdate);
                    //menginput array $data ke dalam tabel database
                    $this->db->insert('beam_tr_checksheet', $data);
                    $tchid = $this->db->insert_id();
                    //update tanggal yang ada di dtl_equipment
                    $this->db->where('equ_id', $equid);
                    $array_dit = $this->db->get('beam_ms_equipment');
                    if($array_dit->num_rows() > 0)
                    {
                        //perulangan data diletakkan ke $datad
                        foreach ($array_dit->result() as $data_dit)
                        {
                            if($data_dit->equ_berkala == 'harian')
                            {
                                $add = ' + 1 day';
                            }
                            else if($data_dit->equ_berkala == 'mingguan')
                            {
                                $add = ' + 1 week';
                            }
                            else if($data_dit->equ_berkala == 'bulanan')
                            {
                                $add = ' + 1 months';
                            } 
                            else if($data_dit->equ_berkala == 'dwiwulan')
                            {
                                $add = ' + 2 months';
                            }
                            else if($data_dit->equ_berkala == 'triwulan')
                            {
                                $add = ' + 3 months';
                            }
                            else if($data_dit->equ_berkala == 'caturwulan')
                            {
                                $add = ' + 4 months';
                            }
                            else if($data_dit->equ_berkala == 'semester')
                            {
                                $add = ' + 6 months';
                            }
                            else if($data_dit->equ_berkala == 'tahunan')
                            {
                                $add = ' + 1 year';
                            }
                        }

                        $time = strtotime(date('Y-m-d').$add);
                        $tglcek = date('Y-m-d',$time);
                        $data = array('deq_tglcek'=>$tglcek);
                        $this->db->where('deq_id', $deqid);
                        $this->db->update('beam_dtl_equipment', $data);
                    }

                    // $createby = $this->input->post('createby');
                    // $createdate = $this->input->post('createdate');
                    // $modifby = $this->input->post('modifby');
                    // $modifdate = $this->input->post('modifdate');

                    //meletakkan isi variabel ke dalam array
                    //array adalah nama kolom di tabel pada database

                    $this->db->where('equ_id', $equid);
                    $array_dpo = $this->db->get('beam_dtl_poin');
                
                    // //memeriksa jumlah row != 0
                    if($array_dpo->num_rows() > 0)
                    {
                        //perulangan data diletakkan ke $datad
                        foreach ($array_dpo->result() as $data_dpo)
                        {
                            if($this->input->post('angka'.$data_dpo->dpo_id))
                            {
                                $datar = array('tch_id'=>$tchid, 'dpo_id'=>$data_dpo->dpo_id, 'tdp_nilai'=>$this->input->post('angka'.$data_dpo->dpo_id));
                                $this->db->insert('beam_tr_dtl_poincheck', $datar);
                            }
                        }
                    }

                    $this->db->where('equ_id', $equid);
                    $array_dit = $this->db->get('beam_dtl_itemcheck');

                    // //memeriksa jumlah row != 0
                    if($array_dit->num_rows() > 0)
                    {
                        //perulangan data diletakkan ke $datad
                        foreach ($array_dit->result() as $data_dit)
                        {
                            if($this->input->post('options'.$data_dit->ite_id))
                            {
                                $datai = array('tch_id'=>$tchid, 'ite_id'=>$data_dit->ite_id, 'tdi_kondisi'=>$this->input->post('options'.$data_dit->ite_id));
                                $this->db->insert('beam_tr_dtl_itemcheck', $datai);
                            }
                        }
                    }
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

        function updatedraft($id)
        {
            //mengambil data dari view
            //lalu diletakkan ke variabel
            $oknok = $this->input->post('oknok');   
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");
            
            $data = array('tch_oknok'=>$oknok, 'tch_modifby' => $modifby, 'tch_modifdate' => $modifdate);
            $this->db->where('tch_id', $id);
            //menginput array $data ke dalam tabel database
            $this->db->update('beam_tr_checksheet', $data);

            $this->db->where('tch_id', $id);
            $array_dpo = $this->db->get('beam_tr_dtl_poincheck');
            
            // //memeriksa jumlah row != 0
            if($array_dpo->num_rows() > 0)
            {
                //perulangan data diletakkan ke $datad
                foreach ($array_dpo->result() as $data_dpo)
                {
                    if($this->input->post('angka'.$data_dpo->dpo_id))
                    {
                        $datar = array('tdp_nilai'=>$this->input->post('angka'.$data_dpo->dpo_id));
                        $idarr = array('tch_id'=>$id, 'dpo_id'=>$data_dpo->dpo_id);
                        $this->db->where($idarr);
                        $this->db->update('beam_tr_dtl_poincheck', $datar);
                    }
                }
            }

            $this->db->where('tch_id', $id);
            $array_dit = $this->db->get('beam_tr_dtl_itemcheck');

            // //memeriksa jumlah row != 0
            if($array_dit->num_rows() > 0)
            {
                //perulangan data diletakkan ke $datad
                foreach ($array_dit->result() as $data_dit)
                {
                    if($this->input->post('options'.$data_dit->ite_id))
                    {
                        $datai = array('tdi_kondisi'=>$this->input->post('options'.$data_dit->ite_id));
                        $dataiarr = array('tch_id'=>$id, 'ite_id'=>$data_dit->ite_id);
                        $this->db->where($dataiarr);
                        $this->db->update('beam_tr_dtl_itemcheck', $datai);
                    }
                }
            }
        }

        //fungsi untuk melakukan penambahan data pada database
        function sent()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            $strings = '';
            if($id_item != null)
            {
                foreach( $id_item as $key) {   
                    $bool = true;
                    
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    
                    $data = array('tch_approval'=>'approvebyga', 'tch_alasan'=>'', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);

                    $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
                    $this->db->from('beam_tr_checksheet');
                    $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
                    $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                    $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                    $this->db->where('beam_tr_checksheet.tch_id',$key);
                    $checksheets=$this->db->get()->row();
                    // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

                    $strings = '
                    <tr>
                    <td>'.$checksheets->tch_tanggal.'</td>
                    <td>'.$checksheets->equ_nama.'</td>
                    <td>'.$checksheets->deq_lokasi.'</td>
                    <td>'.$checksheets->dept_nama.'</td>
                    <td>'.$checksheets->deq_kode.'</td>
                    <td>'.$checksheets->tch_approval.'</td>
                    </tr>
                    '.$strings;

                }
                
                // /////////////
                // //SENTEMAIL//
                // /////////////
            
                // $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                // require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                // require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                // // echo !extension_loaded('openssl')?"Not Available":"Available";
                // $mail = new PHPMailer();
                // // Enable verbose debug output
                // $mail->isSMTP(true);
                // // $mail->SMTPDebug = 2;
                // $mail->SMTPDebug = 0; 
                // //Ask for HTML-friendly debug output
                // $mail->SMTPSecure = 'tls';
                // //$mail->Host = 'smtp.gmail.com';
                // $mail->Port = 587;
                // //or more succinctly:
                // $mail->Host = 'tls://smtp.gmail.com:587';
                // $mail->Debugoutput = 'html';
                // $mail->SMTPOptions = array(
                //     'tls' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );
                // //$mail->Host = 'smtp.gmail.com';    
                // //$mail->Port = 465;        
                // //$mail->SMTPSecure = 'ssl';           
                // $mail->SMTPAuth = true;  
                // $mail->Username = 'ruzdi.lazis@gmail.com';
                // $mail->Password = 'Polman@2015';
                // $mail->isHTML(true);
                // //$mail->Sendmail = '/usr/sbin/sendmail';
                // $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');

                // //--------------------------
                // $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                // WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                // group by t.usr_email, t.usr_namalengkap
                // HAVING
                // COUNT(DISTINCT i.men_nama)=3
                // UNION
                // select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                // INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                // WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                // ");
                // //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                // if($query->num_rows()>0)
                // {
                //     //perulangan untuk setiap data yang ditemukan
                //     //akan diletakkan pada variabel $data
                //     foreach($query->result() as $data)
                //     {
                //         $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                //     }
                // }
                // //--------------------------
                // $mail->addReplyTo('ruzdi.lazis@gmail.com');

                // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                
                // // foreach( $id_item as $key) {
                // //     $strings += '<td>'.$key.'</td>';
                // // }

                // $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                // $mail->Body    = '
                // <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                // <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                // <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                // <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                // </table>
                // <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapprovega">Klik Disini</a>.<br/>
                // Terimakasih</p>
                // <p>Regards,<br/>
                // BEAM Systems</p><br/>
                // ';
                // $mail->AltBody = '';
                // $mail->XMailer = ' ';
                // if(!$mail->send()) {
                //     // echo "<script>
                //     // alert('Error..');
                //     // </script>";
                // //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                // } else {
                //     // echo "<script>
                //     // alert('Send..');
                //     // </script>";
                // }
                
                // $mail->ClearAddresses();
                // ///////////////////////////
                // ///////////////////////////
                // ///////////////////////////

                /////////////
                //SENTEMAIL//
                /////////////
            
                $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                $mail = new PHPMailer();
                $mail->isSMTP(true);
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'srv68.niagahoster.com';
                $mail->Port = 465;
                $mail->Debugoutput = 'html';
                $mail->SMTPOptions = array(
                    'tls' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); 
                $mail->SMTPAuth = true;  
                $mail->Username = 'beam-system@karyaanakpolman.com';
                $mail->Password = 'Polman@2019';
                $mail->isHTML(true);
                $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                
                //--------------------------
                $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                group by t.usr_email, t.usr_namalengkap
                HAVING
                COUNT(DISTINCT i.men_nama)=3
                UNION
                select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                ");
                //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                if($query->num_rows()>0)
                {
                    //perulangan untuk setiap data yang ditemukan
                    //akan diletakkan pada variabel $data
                    foreach($query->result() as $data)
                    {
                        $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                        
                    }
                }
                //--------------------------
                $mail->addReplyTo('beam-system@karyaanakpolman.com');

                $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                $mail->Body    = '
                <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi</th>
                            <th>Departemen</th>
                            <th>Kode Alat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                        '.$strings.'
                </table>
                <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentapprovega .<br/>
                Terimakasih</p>
                <p>Regards,<br/>
                BEAM Systems</p><br/>
                ';
                $mail->AltBody = '';
                $mail->XMailer = ' ';
                if(!$mail->send()) {
                    // echo "<script>
                    // alert('Error..');
                    // </script>";
                //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    // echo "<script>
                    // alert('Send..');
                    // </script>";
                }
                
                $mail->ClearAddresses();
                ///////////////////////////
                ///////////////////////////
                ///////////////////////////
            }
            
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function tolakdatadash()
        {
            $tchid = $this->input->post('tchid');
            $approval = $this->input->post('approval');
            $alasan = $this->input->post('txtAlasan');

            $strings="";
            $bool = false;
            if($approval == 'draft'){
                $bool = true;
               $approvals = 'rejected';
            }
            else if($approval == 'approvebyga'){
               $bool = true;
               $approvals = 'rejectedbyga';
            }
            else if($approval == 'rejectedbyga'){
               $bool = true;
               $approvals = 'rejected';
            }
            else 
            {
                $bool = false;
            }
            if($bool){
               $data = array('tch_approval'=>$approvals, 'tch_alasan'=>$alasan);
               $this->db->where('tch_id', $tchid);
               $this->db->update('beam_tr_checksheet', $data);

               $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
               $this->db->from('beam_tr_checksheet');
               $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
               $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
               $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
               $this->db->where('beam_tr_checksheet.tch_id',$tchid);
               $checksheets=$this->db->get()->row();
               // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

               $strings = '
               <tr>
               <td>'.$checksheets->tch_tanggal.'</td>
               <td>'.$checksheets->equ_nama.'</td>
               <td>'.$checksheets->deq_lokasi.'</td>
               <td>'.$checksheets->dept_nama.'</td>
               <td>'.$checksheets->deq_kode.'</td>
               <td>'.$checksheets->tch_approval.'</td>
               </tr>
               '.$strings;
               
            //    /////////////
            //    //SENTEMAIL//
            //    /////////////
            //    $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

            //    require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
            //    require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
               
            //    // echo !extension_loaded('openssl')?"Not Available":"Available";
            //    $mail = new PHPMailer();
            //                                // Enable verbose debug output
            //    $mail->isSMTP(true);
            // //    $mail->SMTPDebug = 2;
            //    $mail->SMTPDebug = 0; 
            //    //Ask for HTML-friendly debug output
            //    $mail->SMTPSecure = 'tls';
            //    //$mail->Host = 'smtp.gmail.com';
            //    $mail->Port = 587;
            //    //or more succinctly:
            //    $mail->Host = 'tls://smtp.gmail.com:587';
            //    $mail->Debugoutput = 'html';
            //    $mail->SMTPOptions = array(
            //        'tls' => array(
            //            'verify_peer' => false,
            //            'verify_peer_name' => false,
            //            'allow_self_signed' => true
            //        )
            //    );
            //    //$mail->Host = 'smtp.gmail.com';    
            //    //$mail->Port = 465;        
            //    //$mail->SMTPSecure = 'ssl';           
            //    $mail->SMTPAuth = true;  
            //    $mail->Username = 'ruzdi.lazis@gmail.com';
            //    $mail->Password = 'Polman@2015';
            //    $mail->isHTML(true);
            //    //$mail->Sendmail = '/usr/sbin/sendmail';
            //    $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');

            //    if($approvals == 'rejectedbyga'){
            //        //--------------------------
            //        $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
            //        WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
            //        group by t.usr_email, t.usr_namalengkap
            //        HAVING
            //        COUNT(DISTINCT i.men_nama)=3
            //        UNION
            //        select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
            //        INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
            //        WHERE(i.men_nama = 'sentdraft' and i.men_access = 1)
            //        ");
            //        //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            //        if($query->num_rows()>0)
            //        {
            //            //perulangan untuk setiap data yang ditemukan
            //            //akan diletakkan pada variabel $data
            //            foreach($query->result() as $data)
            //            {
            //                $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
            //            }
            //        }
            //        //--------------------------
            //        $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
            //        $mail->Body    = '
            //        <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
            //        <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
            //        <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
            //        <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
            //            <tr>
            //                <th>Tanggal</th>
            //                <th>Nama Peralatan</th>
            //                <th>Lokasi</th>
            //                <th>Departemen</th>
            //                <th>Kode Alat</th>
            //                <th>Status Persetujuan</th>
            //            </tr>
            //            '.$strings.'
            //        </table>
            //        <p>Alasan : '.$alasan.'.</p>
            //        <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentdraft">Klik Disini</a>.<br/>
            //        Terimakasih</p>
            //        <p>Regards,<br/>
            //        BEAM Systems</p><br/>
            //        ';
            //    }
            //    else if($approvals == 'rejectedbyuser'){
            //        //--------------------------
            //        $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
            //        WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
            //        group by t.usr_email, t.usr_namalengkap
            //        HAVING
            //        COUNT(DISTINCT i.men_nama)=3
            //        UNION
            //        select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
            //        INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
            //        WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
            //        ");
            //        //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            //        if($query->num_rows()>0)
            //        {
            //            //perulangan untuk setiap data yang ditemukan
            //            //akan diletakkan pada variabel $data
            //            foreach($query->result() as $data)
            //            {
            //                $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
            //            }
            //        }
            //        //--------------------------
            //        $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
            //        $mail->Body    = '
            //        <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
            //        <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
            //        <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
            //        <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
            //            <tr>
            //                <th>Tanggal</th>
            //                <th>Nama Peralatan</th>
            //                <th>Lokasi</th>
            //                <th>Departemen</th>
            //                <th>Kode Alat</th>
            //                <th>Status Persetujuan</th>
            //            </tr>
            //            '.$strings.'
            //        </table>
            //        <p>Alasan : '.$alasan.'.</p>
            //        <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapprovega">Klik Disini</a>.<br/>
            //        Terimakasih</p>
            //        <p>Regards,<br/>
            //        BEAM Systems</p><br/>
            //        ';
            //    }

            //    $mail->addReplyTo('ruzdi.lazis@gmail.com');

            //    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //    //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
               
            //    // foreach( $id_item as $key) {
            //    //     $strings += '<td>'.$key.'</td>';
            //    // }

            //    $mail->AltBody = '';
            //    $mail->XMailer = ' ';
            //    if(!$mail->send()) {
            //        // echo "<script>
            //        // alert('Error..');
            //        // </script>";
            //    //    echo 'Mailer Error: ' . $mail->ErrorInfo;
            //    } else {
            //        // echo "<script>
            //        // alert('Send..');
            //        // </script>";
            //    }
               
            //    $mail->ClearAddresses();
            //    ///////////////////////////
            //    ///////////////////////////
            //    ///////////////////////////

                /////////////
                //SENTEMAIL//
                /////////////
            
                $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                $mail = new PHPMailer();
                $mail->isSMTP(true);
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'srv68.niagahoster.com';
                $mail->Port = 465;
                $mail->Debugoutput = 'html';
                $mail->SMTPOptions = array(
                    'tls' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); 
                $mail->SMTPAuth = true;  
                $mail->Username = 'beam-system@karyaanakpolman.com';
                $mail->Password = 'Polman@2019';
                $mail->isHTML(true);
                $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                
				if($approvals == 'rejectedbyga'){
                   //--------------------------
                   $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                   WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                   group by t.usr_email, t.usr_namalengkap
                   HAVING
                   COUNT(DISTINCT i.men_nama)=3
                   UNION
                   select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                   INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                   WHERE(i.men_nama = 'sentdraft' and i.men_access = 1)
                   ");
                   //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                   if($query->num_rows()>0)
                   {
                       //perulangan untuk setiap data yang ditemukan
                       //akan diletakkan pada variabel $data
                       foreach($query->result() as $data)
                       {
                           $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                       }
                   }
                   //--------------------------
                   $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                   $mail->Body    = '
                   <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                   <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                   <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                   <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                       <tr>
                           <th>Tanggal</th>
                           <th>Nama Peralatan</th>
                           <th>Lokasi</th>
                           <th>Departemen</th>
                           <th>Kode Alat</th>
                           <th>Status Pengajuan</th>
                       </tr>
                       '.$strings.'
                   </table>
                   <p>Alasan : '.$alasan.'.</p>
                   <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentdraft.<br/>
                   Terimakasih</p>
                   <p>Regards,<br/>
                   BEAM Systems</p><br/>
                   ';
               }
               else if($approvals == 'rejectedbyuser'){
                   //--------------------------
                   $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                   WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                   group by t.usr_email, t.usr_namalengkap
                   HAVING
                   COUNT(DISTINCT i.men_nama)=3
                   UNION
                   select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                   INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                   WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                   ");
                   //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                   if($query->num_rows()>0)
                   {
                       //perulangan untuk setiap data yang ditemukan
                       //akan diletakkan pada variabel $data
                       foreach($query->result() as $data)
                       {
                           $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                       }
                   }
                   //--------------------------
                   $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                   $mail->Body    = '
                   <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                   <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                   <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                   <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                       <tr>
                           <th>Tanggal</th>
                           <th>Nama Peralatan</th>
                           <th>Lokasi</th>
                           <th>Departemen</th>
                           <th>Kode Alat</th>
                           <th>Status Pengajuan</th>
                       </tr>
                       '.$strings.'
                   </table>
                   <p>Alasan : '.$alasan.'.</p>
                   <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentapprovega.<br/>
                   Terimakasih</p>
                   <p>Regards,<br/>
                   BEAM Systems</p><br/>
                   ';
               }
				
                $mail->addReplyTo('beam-system@karyaanakpolman.com');
                $mail->AltBody = '';
                $mail->XMailer = ' ';
                if(!$mail->send()) {
                    // echo "<script>
                    // alert('Error..');
                    // </script>";
                //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    // echo "<script>
                    // alert('Send..');
                    // </script>";
                }
                
                $mail->ClearAddresses();
                ///////////////////////////
                ///////////////////////////
                ///////////////////////////
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function tolakdraft()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            $alasan = $this->input->post('txtAlasan');
            if($id_item != null)
            {
                foreach( $id_item as $key) { 
                    $bool = true;  
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_approval'=>'rejected', 'tch_alasan'=>$alasan, 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);
                }
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function tolakbyga()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            $alasan = $this->input->post('txtAlasan');
            $strings = '';
            if($id_item != null)
            {
                foreach( $id_item as $key) {   
                    $bool = true;
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_approval'=>'rejectedbyga', 'tch_alasan'=>$alasan, 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);

                    $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
                    $this->db->from('beam_tr_checksheet');
                    $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
                    $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                    $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                    $this->db->where('beam_tr_checksheet.tch_id',$key);
                    $checksheets=$this->db->get()->row();
                    // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

                    $strings = '
                    <tr>
                    <td>'.$checksheets->tch_tanggal.'</td>
                    <td>'.$checksheets->equ_nama.'</td>
                    <td>'.$checksheets->deq_lokasi.'</td>
                    <td>'.$checksheets->dept_nama.'</td>
                    <td>'.$checksheets->deq_kode.'</td>
                    <td>'.$checksheets->tch_approval.'</td>
                    </tr>
                    '.$strings;
                }

                // /////////////
                // //SENTEMAIL//
                // /////////////
            
                // $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                // require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                // require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                // // echo !extension_loaded('openssl')?"Not Available":"Available";
                // $mail = new PHPMailer();
                //                             // Enable verbose debug output
                // $mail->isSMTP(true);
                // // $mail->SMTPDebug = 2;
                // $mail->SMTPDebug = 0; 
                // //Ask for HTML-friendly debug output
                // $mail->SMTPSecure = 'tls';
                // //$mail->Host = 'smtp.gmail.com';
                // $mail->Port = 587;
                // //or more succinctly:
                // $mail->Host = 'tls://smtp.gmail.com:587';
                // $mail->Debugoutput = 'html';
                // $mail->SMTPOptions = array(
                //     'tls' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );
                // //$mail->Host = 'smtp.gmail.com';    
                // //$mail->Port = 465;        
                // //$mail->SMTPSecure = 'ssl';           
                // $mail->SMTPAuth = true;  
                // $mail->Username = 'ruzdi.lazis@gmail.com';
                // $mail->Password = 'Polman@2015';
                // $mail->isHTML(true);
                // //$mail->Sendmail = '/usr/sbin/sendmail';
                // $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');

                // //--------------------------
                // $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                // WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                // group by t.usr_email, t.usr_namalengkap
                // HAVING
                // COUNT(DISTINCT i.men_nama)=3
                // UNION
                // select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                // INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                // WHERE(i.men_nama = 'sentdraft' and i.men_access = 1)
                // ");
                // //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                // if($query->num_rows()>0)
                // {
                //     //perulangan untuk setiap data yang ditemukan
                //     //akan diletakkan pada variabel $data
                //     foreach($query->result() as $data)
                //     {
                //         $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                //     }
                // }
                // //--------------------------
                // $mail->addReplyTo('ruzdi.lazis@gmail.com');

                // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                
                // // foreach( $id_item as $key) {
                // //     $strings += '<td>'.$key.'</td>';
                // // }

                // $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                // $mail->Body    = '
                // <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                // <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                // <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                // <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                // </table>
                // <p>Alasan : '.$alasan.'.</p>
                // <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentdraft">Klik Disini</a>.<br/>
                // Terimakasih</p>
                // <p>Regards,<br/>
                // BEAM Systems</p><br/>
                // ';
                // $mail->AltBody = '';
                // $mail->XMailer = ' ';
                // if(!$mail->send()) {
                //     // echo "<script>
                //     // alert('Error..');
                //     // </script>";
                // //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                // } else {
                //     // echo "<script>
                //     // alert('Send..');
                //     // </script>";
                // }
                
                // $mail->ClearAddresses();
                // ///////////////////////////
                // ///////////////////////////
                // ///////////////////////////

                /////////////
                //SENTEMAIL//
                /////////////
            
                $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                $mail = new PHPMailer();
                $mail->isSMTP(true);
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'srv68.niagahoster.com';
                $mail->Port = 465;
                $mail->Debugoutput = 'html';
                $mail->SMTPOptions = array(
                    'tls' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); 
                $mail->SMTPAuth = true;  
                $mail->Username = 'beam-system@karyaanakpolman.com';
                $mail->Password = 'Polman@2019';
                $mail->isHTML(true);
                $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                
				//--------------------------
                $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                group by t.usr_email, t.usr_namalengkap
                HAVING
                COUNT(DISTINCT i.men_nama)=3
                UNION
                select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                WHERE(i.men_nama = 'sentdraft' and i.men_access = 1)
                ");
                //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                if($query->num_rows()>0)
                {
                    //perulangan untuk setiap data yang ditemukan
                    //akan diletakkan pada variabel $data
                    foreach($query->result() as $data)
                    {
                        $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                    }
                }
                //--------------------------
				
                $mail->addReplyTo('beam-system@karyaanakpolman.com');

                $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                $mail->Body    = '
                <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi</th>
                            <th>Departemen</th>
                            <th>Kode Alat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                        '.$strings.'
                </table>
                <p>Alasan : '.$alasan.'.</p>
                <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentdraft.<br/>
                Terimakasih</p>
                <p>Regards,<br/>
                BEAM Systems</p><br/>
                ';
                $mail->AltBody = '';
                $mail->XMailer = ' ';
                if(!$mail->send()) {
                    // echo "<script>
                    // alert('Error..');
                    // </script>";
                //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    // echo "<script>
                    // alert('Send..');
                    // </script>";
                }
                
                $mail->ClearAddresses();
                ///////////////////////////
                ///////////////////////////
                ///////////////////////////
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function tolakbyuser()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            $alasan = $this->input->post('txtAlasan');
            $strings = '';
            if($id_item != null)
                {
                foreach( $id_item as $key) {   
                    $bool = true;
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_approval'=>'rejectedbyuser', 'tch_alasan'=>$alasan, 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);

                    $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
                    $this->db->from('beam_tr_checksheet');
                    $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
                    $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                    $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                    $this->db->where('beam_tr_checksheet.tch_id',$key);
                    $checksheets=$this->db->get()->row();
                    // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

                    $strings = '
                    <tr>
                    <td>'.$checksheets->tch_tanggal.'</td>
                    <td>'.$checksheets->equ_nama.'</td>
                    <td>'.$checksheets->deq_lokasi.'</td>
                    <td>'.$checksheets->dept_nama.'</td>
                    <td>'.$checksheets->deq_kode.'</td>
                    <td>'.$checksheets->tch_approval.'</td>
                    </tr>
                    '.$strings;
                }

                // /////////////
                // //SENTEMAIL//
                // /////////////
            
                // $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                // require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                // require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                // // echo !extension_loaded('openssl')?"Not Available":"Available";
                // $mail = new PHPMailer();
                //                             // Enable verbose debug output
                // $mail->isSMTP(true);
                // // $mail->SMTPDebug = 2;
                // $mail->SMTPDebug = 0; 
                // //Ask for HTML-friendly debug output
                // $mail->SMTPSecure = 'tls';
                // //$mail->Host = 'smtp.gmail.com';
                // $mail->Port = 587;
                // //or more succinctly:
                // $mail->Host = 'tls://smtp.gmail.com:587';
                // $mail->Debugoutput = 'html';
                // $mail->SMTPOptions = array(
                //     'tls' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );
                // //$mail->Host = 'smtp.gmail.com';    
                // //$mail->Port = 465;        
                // //$mail->SMTPSecure = 'ssl';           
                // $mail->SMTPAuth = true;  
                // $mail->Username = 'ruzdi.lazis@gmail.com';
                // $mail->Password = 'Polman@2015';
                // $mail->isHTML(true);
                // //$mail->Sendmail = '/usr/sbin/sendmail';
                // $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');

                // //--------------------------
                // $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                // WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                // group by t.usr_email, t.usr_namalengkap
                // HAVING
                // COUNT(DISTINCT i.men_nama)=3
                // UNION
                // select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                // INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                // WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                // ");
                // //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                // if($query->num_rows()>0)
                // {
                //     //perulangan untuk setiap data yang ditemukan
                //     //akan diletakkan pada variabel $data
                //     foreach($query->result() as $data)
                //     {
                //         $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                //     }
                // }
                // //--------------------------
                // $mail->addReplyTo('ruzdi.lazis@gmail.com');

                // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                
                // // foreach( $id_item as $key) {
                // //     $strings += '<td>'.$key.'</td>';
                // // }

                // $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                // $mail->Body    = '
                // <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                // <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                // <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                // <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                // </table>
                // <p>Alasan : '.$alasan.'.</p>
                // <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapprovega">Klik Disini</a>.<br/>
                // Terimakasih</p>
                // <p>Regards,<br/>
                // BEAM Systems</p><br/>
                // ';
                // $mail->AltBody = '';
                // $mail->XMailer = ' ';
                // if(!$mail->send()) {
                //     // echo "<script>
                //     // alert('Error..');
                //     // </script>";
                // //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                // } else {
                //     // echo "<script>
                //     // alert('Send..');
                //     // </script>";
                // }
                
                // $mail->ClearAddresses();
                // ///////////////////////////
                // ///////////////////////////
                // ///////////////////////////

                /////////////
                //SENTEMAIL//
                /////////////
            
                $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                $mail = new PHPMailer();
                $mail->isSMTP(true);
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'srv68.niagahoster.com';
                $mail->Port = 465;
                $mail->Debugoutput = 'html';
                $mail->SMTPOptions = array(
                    'tls' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); 
                $mail->SMTPAuth = true;  
                $mail->Username = 'beam-system@karyaanakpolman.com';
                $mail->Password = 'Polman@2019';
                $mail->isHTML(true);
                $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                
				//--------------------------
                $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                group by t.usr_email, t.usr_namalengkap
                HAVING
                COUNT(DISTINCT i.men_nama)=3
                UNION
                select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                ");
                //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                if($query->num_rows()>0)
                {
                    //perulangan untuk setiap data yang ditemukan
                    //akan diletakkan pada variabel $data
                    foreach($query->result() as $data)
                    {
                        $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                    }
                }
                //--------------------------
				
                $mail->addReplyTo('beam-system@karyaanakpolman.com');

                $mail->Subject = 'Verifikasi Konfirmasi Penolakan Lembar Pengecekan';
                $mail->Body    = '
                <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi</th>
                            <th>Departemen</th>
                            <th>Kode Alat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                        '.$strings.'
                </table>
                <p>Alasan : '.$alasan.'.</p>
                <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentapprovega.<br/>
                Terimakasih</p>
                <p>Regards,<br/>
                BEAM Systems</p><br/>
                ';
                $mail->AltBody = '';
                $mail->XMailer = ' ';
                if(!$mail->send()) {
                    // echo "<script>
                    // alert('Error..');
                    // </script>";
                //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    // echo "<script>
                    // alert('Send..');
                    // </script>";
                }
                
                $mail->ClearAddresses();
                ///////////////////////////
                ///////////////////////////
                ///////////////////////////
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function sentapprovega()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            
            if($id_item != null)
            {
                $sedekah = array();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                // echo !extension_loaded('openssl')?"Not Available":"Available";
                $mail = new PHPMailer();
                
                foreach( $id_item as $key) {  
                    $bool = true; 
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_approval'=>'approved', 'tch_alasan'=>'', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);
                    $query = $this->db->query("select t.dept_id FROM beam_dtl_equipment t 
                    INNER JOIN beam_tr_checksheet i ON i.deq_id=t.deq_id       
                    WHERE i.tch_id = ".$key);
                    // $salur=$this->db->get();
                    //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    if($query->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($query->result() as $data)
                        {
                            if(!in_array($data->dept_id, $sedekah, true)){
                                array_push($sedekah, $data->dept_id);
                            }
                        }
                    }                
                }

                foreach($sedekah as $data)
                {
                    $strings = "";
                    $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
                    $this->db->from('beam_tr_checksheet');
                    $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
                    $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                    $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                    $this->db->where('beam_dtl_equipment.dept_id',$data);
                    $this->db->where_in('beam_tr_checksheet.tch_id', $id_item);
                    $checksheets=$this->db->get();
                    // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

                    if($checksheets->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($checksheets->result() as $datasr)
                        {
                            $strings = '
                            <tr>
                            <td>'.$datasr->tch_tanggal.'</td>
                            <td>'.$datasr->equ_nama.'</td>
                            <td>'.$datasr->deq_lokasi.'</td>
                            <td>'.$datasr->dept_nama.'</td>
                            <td>'.$datasr->deq_kode.'</td>
                            <td>'.$datasr->tch_approval.'</td>
                            </tr>
                            '.$strings;
                        }
                    }

                    echo "<script>alert('".$strings."');";
                    echo "</script>"; 
                    // /////////////
                    // //SENTEMAIL//
                    // /////////////
                    
                    // $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();
                    //                             // Enable verbose debug output
                    // $mail->isSMTP(true);
                    // // $mail->SMTPDebug = 2;
                    // $mail->SMTPDebug = 0; 
                    // //Ask for HTML-friendly debug output
                    // $mail->SMTPSecure = 'tls';
                    // //$mail->Host = 'smtp.gmail.com';
                    // $mail->Port = 587;
                    // //or more succinctly:
                    // $mail->Host = 'tls://smtp.gmail.com:587';
                    // $mail->Debugoutput = 'html';
                    // $mail->SMTPOptions = array(
                    //     'tls' => array(
                    //         'verify_peer' => false,
                    //         'verify_peer_name' => false,
                    //         'allow_self_signed' => true
                    //     )
                    // );
                    // //$mail->Host = 'smtp.gmail.com';    
                    // //$mail->Port = 465;        
                    // //$mail->SMTPSecure = 'ssl';           
                    // $mail->SMTPAuth = true;  
                    // $mail->Username = 'ruzdi.lazis@gmail.com';
                    // $mail->Password = 'Polman@2015';
                    // $mail->isHTML(true);
                    // //$mail->Sendmail = '/usr/sbin/sendmail';
                    // $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');

                    // //--------------------------
                    // $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                    // WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                    // group by t.usr_email, t.usr_namalengkap
                    // HAVING
                    // COUNT(DISTINCT i.men_nama)=3
                    // UNION
                    // select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                    // INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                    // WHERE(i.men_nama = 'sentapproveuser' and i.men_access = 1 and t.dept_id = ".$data.")
                    // ");
                    // //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    // if($query->num_rows()>0)
                    // {
                    //     //perulangan untuk setiap data yang ditemukan
                    //     //akan diletakkan pada variabel $data
                    //     foreach($query->result() as $datass)
                    //     {
                    //         $mail->addAddress($datass->usr_email, $datass->usr_namalengkap);     // Add a recipient
                    //     }
                    // }
                    // //--------------------------
                    // $mail->addReplyTo('ruzdi.lazis@gmail.com');

                    // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                    
                    // // foreach( $id_item as $key) {
                    // //     $strings += '<td>'.$key.'</td>';
                    // // }

                    // $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                    // $mail->Body    = '
                    // <p>Kepada Pengguna BEAM,</p><br/>
                    // <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                    // <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                    // <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                    //         <tr>
                    //             <th>Tanggal</th>
                    //             <th>Nama Peralatan</th>
                    //             <th>Lokasi</th>
                    //             <th>Departemen</th>
                    //             <th>Kode Alat</th>
                    //             <th>Status Persetujuan</th>
                    //         </tr>
                    //         '.$strings.'
                    // </table>
                    // <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapproveuser">Klik Disini</a>.<br/>
                    // Terimakasih</p>
                    // <p>Regards,<br/>
                    // BEAM Systems</p><br/>
                    // ';
                    // $mail->AltBody = '';
                    // $mail->XMailer = ' ';
                    // if(!$mail->send()) {
                    //     // echo "<script>
                    //     // alert('Error..');
                    //     // </script>";
                    // //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    // } else {
                    //     // echo "<script>
                    //     // alert('Send..');
                    //     // </script>";
                    // }
                    // $mail->ClearAddresses();
                    // ///////////////////////////
                    // ///////////////////////////
                    // ///////////////////////////

                    /////////////
                    //SENTEMAIL//
                    /////////////
                
                    $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();
    
                    $mail->isSMTP(true);
                    $mail->SMTPDebug = 0;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Host = 'srv68.niagahoster.com';
                    $mail->Port = 465;
                    $mail->Debugoutput = 'html';
                    $mail->SMTPOptions = array(
                        'tls' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    ); 
                    $mail->SMTPAuth = true;  
                    $mail->Username = 'beam-system@karyaanakpolman.com';
                    $mail->Password = 'Polman@2019';
                    $mail->isHTML(true);
                    $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                    
    				//--------------------------
    				$query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
    				WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
    				group by t.usr_email, t.usr_namalengkap
    				HAVING
    				COUNT(DISTINCT i.men_nama)=3
    				UNION
    				select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
    				INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
    				WHERE(i.men_nama = 'sentapproveuser' and i.men_access = 1 and t.dept_id = ".$data.")
    				");
    				//memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
    				if($query->num_rows()>0)
    				{
    					//perulangan untuk setiap data yang ditemukan
    					//akan diletakkan pada variabel $data
    					foreach($query->result() as $datass)
    					{
    						$mail->addAddress($datass->usr_email, $datass->usr_namalengkap);     // Add a recipient
    					}
    				}
    				//--------------------------
    				
                    $mail->addReplyTo('beam-system@karyaanakpolman.com');
    
    				$mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
    				$mail->Body    = '
    				<p>Kepada Pengguna BEAM,</p><br/>
    				<p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
    				<center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
    				<table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
    						<tr>
    							<th>Tanggal</th>
    							<th>Nama Peralatan</th>
    							<th>Lokasi</th>
    							<th>Departemen</th>
    							<th>Kode Alat</th>
    							<th>Status Pengajuan</th>
    						</tr>
    						'.$strings.'
    				</table>
    				<p>Silahkan berikan umpan balik terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentapproveuser.<br/>
    				Terimakasih</p>
    				<p>Regards,<br/>
    				BEAM Systems</p><br/>
    				';
                    $mail->AltBody = '';
                    $mail->XMailer = ' ';
                    if(!$mail->send()) {
                        // echo "<script>
                        // alert('Error..');
                        // </script>";
                    //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        // echo "<script>
                        // alert('Send..');
                        // </script>";
                    }
                    
                    $mail->ClearAddresses();
                    ///////////////////////////
                    ///////////////////////////
                    ///////////////////////////

                }
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function readCatatan()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            
            if($id_item != null)
            {
                foreach( $id_item as $key) {  
                    $bool = true; 
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_statuscatatan'=>'2', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);          
                }
            }
            return $bool;
        }

        //fungsi untuk melakukan penambahan data pada database
        function readFeedback()
        {
            $bool = false;
            $id_item = $this->input->post('id_item');
            
            if($id_item != null)
            {
                foreach( $id_item as $key) {  
                    $bool = true; 
                    $modifby = $this->session->userdata('id');
                    $modifdate = date("Y-m-d H:i:s");
                    $data = array('tch_statusfeedback'=>'2', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $key);
                    $this->db->update('beam_tr_checksheet', $data);          
                }
            }
            return $bool;
        }

         //fungsi untuk melakukan penambahan data pada database
         function berandakonfir()
         {
             $bool = false;
             $tchid =  $this->uri->segment(3);
             $approval =  $this->uri->segment(4);
             $strings="";
             if($approval == 'draft'){
                 $bool = true;
                $approvals = 'approvebyga';
             }
             else if($approval == 'approvebyga'){
                $bool = true;
                $approvals = 'approved';
             }
             else if($approval == 'rejectedbyga'){
                $bool = true;
                $approvals = 'approvebyga';
             }
             else 
             {
                 $bool = false;
             }
             if($bool){
                $modifby = $this->session->userdata('id');
                $modifdate = date("Y-m-d H:i:s");
                $data = array('tch_approval'=>$approvals, 'tch_alasan'=>'', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                $this->db->where('tch_id', $tchid);
                $this->db->update('beam_tr_checksheet', $data);

                $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama, beam_tr_checksheet.tch_approval');
                $this->db->from('beam_tr_checksheet');
                $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
                $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
                $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
                $this->db->where('beam_tr_checksheet.tch_id',$tchid);
                $checksheets=$this->db->get()->row();
                // $checksheets = $this->db->get_where('beam_tr_checksheet', array('tch_id'=>$key))->row();

                $strings = '
                <tr>
                <td>'.$checksheets->tch_tanggal.'</td>
                <td>'.$checksheets->equ_nama.'</td>
                <td>'.$checksheets->deq_lokasi.'</td>
                <td>'.$checksheets->dept_nama.'</td>
                <td>'.$checksheets->deq_kode.'</td>
                <td>'.$checksheets->tch_approval.'</td>
                </tr>
                '.$strings;
                
                // /////////////
                // //SENTEMAIL//
                // /////////////
                // $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                // require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                // require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                // // echo !extension_loaded('openssl')?"Not Available":"Available";
                // $mail = new PHPMailer();
                //                             // Enable verbose debug output
                // $mail->isSMTP(true);
                // // $mail->SMTPDebug = 2;
                // $mail->SMTPDebug = 0; 
                // //Ask for HTML-friendly debug output
                // $mail->SMTPSecure = 'tls';
                // //$mail->Host = 'smtp.gmail.com';
                // $mail->Port = 587;
                // //or more succinctly:
                // $mail->Host = 'tls://smtp.gmail.com:587';
                // $mail->Debugoutput = 'html';
                // $mail->SMTPOptions = array(
                //     'tls' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );
                // //$mail->Host = 'smtp.gmail.com';    
                // //$mail->Port = 465;        
                // //$mail->SMTPSecure = 'ssl';           
                // $mail->SMTPAuth = true;  
                // $mail->Username = 'ruzdi.lazis@gmail.com';
                // $mail->Password = 'Polman@2015';
                // $mail->isHTML(true);
                // //$mail->Sendmail = '/usr/sbin/sendmail';
                // $mail->setFrom('ruzdi.lazis@gmail.com','BEAM Systems');
            
                // if($approvals == 'approvebyga'){
                //     //--------------------------
                //     $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                //     WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                //     group by t.usr_email, t.usr_namalengkap
                //     HAVING
                //     COUNT(DISTINCT i.men_nama)=3
                //     UNION
                //     select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                //     INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                //     WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                //     ");
                //     //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                //     if($query->num_rows()>0)
                //     {
                //         //perulangan untuk setiap data yang ditemukan
                //         //akan diletakkan pada variabel $data
                //         foreach($query->result() as $data)
                //         {
                //             $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                //         }
                //     }
                //     //--------------------------
                    
                //     $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                //     $mail->Body    = '
                //     <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                //     <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                //     <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                //     <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                //     </table>
                //     <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapprovega">Klik Disini</a>.<br/>
                //     Terimakasih</p>
                //     <p>Regards,<br/>
                //     BEAM Systems</p><br/>
                //     ';
                // }
                // else if($approvals == 'approvebyuser'){
                //     $data = $this->db->query("select t.dept_id FROM beam_dtl_equipment t 
                //     INNER JOIN beam_tr_checksheet i ON i.deq_id=t.deq_id       
                //     WHERE i.tch_id = ".$tchid)->row();
                    
                //     //--------------------------
                //     $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                //     WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                //     group by t.usr_email, t.usr_namalengkap
                //     HAVING
                //     COUNT(DISTINCT i.men_nama)=3
                //     UNION
                //     select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                //     INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                //     WHERE(i.men_nama = 'sentapproveuser' and i.men_access = 1 and t.dept_id = ".$data->dept_id.")
                //     ");
                //     //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                //     if($query->num_rows()>0)
                //     {
                //         //perulangan untuk setiap data yang ditemukan
                //         //akan diletakkan pada variabel $data
                //         foreach($query->result() as $datass)
                //         {
                //             $mail->addAddress($datass->usr_email, $datass->usr_namalengkap);     // Add a recipient
                //         }
                //     }
                //     //--------------------------
                //     $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                //     $mail->Body    = '
                //     <p>Kepada Pengguna BEAM,</p><br/>
                //     <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                //     <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                //     <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                //     </table>
                //     <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses link <a href="http://localhost:8080/beam-new/checksheet/sentapproveuser">Klik Disini</a>.<br/>
                //     Terimakasih</p>
                //     <p>Regards,<br/>
                //     BEAM Systems</p><br/>
                //     ';
                // }
                // else if($approvals == 'approved'){
                //     //--------------------------
                //     $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                //     WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                //     group by t.usr_email, t.usr_namalengkap
                //     HAVING
                //     COUNT(DISTINCT i.men_nama)=3
                //     UNION
                //     select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                //     INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                //     WHERE(i.men_nama = 'laporan' and i.men_special = 1)
                //     ");
                //     //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                //     if($query->num_rows()>0)
                //     {
                //         //perulangan untuk setiap data yang ditemukan
                //         //akan diletakkan pada variabel $data
                //         foreach($query->result() as $data)
                //         {
                //             $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                //         }
                //     }
                //     //--------------------------

                //     $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                //     $mail->Body    = '
                //     <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                //     <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                //     <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                //     <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                //         <tr>
                //             <th>Tanggal</th>
                //             <th>Nama Peralatan</th>
                //             <th>Lokasi</th>
                //             <th>Departemen</th>
                //             <th>Kode Alat</th>
                //             <th>Status Persetujuan</th>
                //         </tr>
                //         '.$strings.'
                //     </table>
                //     <p>Untuk melihat akumulasi terhadap data-data diatas dapat diakses melalui link <a href="http://localhost:8080/beam-new/home">Klik Disini</a>.<br/>
                //     Terimakasih</p>
                //     <p>Regards,<br/>
                //     BEAM Systems</p><br/>
                //     ';
                // }

                // $mail->addReplyTo('ruzdi.lazis@gmail.com');

                // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                
                // // foreach( $id_item as $key) {
                // //     $strings += '<td>'.$key.'</td>';
                // // }

                // $mail->AltBody = '';
                // $mail->XMailer = ' ';
                // if(!$mail->send()) {
                //     // echo "<script>
                //     // alert('Error..');
                //     // </script>";
                // //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                // } else {
                //     // echo "<script>
                //     // alert('Send..');
                //     // </script>";
                // }
                
                // $mail->ClearAddresses();
                // ///////////////////////////
                // ///////////////////////////
                // ///////////////////////////
                
                /////////////
                //SENTEMAIL//
                /////////////
            
                $cari = $this->db->get_where('beam_ms_user', array('usr_id'=>$this->session->userdata('id')))->row();

                require  FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
                require  FCPATH.'assets/phpmailer/class.phpmailer.php'; 
                
                $mail = new PHPMailer();
                $mail->isSMTP(true);
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'srv68.niagahoster.com';
                $mail->Port = 465;
                $mail->Debugoutput = 'html';
                $mail->SMTPOptions = array(
                    'tls' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); 
                $mail->SMTPAuth = true;  
                $mail->Username = 'beam-system@karyaanakpolman.com';
                $mail->Password = 'Polman@2019';
                $mail->isHTML(true);
                $mail->setFrom('beam-system@karyaanakpolman.com','BEAM Systems');
                
				if($approvals == 'approvebyga'){
                    //--------------------------
                    $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                    WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                    group by t.usr_email, t.usr_namalengkap
                    HAVING
                    COUNT(DISTINCT i.men_nama)=3
                    UNION
                    select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                    INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                    WHERE(i.men_nama = 'sentapprovega' and i.men_access = 1)
                    ");
                    //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    if($query->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($query->result() as $data)
                        {
                            $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                        }
                    }
                    //--------------------------
                    
                    $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                    $mail->Body    = '
                    <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                    <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                    <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                    <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi</th>
                            <th>Departemen</th>
                            <th>Kode Alat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                        '.$strings.'
                    </table>
                    <p>Lakukan persetujuan terhadap data-data diatas dengan mengakses URL beam.karyaanakpolman.com/checksheet/sentapprovega.<br/>
                    Terimakasih</p>
                    <p>Regards,<br/>
                    BEAM Systems</p><br/>
                    ';
                }
                else if($approvals == 'approved'){
                    //--------------------------
                    $query = $this->db->query("select t.usr_email, t.usr_namalengkap FROM beam_ms_user t INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id 
                    WHERE ((i.men_nama = 'sentdraft' and i.men_access = 1) or (i.men_nama = 'sentapprovega' and i.men_access = 1) or (i.men_nama = 'sentapproveuser' and i.men_access = 1))
                    group by t.usr_email, t.usr_namalengkap
                    HAVING
                    COUNT(DISTINCT i.men_nama)=3
                    UNION
                    select t.usr_email, t.usr_namalengkap FROM beam_ms_user t 
                    INNER JOIN beam_ms_menu i ON i.rol_id=t.rol_id
                    WHERE(i.men_nama = 'laporan' and i.men_special = 1)
                    ");
                    //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
                    if($query->num_rows()>0)
                    {
                        //perulangan untuk setiap data yang ditemukan
                        //akan diletakkan pada variabel $data
                        foreach($query->result() as $data)
                        {
                            $mail->addAddress($data->usr_email, $data->usr_namalengkap);     // Add a recipient
                        }
                    }
                    //--------------------------

                    $mail->Subject = 'Verifikasi Konfirmasi Persetujuan Lembar Pengecekan';
                    $mail->Body    = '
                    <p>Kepada '.$cari->usr_namalengkap.',</p><br/>
                    <p>Berikut telah dilampirkan daftar transaksi terakhir yang telah dilakukan. Berikut adalah informasi detailnya.</p>
                    <center><h1>Keterangan Lembar Pengecekan</h1></center><br/>
                    <table border="1"  width="100%"" cellspacing="0" cellpadding="5">			
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi</th>
                            <th>Departemen</th>
                            <th>Kode Alat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                        '.$strings.'
                    </table>
                    <p>Untuk melihat akumulasi terhadap data-data diatas dapat diakses melalui URL beam.karyaanakpolman.com/home.<br/>
                    Terimakasih</p>
                    <p>Regards,<br/>
                    BEAM Systems</p><br/>
                    ';
                }
				
                $mail->addReplyTo('beam-system@karyaanakpolman.com');
                $mail->AltBody = '';
                $mail->XMailer = ' ';
                if(!$mail->send()) {
                    // echo "<script>
                    // alert('Error..');
                    // </script>";
                //    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    // echo "<script>
                    // alert('Send..');
                    // </script>";
                }
                
                $mail->ClearAddresses();
                ///////////////////////////
                ///////////////////////////
                ///////////////////////////
             }
             return $bool;
         }

        function tampil_draft($rolid)
		{
            $sedekah = array();
            
            $bool1 = false;
            $bool2 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $rolid);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                }
            }

            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_statuscek, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            if($bool1 && $bool2)
            {
                $where = '(beam_tr_checksheet.tch_approval="draft" or beam_tr_checksheet.tch_approval = "rejectedbyga")';
            }
            else
            {
                $this->db->where('beam_tr_checksheet.usr_id', $this->session->userdata('id'));
                $where = '(beam_tr_checksheet.tch_approval="draft" or beam_tr_checksheet.tch_approval = "rejectedbyga")';
            }
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            $this->db->order_by('beam_tr_checksheet.tch_approval asc');
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

        function tampil_approveuser($rolid, $deptid)
		{
            $sedekah = array();

            $bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $rolid);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
            }
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_statuscek, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approvebyuser" THEN "Approve By PIC User"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approved")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            if($bool1 && $bool2 && $bool3)
            {
            } 
            else if($bool3)
            {
                $this->db->where('beam_dtl_equipment.dept_id', $deptid);
            }
                        
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

        function tampilcsoverdue($id, $deptid)
		{
            $bool1 = false;
            $bool2 = false;
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                }
            }

			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_tr_checksheet.tch_approval !=', 'approved');
            $this->db->where('beam_tr_checksheet.tch_approval !=', 'rejected');
            
            if($bool1 && $bool2)
            {
            }
            else if($bool1)
            {
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'approvebyga');
                $this->db->where('beam_tr_checksheet.usr_id', $this->session->userdata('id'));
            }
            else if($bool2)
            {
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'rejectedbyga');
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'draft');
            }

            $this->db->where('beam_tr_checksheet.tch_tanggal <=', date('Y-m-d'));
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function tampil_approvega()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_statuscek, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approvebyga" or beam_tr_checksheet.tch_approval = "rejectedbyuser")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function daftar_approvega()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approvebyga")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        // function that finds the phone by its ID to display in th Bootstrap modal
        function listchecksheetnokbyfunc($plant,$kondisi)
        {
            $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
            INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
            INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok='".$kondisi."' and d.pla_id = ".$plant."
            group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
            order by t.tch_tanggal desc
            ");

            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        // function that finds the phone by its ID to display in th Bootstrap modal
        function listchecksheetnokbyfuncall($kondisi)
        {
            $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
            INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
            INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and t.tch_oknok='".$kondisi."'
            group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
            order by t.tch_tanggal desc
            ");

            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function listchecksheet($plant,$kondisi)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approved")';
            $this->db->where($where);
            if($kondisi=="ontime")
            {
                $where = '(beam_tr_checksheet.tch_statuscek="ontime")';
                $this->db->where($where);
            }
            else if($kondisi=="overdue")
            {
                $where = '(beam_tr_checksheet.tch_statuscek like "%overdue%")';
                $this->db->where($where);
            }
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plant);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            $this->db->order_by('beam_tr_checksheet.tch_tanggal', 'desc');
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

        function listchecksheetall($kondisi)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approved")';
            $this->db->where($where);
            if($kondisi=="ontime")
            {
                $where = '(beam_tr_checksheet.tch_statuscek="ontime")';
                $this->db->where($where);
            }
            else if($kondisi=="overdue")
            {
                $where = '(beam_tr_checksheet.tch_statuscek like "%overdue%")';
                $this->db->where($where);
            }
            if($kondisi=="nok")
            {
                $where = '(beam_tr_checksheet.tch_oknok="nok")';
                $this->db->where($where);
            }
            else if($kondisi=="okbyfunc")
            {
                $where = '(beam_tr_checksheet.tch_oknok="okbyfunc")';
                $this->db->where($where);
            }
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            $this->db->order_by('beam_tr_checksheet.tch_tanggal', 'desc');
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

        function tampil_approved()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function tampil_rejected()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_approval','rejected');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        // function that finds the phone by its ID to display in th Bootstrap modal
        function getViewData($tchData)
        {
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_keterangan, beam_tr_checksheet.tch_fotoketerangan, beam_tr_checksheet.tch_statusketerangan, beam_tr_checksheet.tch_feedback, beam_tr_checksheet.tch_fotofeedback, beam_tr_checksheet.tch_statusfeedback, beam_tr_checksheet.tch_catatan, beam_tr_checksheet.tch_fotocatatan, beam_tr_checksheet.tch_statuscatatan, beam_tr_checksheet.tch_feedback, beam_tr_checksheet.tch_statusfeedback, beam_ms_user.usr_nama, beam_tr_checksheet.tch_alasan,  beam_tr_checksheet.tch_oknok,  beam_tr_checksheet.tch_statuscek, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, beam_tr_checksheet.tch_approval');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_id',$tchData);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_user', 'beam_ms_user.usr_id = beam_tr_checksheet.usr_id');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            $this->db->order_by('beam_tr_checksheet.tch_approval asc');
            $res2=$this->db->get();
            return $res2;
        }

        // function that finds the phone by its ID to display in th Bootstrap modal
        function getCatatan($tchData)
        {
            $this->db->select('beam_tr_checksheet.tch_catatan,beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_tr_checksheet.tch_id',$tchData);
            $res2=$this->db->get();
            return $res2;
        }

        // function that finds the phone by its ID to display in th Bootstrap modal
        function getFeedback($tchData)
        {
            $this->db->select('beam_tr_checksheet.tch_feedback,beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_tr_checksheet.tch_id',$tchData);
            $res2=$this->db->get();
            return $res2;
        }
        
        //fungsi untuk melakukan penambahan data pada database
        function catat($id)
        {
            $file_tmp = null;
            $catatan_text = $this->input->post('txtCatatan');
            
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");

            if($_FILES['file']['name']!=null)
            {
                // echo "<script>
                //     alert('cek');
                //     </script>";
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

            if(in_array($eksten, $ekstensi)==true)
            {
                if($size<=2000000)
                {
                    if($file_tmp!=null) move_uploaded_file($file_tmp,DOCROOT.'/gambar/'.$nama);
                    $data = array('tch_fotocatatan'=>$nama, 'tch_catatan'=> $catatan_text, 'tch_statuscatatan'=> '1', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $id);
                    $this->db->update('beam_tr_checksheet', $data);
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

        //fungsi untuk melakukan penambahan data pada database
        function feed($id)
        {
            $file_tmp = null;
            $feedback_text = $this->input->post('txtFeedback');
            
            $modifby = $this->session->userdata('id');
            $modifdate = date("Y-m-d H:i:s");
            if($_FILES['file']['name']!=null)
            {
                // echo "<script>
                //     alert('cek');
                //     </script>";
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

            if(in_array($eksten, $ekstensi)==true)
            {
                if($size<=2000000)
                {
                    if($file_tmp!=null) move_uploaded_file($file_tmp,DOCROOT.'/gambar/'.$nama);
                    $data = array('tch_fotofeedback'=>$nama,'tch_feedback'=> $feedback_text, 'tch_statusfeedback'=> '1', 'tch_modifby'=>$modifby, 'tch_modifdate'=>$modifdate);
                    $this->db->where('tch_id', $id);
                    $this->db->update('beam_tr_checksheet', $data);
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

        function dataCatatan($deptid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_ms_departemen.dept_nama,beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statuscatatan', '1');
            $this->db->where('beam_dtl_equipment.dept_id', $deptid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function dataCatatan2()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statuscatatan', '1');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function dataFeedback()
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_tr_checksheet.tch_feedback, beam_tr_checksheet.tch_statusfeedback, beam_ms_equipment.equ_nama, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statusfeedback', '1');
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function returnbooladmin($rolid)
        {
            $bool1 = false;
            $bool2 = false;
            $bool3 = false;
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $rolid);
            $this->db->where($array);
            $arrayin = array('keloladata','transaksi', 'laporan');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'keloladata')
                    {
                        if($data->men_special == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'transaksi')
                    {
                        if($data->men_special == 1)
                        {
                            $bool2 = true;
                        }
                    }
                    else if($data->men_nama == 'laporan')
                    {
                        if($data->men_special == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
            }
            if($bool1 && $bool2 && $bool3)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function plagetjumlah($plaid)
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as jumlah');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_dtl_equipment.deq_id = beam_tr_checksheet.deq_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function plagetontime($plaid)
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as ontime');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_dtl_equipment.deq_id = beam_tr_checksheet.deq_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->where('beam_tr_checksheet.tch_statuscek','ontime');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function plagetoverdue($plaid)
		{
			$sedekah = array();
            $this->db->select('count(beam_tr_checksheet.deq_id) as overdue');
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_dtl_equipment', 'beam_dtl_equipment.deq_id = beam_tr_checksheet.deq_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->where('beam_tr_checksheet.tch_statuscek !=','ontime');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $salur=$this->db->get()->row();
            return $salur;  
        }

        function platampil_overdue($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->join('beam_ms_area','beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->where('beam_dtl_equipment.deq_tglcek <=', date("Y-m-d"));
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

        function pladetailgrafikbeam($plaid)
		{
			$sedekah = array();
            $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, e.equ_nama, t.tch_statuscek, t.deq_id, t.tch_tanggal, count(i.tdi_kondisi) as total_item, sum(case i.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case i.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case i.tdi_kondisi when '3' then 1 else null end) as broken_item FROM beam_tr_checksheet t 
            INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
            INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved' and d.pla_id = ".$plaid."
            group by t.tch_id, d.deq_lokasi, a.are_nama, e.equ_nama, t.tch_statuscek, t.deq_id, t.tch_tanggal
			");
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function platampilcsoverdue($id, $deptid, $plaid)
		{
            $bool1 = false;
            $bool2 = false;
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $id);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                }
            }

			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id', $plaid);
            $this->db->where('beam_tr_checksheet.tch_approval !=', 'approved');
            $this->db->where('beam_tr_checksheet.tch_approval !=', 'rejected');
            
            if($bool1 && $bool2)
            {
            }
            else if($bool1)
            {
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'approvebyga');
                $this->db->where('beam_tr_checksheet.usr_id', $this->session->userdata('id'));
            }
            else if($bool2)
            {
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'rejectedbyga');
                $this->db->where('beam_tr_checksheet.tch_approval !=', 'draft');
            }

            $this->db->where('beam_tr_checksheet.tch_tanggal <=', date('Y-m-d'));
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function platabeldetailoknok($plaid)
		{
            $sedekah = array();
            
            $bool1 = false;
            $bool2 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('laporan');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'laporan')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                        if($data->men_update == 1)
                        {
                            $bool2 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2)
            {
				$honey = false;
            }
            else if($bool2)
            {
                $honey = true;
            }
			else
			{
				$honey = false;
			}
            if($honey){
                $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
                INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
                INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
                INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
                INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
                INNER JOIN 
                (
                    select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
                ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
                WHERE t.tch_approval='approved' and d.dept_id = ".$this->session->userdata('dept')." and d.pla_id = ".$plaid."
                group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
                order by kondisi
                ");
            }else{
                $query = $this->db->query("select t.tch_id, d.deq_lokasi, a.are_nama, d.deq_kode, e.equ_nama, t.tch_tanggal, case t.tch_oknok when 'ok' then 'OK' when 'okbyfunc' then 'OK by Function' when 'nok' then 'Not OK' else null end as kondisi FROM beam_tr_checksheet t 
                INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
                INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
                INNER JOIN beam_ms_equipment e ON e.equ_id=d.equ_id 
                INNER JOIN beam_ms_area a ON a.are_id=d.are_id 
                INNER JOIN 
                (
                    select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
                ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
                WHERE t.tch_approval='approved' and d.pla_id = ".$plaid."
                group by t.tch_id, d.deq_lokasi, e.equ_nama, d.deq_kode, kondisi, t.tch_tanggal
                order by kondisi
                ");
            }
            
            
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function pladataCatatan($deptid, $plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_ms_departemen.dept_nama,beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statuscatatan', '1');
            $this->db->where('beam_dtl_equipment.dept_id', $deptid);
            $this->db->where('beam_dtl_equipment.pla_id', $plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function pladataCatatan2($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statuscatatan', '1');
            $this->db->where('beam_dtl_equipment.pla_id', $plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function pladataFeedback($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_approval, beam_tr_checksheet.tch_feedback, beam_tr_checksheet.tch_statusfeedback, beam_ms_equipment.equ_nama, beam_ms_departemen.dept_nama, beam_dtl_equipment.deq_lokasi, beam_ms_area.are_nama, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS approves', FALSE);
            $this->db->from('beam_tr_checksheet');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->join('beam_ms_departemen', 'beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
            $this->db->where('beam_tr_checksheet.tch_statusfeedback', '1');
            $this->db->where('beam_dtl_equipment.pla_id', $plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function tampil_grafik_harian()
		{
			$hasil = null;
			$bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2 && $bool3)
            {
				$honey = false;
            }
            else if($bool3) //jika yang login adalah user
            {
                $honey = true;
			}
			else
			{
				$honey = false;
			}

			if($honey){
				$query = $this->db->query("(select 'OK' as kondisi, count(t.tch_oknok) as total, '#0CE8B2' as color  FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'ok' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')."
				group by kondisi)
				UNION
				(select 'OK by Function' as kondisi, count(t.tch_oknok) as total , '#FFF60D' as color FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'okbyfunc' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')."
				group by kondisi)
				UNION
				(select 'NOK' as kondisi, count(t.tch_oknok) as total , '#FF3859' as color FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'nok' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')."
				group by kondisi)			
				");
			}else{
				$query = $this->db->query("(select 'OK' as kondisi, count(t.tch_oknok) as total, '#0CE8B2' as color  FROM beam_tr_checksheet t
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'ok' and t.tch_approval='approved'
				group by kondisi)
				UNION
				(select 'OK by Function' as kondisi, count(t.tch_oknok) as total, '#FFF60D' as color  FROM beam_tr_checksheet t
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'okbyfunc' and t.tch_approval='approved'
				group by kondisi)
				UNION
				(select 'NOK' as kondisi, count(t.tch_oknok) as total, '#FF3859' as color  FROM beam_tr_checksheet t
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'nok' and t.tch_approval='approved'
				group by kondisi)			
				");
			}
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
        }
        
        function tampil_grafik_item_new()
		{
			$query = $this->db->query("(select 'OK' as kondisi, count(i.tdi_kondisi) as total, '#0CE8B2' as color FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 1 and t.tch_approval='approved'
			group by kondisi)
			UNION
			(select 'Repaired' as kondisi, count(i.tdi_kondisi) as total, '#FFF60D' as color  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 2 and t.tch_approval='approved'
			group by kondisi)
			UNION
			(select 'Broken' as kondisi, count(i.tdi_kondisi) as total, '#FF3859' as color  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 3 and t.tch_approval='approved'
			group by kondisi)
			");
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
        }
        
        function tampil_grafik_detok()
		{
			$bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2 && $bool3)
            {
				$honey = false;
            }
            else if($bool3) //jika yang login adalah user
            {
                $honey = true;
			}
			else
			{
				$honey = false;
			}
			if($honey){
				$query = $this->db->query("select e.equ_nama as equip, sum(case t.tch_oknok when 'ok' then 1 else null end) as totalok, sum(case t.tch_oknok when 'okbyfunc' then 1 else null end) as totalokbyfunc, sum(case t.tch_oknok when 'nok' then 1 else null end) as totalnok from beam_tr_checksheet t
				inner join beam_dtl_equipment d on d.deq_id = t.deq_id
				inner join beam_ms_equipment e on e.equ_id = d.equ_id
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				where t.tch_approval='approved' and d.dept_id = ".$this->session->userdata('dept')."
				group by equip");
			}
			else{
				$query = $this->db->query("select e.equ_nama as equip, sum(case t.tch_oknok when 'ok' then 1 else null end) as totalok, sum(case t.tch_oknok when 'okbyfunc' then 1 else null end) as totalokbyfunc, sum(case t.tch_oknok when 'nok' then 1 else null end) as totalnok from beam_tr_checksheet t
				inner join beam_dtl_equipment d on d.deq_id = t.deq_id
				inner join beam_ms_equipment e on e.equ_id = d.equ_id
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				where t.tch_approval='approved'
				group by equip");
			}
			return $query->result();
        }
        
        function platampil_grafik_harian($plaid)
		{
			$hasil = null;
			$bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2 && $bool3)
            {
				$honey = false;
            }
            else if($bool3) //jika yang login adalah user
            {
                $honey = true;
			}
			else
			{
				$honey = false;
			}

			if($honey){
				$query = $this->db->query("(select 'OK' as kondisi, count(t.tch_oknok) as total, '#0CE8B2' as color  FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'ok' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')." and deq.pla_id = ".$plaid."
				group by kondisi)
				UNION
				(select 'OK by Function' as kondisi, count(t.tch_oknok) as total , '#FFF60D' as color FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'okbyfunc' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')." and deq.pla_id = ".$plaid."
				group by kondisi)
				UNION
				(select 'NOK' as kondisi, count(t.tch_oknok) as total , '#FF3859' as color FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'nok' and t.tch_approval='approved' and deq.dept_id = ".$this->session->userdata('dept')." and deq.pla_id = ".$plaid."
				group by kondisi)			
				");
			}else{
				$query = $this->db->query("(select 'OK' as kondisi, count(t.tch_oknok) as total, '#0CE8B2' as color  FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'ok' and t.tch_approval='approved' and deq.pla_id = ".$plaid."
				group by kondisi)
				UNION
				(select 'OK by Function' as kondisi, count(t.tch_oknok) as total, '#FFF60D' as color  FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'okbyfunc' and t.tch_approval='approved' and deq.pla_id = ".$plaid."
				group by kondisi)
				UNION
				(select 'NOK' as kondisi, count(t.tch_oknok) as total, '#FF3859' as color  FROM beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment deq ON deq.deq_id=t.deq_id 
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				WHERE t.tch_oknok = 'nok' and t.tch_approval='approved' and deq.pla_id = ".$plaid."
				group by kondisi)			
				");
			}
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
        }
        
        function platampil_grafik_item_new($plaid)
		{
            $query = $this->db->query("(select 'OK' as kondisi, count(i.tdi_kondisi) as total, '#0CE8B2' as color FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
            inner join beam_dtl_equipment d on d.deq_id = t.deq_id
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 1 and t.tch_approval='approved' and d.pla_id = ".$plaid."
			group by kondisi)
			UNION
            (select 'Repaired' as kondisi, count(i.tdi_kondisi) as total, '#FFF60D' as color  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
            inner join beam_dtl_equipment d on d.deq_id = t.deq_id
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 2 and t.tch_approval='approved' and d.pla_id = ".$plaid."
			group by kondisi)
			UNION
            (select 'Broken' as kondisi, count(i.tdi_kondisi) as total, '#FF3859' as color  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id 
            inner join beam_dtl_equipment d on d.deq_id = t.deq_id
			INNER JOIN 
			(
				select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
			) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
			WHERE i.tdi_kondisi = 3 and t.tch_approval='approved' and d.pla_id = ".$plaid."
			group by kondisi)
			");
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
        }
        
        function platampil_grafik_detok($plaid)
		{
			$bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $this->session->userdata('role'));
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
			}

			$honey = false;
			if($bool1 && $bool2 && $bool3)
            {
				$honey = false;
            }
            else if($bool3) //jika yang login adalah user
            {
                $honey = true;
			}
			else
			{
				$honey = false;
			}
			if($honey){
				$query = $this->db->query("select e.equ_nama as equip, sum(case t.tch_oknok when 'ok' then 1 else null end) as totalok, sum(case t.tch_oknok when 'okbyfunc' then 1 else null end) as totalokbyfunc, sum(case t.tch_oknok when 'nok' then 1 else null end) as totalnok from beam_tr_checksheet t
				inner join beam_dtl_equipment d on d.deq_id = t.deq_id
				inner join beam_ms_equipment e on e.equ_id = d.equ_id
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				where t.tch_approval='approved' and d.dept_id = ".$this->session->userdata('dept')." and d.pla_id = ".$plaid."
				group by equip");
			}
			else{
				$query = $this->db->query("select e.equ_nama as equip, sum(case t.tch_oknok when 'ok' then 1 else null end) as totalok, sum(case t.tch_oknok when 'okbyfunc' then 1 else null end) as totalokbyfunc, sum(case t.tch_oknok when 'nok' then 1 else null end) as totalnok from beam_tr_checksheet t
				inner join beam_dtl_equipment d on d.deq_id = t.deq_id
				inner join beam_ms_equipment e on e.equ_id = d.equ_id
				INNER JOIN 
				(
					select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
				) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id
				where t.tch_approval='approved' and d.pla_id = ".$plaid."
				group by equip");
			}
			return $query->result();
        }
        
        function platampil($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_dtl_equipment.deq_id, beam_ms_equipment.equ_id, beam_dtl_equipment.deq_status, beam_ms_area.are_nama, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, beam_ms_departemen.dept_nama');
            $this->db->from('beam_dtl_equipment');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_dtl_equipment.dept_id');
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

        function platampil_draft($rolid,$plaid)
		{
            $sedekah = array();
            
            $bool1 = false;
            $bool2 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $rolid);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                }
            }

            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_tr_checksheet.tch_statuscek, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            if($bool1 && $bool2)
            {
                $where = '(beam_tr_checksheet.tch_approval="draft" or beam_tr_checksheet.tch_approval = "rejectedbyga")';
            }
            else
            {
                $this->db->where('beam_tr_checksheet.usr_id', $this->session->userdata('id'));
                $where = '(beam_tr_checksheet.tch_approval="draft" or beam_tr_checksheet.tch_approval = "rejectedbyga")';
            }
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            $this->db->order_by('beam_tr_checksheet.tch_approval asc');
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

        function pladaftar_approvega($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approvebyga")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function platampil_approved($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_approval','approved');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function platampil_rejected($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item');
            $this->db->from('beam_tr_checksheet');
            $this->db->where('beam_tr_checksheet.tch_approval','rejected');
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function platampil_approvega($plaid)
		{
			$sedekah = array();
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_statuscek, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approvebyga" or beam_tr_checksheet.tch_approval = "rejectedbyuser")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
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

        function platampil_approveuser($rolid, $deptid, $plaid)
		{
            $sedekah = array();

            $bool1 = false;
            $bool2 = false;
            $bool3 = false;
            
            $this->db->select('beam_ms_menu.men_id, beam_ms_menu.men_nama, beam_ms_menu.men_access, beam_ms_menu.men_insert, beam_ms_menu.men_update, beam_ms_menu.men_delete, beam_ms_menu.men_special');
            $this->db->from('beam_ms_menu');
            $array = array('beam_ms_menu.rol_id' => $rolid);
            $this->db->where($array);
            $arrayin = array('sentdraft','sentapprovega','sentapproveuser');
            $this->db->where_in('beam_ms_menu.men_nama', $arrayin);
            $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($salur->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($salur->result() as $data)
				{
                    if($data->men_nama == 'sentdraft')
                    {
                        if($data->men_access == 1)
                        {
                            $bool1 = true;
                        }
                    }
                    else if($data->men_nama == 'sentapprovega')
                    {
                        if($data->men_access == 1)
                        {
                            $bool2 = true; 
                        }
                    }
                    else if($data->men_nama == 'sentapproveuser')
                    {
                        if($data->men_access == 1)
                        {
                            $bool3 = true;
                        }
                    }
                }
            }
            $this->db->select('beam_tr_checksheet.tch_id, beam_ms_area.are_nama, beam_tr_checksheet.tch_statuscek, beam_tr_checksheet.tch_tanggal, beam_ms_equipment.equ_nama, beam_dtl_equipment.deq_lokasi, beam_dtl_equipment.deq_kode, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'1\' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'2\' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when \'3\' then 1 else null end) as broken_item, CASE beam_tr_checksheet.tch_approval
            WHEN "draft" THEN "Draft"
            WHEN "approvebyga" THEN "Approve By PIC GA"
            WHEN "approvebyuser" THEN "Approve By PIC User"
            WHEN "approved" THEN "Approved"
            WHEN "rejectedbyga" THEN "Rejected By PIC GA"
            WHEN "rejectedbyuser" THEN "Rejected By PIC User"
            WHEN "rejected" THEN "Rejected"
            END AS tch_approval', FALSE);
            $this->db->from('beam_tr_checksheet');
            $where = '(beam_tr_checksheet.tch_approval="approved")';
            $this->db->where($where);
            $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            $this->db->join('beam_ms_equipment', 'beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id');
            $this->db->join('beam_ms_area', 'beam_ms_area.are_id = beam_dtl_equipment.are_id');
            $this->db->where('beam_dtl_equipment.pla_id',$plaid);
            $this->db->group_by('beam_tr_checksheet.tch_id', 'beam_tr_checksheet.tch_tanggal', 'beam_ms_equipment.equ_nama', 'beam_dtl_equipment.deq_lokasi', 'beam_dtl_equipment.deq_kode');
            if($bool1 && $bool2 && $bool3)
            {
            } 
            else if($bool3)
            {
                $this->db->where('beam_dtl_equipment.dept_id', $deptid);
            }
                        
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

        //cekdulu
        function gettableallok()
		{
            $sedekah = array();
            $query = $this->db->query("select p.pla_nama, p.pla_kodearea, sum(case t.tch_oknok when 'ok' then 1 else null end) as ok, sum(case t.tch_oknok when 'okbyfunc' then 1 else null end) as okbyfunc, sum(case t.tch_oknok when 'nok' then 1 else null end) as nok from beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_plant p ON p.pla_id=d.pla_id 
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved'
            group by p.pla_nama, p.pla_kodearea
			");
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        //cekdulu
        function gettableallbeams()
		{
            $sedekah = array();
            $query = $this->db->query("select p.pla_nama, p.pla_kodearea, count(i.tdi_kondisi) as total_item, sum(case i.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case i.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case i.tdi_kondisi when '3' then 1 else null end) as broken_item from beam_tr_checksheet t 
            INNER JOIN beam_dtl_equipment d ON d.deq_id=t.deq_id 
            INNER JOIN beam_ms_plant p ON p.pla_id=d.pla_id 
            INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id
            INNER JOIN 
            (
                select max(tch.tch_id) as maxid, tch.deq_id, max(tch.tch_tanggal) as maxdate from beam_tr_checksheet tch where tch.tch_approval = 'approved' group by tch.deq_id
            ) tm ON t.tch_tanggal=tm.maxdate and tm.maxid = t.tch_id        
            WHERE t.tch_approval='approved'
            group by p.pla_nama, p.pla_kodearea
			");
            // $salur=$this->db->get();
            //memeriksa jumlah row yang ditemukan pada tabel komentar tidak 0
            if($query->num_rows()>0)
            {
                //perulangan untuk setiap data yang ditemukan
                //akan diletakkan pada variabel $data
            	foreach($query->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
        }

        function tampil_tahun_admin()
		{
			$query = $this->db->query('select distinct year(t.tch_tanggal) as tahun from beam_tr_checksheet t where t.tch_approval = "approved"');
			return $query->result();
		}

        function tampil_grafik_bulan_admin($tahun)
		{
			$this->db->select('month(t.tch_tanggal) as bulan, count(t.tch_id) as total');
			$this->db->from('beam_tr_checksheet t');
			$this->db->where('t.tch_approval = "approved"');
			$this->db->where("year(t.tch_tanggal) = '$tahun'");
			$this->db->group_by('month(t.tch_tanggal)');
			$query = $this->db->get();
			return $query->result();
        }
        
        
    }
?>