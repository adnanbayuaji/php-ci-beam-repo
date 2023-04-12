
<?php
	//membuat class baru inherit CI_Model
	class Grafikmodel extends CI_Model
	{
        function tampil_grafik_harian($plaid)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('a.pla_id', $plaid);
				$this->db->group_by('t.tch_tanggal');
			}
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_feedback($plaid)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->group_by('t.tch_tanggal');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->group_by('t.tch_tanggal');
			}
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_feedback2($plaid, $akhir)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal <=', $akhir);
				$this->db->group_by('t.tch_tanggal');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal <=', $akhir);
				$this->db->group_by('t.tch_tanggal');
			}
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}
		function tampil_feedback3($plaid,$awal)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal >=', $awal);
				$this->db->group_by('t.tch_tanggal');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal >=', $awal);
				$this->db->group_by('t.tch_tanggal');
			}
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}
		function tampil_feedback4($plaid,$awal,$akhir)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal between \''.$awal.'\' and \''.$akhir.'\'');
				$this->db->group_by('t.tch_tanggal');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_statusfeedback = \'1\'');
				$this->db->where('t.tch_tanggal between \''.$awal.'\' and \''.$akhir.'\'');
				$this->db->group_by('t.tch_tanggal');
			}
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_oknokbyfunc($plaid)
		{
			$hasil = null;
			if($plaid==null)
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved'
				group by t.tch_tanggal
				");
			}
			else
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$plaid."
				group by t.tch_tanggal
				");
			}
			foreach($salur->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_oknokbyfunc2($plaid, $tahun)
		{
			$hasil = null;
			if($plaid==null)
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved' and t.tch_tanggal <= '".$tahun."'
				group by t.tch_tanggal
				");
			}
			else
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$tahun." and t.tch_tanggal <= '".$tahun."'
				group by t.tch_tanggal
				");
			}
			foreach($salur->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_oknokbyfunc3($plaid, $awal)
		{
			$hasil = null;
			if($plaid==null)
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved' and t.tch_tanggal >= '".$awal."'
				group by t.tch_tanggal
				");
			}
			else
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$plaid." and t.tch_tanggal >= '".$awal."'
				group by t.tch_tanggal
				");
			}
			foreach($salur->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}
		function tampil_oknokbyfunc4($plaid, $awal, $akhir)
		{
			$hasil = null;
			if($plaid==null)
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved' and t.tch_tanggal between '".$awal."' and '".$akhir."'
				group by t.tch_tanggal
				");
			}
			else
			{
				$salur = $this->db->query("select t.tch_tanggal as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$plaid." and t.tch_tanggal between '".$awal."' and '".$akhir."'
				group by t.tch_tanggal
				");
			}
			foreach($salur->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_grafik_harian2($plaid,$akhir)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal <=', $akhir);
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal <=', $akhir);
			}
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}
		
		function tampil_grafik_harian3($plaid,$awal)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal >=', $awal);
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal >=', $awal);
			}
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}
		function tampil_grafik_harian4($plaid,$awal, $akhir)
		{
			$hasil = null;
			if($plaid==null)
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal between \''.$awal.'\' and \''.$akhir.'\'');
			}
			else
			{
				$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
				$this->db->from('beam_tr_checksheet t');
				$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
				$this->db->where('a.pla_id', $plaid);
				$this->db->where('t.tch_approval = \'approved\'');
				$this->db->group_by('t.tch_tanggal');
				$this->db->where('t.tch_tanggal between \''.$awal.'\' and \''.$akhir.'\'');
			}
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}

		// function tampil_grafik_item()
		// {
		// 	$query = $this->db->query("SELECT 'OK' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id WHERE i.tdi_kondisi = 1 and t.tch_approval='approved' UNION SELECT 'Repaired' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id WHERE i.tdi_kondisi = 2 and t.tch_approval='approved' UNION SELECT 'Broken' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id WHERE i.tdi_kondisi = 3 and t.tch_approval='approved' ");
		// 	return $query->result();
		// }

		function tampil_grafik_item($plaid)
		{
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$query_awal = "";
			$query_akhir = "";
			$query_pla ="";
			$time = strtotime($this->input->post('awal'));
			$awal1 = date('Y-m-d',$time);
			$time = strtotime($this->input->post('akhir'));
			$akhir1 = date('Y-m-d',$time);
			if($awal != null)
			{
				$query_awal = " and t.tch_tanggal >= '".$awal1."'";
			}
			if($akhir != null)
			{
				$query_akhir = " and t.tch_tanggal <= '".$akhir1."'";
			}
			if($plaid != null)
			{
				$query_pla = " and d.pla_id = '".$plaid."'";
			}
			$query = $this->db->query("SELECT 'OK' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id INNER JOIN beam_dtl_equipment d ON d.deq_id = t.deq_id WHERE i.tdi_kondisi = 1 and t.tch_approval='approved'".$query_awal.$query_akhir.$query_pla." UNION SELECT 'Repaired' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id INNER JOIN beam_dtl_equipment d ON d.deq_id = t.deq_id WHERE i.tdi_kondisi = 2 and t.tch_approval='approved'".$query_awal.$query_akhir.$query_pla." UNION SELECT 'Broken' as kondisi, count(i.tdi_kondisi) as total  FROM beam_tr_checksheet t INNER JOIN beam_tr_dtl_itemcheck i ON i.tch_id=t.tch_id INNER JOIN beam_dtl_equipment d ON d.deq_id = t.deq_id WHERE i.tdi_kondisi = 3 and t.tch_approval='approved'".$query_awal.$query_akhir.$query_pla);
			// return $query->result();
			// $query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}
		
		function tabel_harian()
		{
			$this->db->select('b.equ_nama, count(t.tch_id) as jumlahcek');
			$this->db->from('beam_tr_checksheet t');
            $this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
            $this->db->join('beam_ms_equipment b', 'b.equ_id = a.equ_id');
			$this->db->where('t.tch_approval = \'approved\'');
			$this->db->group_by('b.equ_nama');
			//$this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			return $query->result();
		}

		function tabel_equip()
		{
			$salur = $this->db->query("select equ_nama as equ_nama, replace(replace(equ_nama, ',', ''), ' ', '') as equ_replace from beam_ms_equipment");
			return $salur->result();
		}

		function tabel_harian1($plaid)
		{
			$data = array('plaid' => $plaid);
			$query = $this->db->query("call get_pivot(?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_ok1($plaid)
		{
			$data = array('plaid' => $plaid);
			$query = $this->db->query("call get_pivot_ok(?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_nok1($plaid)
		{
			$data = array('plaid' => $plaid);
			$query = $this->db->query("call get_pivot_nok(?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_okbyfunc1($plaid)
		{
			$data = array('plaid' => $plaid);
			$query = $this->db->query("call get_pivot_okbyfunc(?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_feedback1($plaid)
		{
			$data = array('plaid' => $plaid);
			$query = $this->db->query("call get_pivot_feedback(?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian2($plaid,$awal)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal);
			$query = $this->db->query("call get_pivot_awal(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_ok2($plaid,$awal)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal);
			$query = $this->db->query("call get_pivot_ok_awal(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_nok2($plaid,$awal)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal);
			$query = $this->db->query("call get_pivot_nok_awal(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_okbyfunc2($plaid,$awal)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal);
			$query = $this->db->query("call get_pivot_okbyfunc_awal(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_feedback2($plaid,$awal)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal);
			$query = $this->db->query("call get_pivot_feedback_awal(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian3($plaid,$akhir)
		{
			$data = array('plaid' => $plaid,'akhir' => $akhir);
			$query = $this->db->query("call get_pivot_akhir(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_ok3($plaid,$akhir)
		{
			$data = array('plaid' => $plaid,'akhir' => $akhir);
			$query = $this->db->query("call get_pivot_ok_akhir(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_nok3($plaid,$akhir)
		{
			$data = array('plaid' => $plaid,'akhir' => $akhir);
			$query = $this->db->query("call get_pivot_nok_akhir(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_okbyfunc3($plaid,$akhir)
		{
			$data = array('plaid' => $plaid,'akhir' => $akhir);
			$query = $this->db->query("call get_pivot_okbyfunc_akhir(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_feedback3($plaid,$akhir)
		{
			$data = array('plaid' => $plaid,'akhir' => $akhir);
			$query = $this->db->query("call get_pivot_feedback_akhir(?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		
		function tabel_harian4($plaid,$awal, $akhir)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal, 'akhir'=> $akhir);
			$query = $this->db->query("call get_pivot_awalakhir(?, ?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_ok4($plaid,$awal, $akhir)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal, 'akhir'=> $akhir);
			$query = $this->db->query("call get_pivot_ok_awalakhir(?, ?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_nok4($plaid,$awal, $akhir)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal, 'akhir'=> $akhir);
			$query = $this->db->query("call get_pivot_nok_awalakhir(?, ?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_okbyfunc4($plaid,$awal, $akhir)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal, 'akhir'=> $akhir);
			$query = $this->db->query("call get_pivot_okbyfunc_awalakhir(?, ?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_feedback4($plaid,$awal, $akhir)
		{
			$data = array('plaid' => $plaid, 'awal' => $awal, 'akhir'=> $akhir);
			$query = $this->db->query("call get_pivot_feedback_awalakhir(?, ?, ?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_item($plaid)
		{
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$query_awal = "";
			$query_akhir = "";
			$time = strtotime($this->input->post('awal'));
			$awal1 = date('Y-m-d',$time);
			$time = strtotime($this->input->post('akhir'));
			$akhir1 = date('Y-m-d',$time);
			if($awal != null)
			{
				$query_awal = " and beam_tr_checksheet.tch_tanggal >= '".$awal1."'";
			}
			if($akhir != null)
			{
				$query_akhir = " and beam_tr_checksheet.tch_tanggal <= '".$akhir1."'";
			}
			$sedekah = array();
            // $this->db->select("beam_tr_checksheet.tch_id, CONCAT(beam_ms_equipment.equ_nama, ' ', beam_dtl_equipment.deq_lokasi) as namaalat, beam_tr_checksheet.tch_tanggal, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '3' then 1 else null end) as broken_item");
            // $this->db->from('beam_tr_checksheet');
            // $this->db->join('beam_tr_dtl_itemcheck', 'beam_tr_checksheet.tch_id = beam_tr_dtl_itemcheck.tch_id');
            // $this->db->join('beam_dtl_equipment', 'beam_tr_checksheet.deq_id = beam_dtl_equipment.deq_id');
            // $this->db->join('beam_ms_equipment', 'beam_dtl_equipment.equ_id = beam_ms_equipment.equ_id');
            // $this->db->group_by('beam_tr_checksheet.tch_id', 'namaalat', 'beam_tr_checksheet.tch_tanggal');
			// $this->db->order_by("beam_tr_checksheet.tch_tanggal", "asc");
			// $this->db->order_by("broken_item", "desc");
            // $salur=$this->db->get();
			if($plaid==null)
			{
				$salur = $this->db->query("select beam_tr_checksheet.tch_id, CONCAT(beam_ms_equipment.equ_nama, ' ', beam_ms_area.are_nama, ' ',beam_dtl_equipment.deq_lokasi) as namaalat, beam_tr_checksheet.tch_tanggal, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '3' then 1 else null end) as broken_item from beam_tr_checksheet 
				INNER JOIN beam_tr_dtl_itemcheck on beam_tr_dtl_itemcheck.tch_id = beam_tr_checksheet.tch_id
				INNER JOIN beam_dtl_equipment on beam_dtl_equipment.deq_id = beam_tr_checksheet.deq_id
				INNER JOIN beam_ms_equipment on beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id
				INNER JOIN beam_ms_area on beam_ms_area.are_id = beam_dtl_equipment.are_id
				where beam_tr_checksheet.tch_approval='approved'
				".$query_awal.$query_akhir."
				group by beam_tr_checksheet.tch_id, namaalat, beam_tr_checksheet.tch_tanggal
				order by beam_tr_checksheet.tch_tanggal asc, broken_item desc
				");
			}
			else
			{
				$salur = $this->db->query("select beam_tr_checksheet.tch_id, CONCAT(beam_ms_equipment.equ_nama, ' ', beam_ms_area.are_nama, ' ',beam_dtl_equipment.deq_lokasi) as namaalat, beam_tr_checksheet.tch_tanggal, count(beam_tr_dtl_itemcheck.tdi_kondisi) as total_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '1' then 1 else null end) as ok_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '2' then 1 else null end) as repair_item, sum(case beam_tr_dtl_itemcheck.tdi_kondisi when '3' then 1 else null end) as broken_item from beam_tr_checksheet 
				INNER JOIN beam_tr_dtl_itemcheck on beam_tr_dtl_itemcheck.tch_id = beam_tr_checksheet.tch_id
				INNER JOIN beam_dtl_equipment on beam_dtl_equipment.deq_id = beam_tr_checksheet.deq_id
				INNER JOIN beam_ms_equipment on beam_ms_equipment.equ_id = beam_dtl_equipment.equ_id
				INNER JOIN beam_ms_area on beam_ms_area.are_id = beam_dtl_equipment.are_id
				where beam_tr_checksheet.tch_approval='approved' and beam_dtl_equipment.pla_id = ".$plaid."
				".$query_awal.$query_akhir."
				group by beam_tr_checksheet.tch_id, namaalat, beam_tr_checksheet.tch_tanggal
				order by beam_tr_checksheet.tch_tanggal asc, broken_item desc
				");
			}
            if($salur->num_rows()>0)
            {
            	foreach($salur->result() as $data)
				{
					$sedekah[] = $data;
				}
                return $sedekah;
            }
		}

		//bulanan
		////////////
		///////////
		//////////
		function tabel_harian_bulan($plaid, $tahun)
		{
			$data = array('plaid' => $plaid, 'tahun' => $tahun);
			$query = $this->db->query("call get_pivot_bulan(?,?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_ok_bulan($plaid, $tahun)
		{
			$data = array('plaid' => $plaid, 'tahun' => $tahun);
			$query = $this->db->query("call get_pivot_ok_bulan(?,?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_nok_bulan($plaid, $tahun)
		{
			$data = array('plaid' => $plaid, 'tahun' => $tahun);
			$query = $this->db->query("call get_pivot_nok_bulan(?,?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_okbyfunc_bulan($plaid, $tahun)
		{
			$data = array('plaid' => $plaid, 'tahun' => $tahun);
			$query = $this->db->query("call get_pivot_okbyfunc_bulan(?,?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tabel_harian_feedback_bulan($plaid, $tahun)
		{
			$data = array('plaid' => $plaid, 'tahun' => $tahun);
			$query = $this->db->query("call get_pivot_feedback_bulan(?,?)", $data);	
			$res = $query->result();		
			//add this two line 
			$query->next_result(); 
			$query->free_result(); 
			//end of new code
			return $res;
		}

		function tampil_grafik_bulan($plaid, $tahun)
		{
			$hasil = null;
			
			$this->db->select('MONTH(t.tch_tanggal) as bulan, count(t.tch_tanggal) as total');
			$this->db->from('beam_tr_checksheet t');
			$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
			$this->db->where('t.tch_approval = \'approved\'');
			if($plaid!=null) $this->db->where('a.pla_id = \''.$plaid.'\'');
			if($tahun!=null) $this->db->where('YEAR(t.tch_tanggal) = \''.$tahun.'\'');
			$this->db->group_by('MONTH(t.tch_tanggal)');

			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_oknokbyfunc_bulan($plaid, $tahun)
		{
			$hasil = null;
			if($plaid==null && $tahun==null)
			{
				$salur = $this->db->query("select MONTH(t.tch_tanggal) as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved'
				group by MONTH(t.tch_tanggal)
				");
			}
			else if($tahun==null)
			{
				$salur = $this->db->query("select MONTH(t.tch_tanggal) as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$plaid."
				group by MONTH(t.tch_tanggal)
				");
			}
			else if($plaid==null)
			{
				$salur = $this->db->query("select MONTH(t.tch_tanggal) as tanggal, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				where t.tch_approval='approved' and YEAR(t.tch_tanggal)='".$tahun."'
				group by MONTH(t.tch_tanggal)
				");
			}
			else
			{
				$salur = $this->db->query("select MONTH(t.tch_tanggal) as bulan, sum(case t.tch_oknok when 'ok' then 1 else 0 end) as ok, sum(case t.tch_oknok when 'nok' then 1 else 0 end) as nok, sum(case t.tch_oknok when 'okbyfunc' then 1 else 0 end) as okbyfunc from beam_tr_checksheet t
				INNER JOIN beam_dtl_equipment d on d.deq_id = t.deq_id
				where t.tch_approval='approved' and d.pla_id=".$plaid." and YEAR(t.tch_tanggal)='".$tahun."'
				group by MONTH(t.tch_tanggal)
				");
			}
			foreach($salur->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}

		function tampil_feedback_bulan($plaid, $tahun)
		{
			$hasil = null;

			$this->db->select('t.tch_tanggal as tanggal, count(t.tch_tanggal) as total');
			$this->db->from('beam_tr_checksheet t');
			$this->db->join('beam_dtl_equipment a', 'a.deq_id = t.deq_id');
			$this->db->where('t.tch_approval = \'approved\'');
			$this->db->where('t.tch_statusfeedback = \'1\'');
			if($plaid!=null) $this->db->where('a.pla_id', $plaid);
			if($tahun!=null) $this->db->where('YEAR(t.tch_tanggal)', $tahun);
			$this->db->group_by('t.tch_tanggal');
			// $this->db->where('year(t.tanggal) between '.$awal.' and '.$akhir);
			$query = $this->db->get();
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
			if(!isset($hasil)){$hasil=null;}
            return $hasil;
		}
    }
?>