<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function getLoginData($usr, $pwd)
	{
		$u = $usr;
		$p = md5($pwd);

		$this->db->select('beam_ms_user.usr_id, beam_ms_user.usr_nama, beam_ms_user.usr_status, beam_ms_role.rol_status, beam_ms_user.usr_namalengkap, beam_ms_user.usr_npk, beam_ms_user.rol_id, beam_ms_role.rol_deskripsi, beam_ms_departemen.dept_nama, beam_ms_user.dept_id, beam_ms_user.usr_foto, beam_ms_user.usr_pass, beam_ms_user.pla_id');
		$this->db->from('beam_ms_user');
		$this->db->join('beam_ms_role', 'beam_ms_role.rol_id = beam_ms_user.rol_id');
		$this->db->join('beam_ms_departemen','beam_ms_departemen.dept_id = beam_ms_user.dept_id');
		$this->db->where(array('beam_ms_user.usr_nama'=>$u, 'beam_ms_user.usr_pass'=>$p));
		$cek_login = $this->db->get();
		// $cek_login = $this->db->get_where('beam_ms_user', array('usr_nama'=>$u, 'usr_pass'=>$p));
		if($cek_login->num_rows()>0)
		{
			$qad = $cek_login->row();
			if($u == $qad->usr_nama && $p==$qad->usr_pass && $qad->usr_status == 'Aktif' && $qad->rol_status == 'Aktif')
			{
				$sess = array(
					"id" => $qad->usr_id, 
					"username" => $qad->usr_nama,
					"role" => $qad->rol_id,
					"dept" => $qad->dept_id,
					"namarole" => $qad->rol_deskripsi,
					"namalengkap" => $qad->usr_namalengkap,
					"npk" => $qad->usr_npk,
					"gambar" => $qad->usr_foto,
					"plant" => $qad->pla_id
					);
				$this->session->set_userdata($sess);
				// if($qad->role=='amil')
				// {
				// 	header('location:'.base_url().'home');
				// }
				// else if($qad->role=='donatur')
				// {
				// 	header('location:'.base_url().'home/home_user');
				// }
				// else if($qad->role=='duta')
				// {
				// 	header('location:'.base_url().'home');
				// }
				if($this->session->userdata('last_page')!=null)
				{
					redirect($this->session->userdata('last_page'));
				}
				else
				{
					header('location:'.base_url().'home');
				}
			}
			else
			{
				echo "<script>alert('Data Pengguna tidak aktif, gunakan data pengguna yang aktif!');";
				echo "windows.location.href = '".base_url()."';";
				echo "</script>"; 
			}
		}
		else
		{
			echo "<script>alert('Username/Password salah, silahkan coba lagi!');";
			echo "windows.location.href = '".base_url()."';";
			echo "</script>"; 
		}
	}
}