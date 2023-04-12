<?php
class Typeequip extends CI_Controller
{
    //fungsi untuk menambahkan data
    function tambah()
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('berkala', 'Pengecekan Berkala', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Typeequipmodel');

                //menjalankan fungsi tambah data pada model
                $this->Typeequipmodel->tambah($this->session->userdata('id'));
                $this->session->set_flashdata('item','tambah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('typeequip');
            }
        }  
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'jenisperalatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'jenisperalatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));

            $this->load->model('Typeequipmodel');
            $data['dtl_item'] = $this->Typeequipmodel->tampil_dtl_item_aktif();
            $data['dtl_poin'] = $this->Typeequipmodel->tampil_dtl_poin($this->session->userdata('id'));
            $this->load->model('Itemcheckmodel');
            $data['itemcheck'] = $this->Itemcheckmodel->tampil();

            $this->load->view('typeequip_tambah', $data);
        }
        else
        {
            redirect('typeequip');
        }
    }

    function tambah_poin()
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('poinnama', 'Nama Pemeriksaan', 'required');
            $this->form_validation->set_rules('poinsatuan', 'Satuan', 'required');
            $this->form_validation->set_rules('standarmin', 'Standar Minimal', 'required');
            $this->form_validation->set_rules('standarmax', 'Standar Maksimal', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Typeequipmodel');

                //cek db apakah ada yang sama atau tidak
                if($this->Typeequipmodel->poin_exists($this->input->post('poinnama')))
                {
                    //menjalankan fungsi tambah data pada model
                    $this->Typeequipmodel->tambah_poin($this->session->userdata('id'));
                    $this->session->set_flashdata('item','tambah');
                    //mengarahkan file ke controller 
                    //artinya mengarahkan ke index
                    redirect ('typeequip/tambah');
                }
                else
                {
                    $this->session->set_flashdata('item','error');
                    redirect ('typeequip/tambah');
                }
            }
            else
            {
                $this->session->set_flashdata('item','error_required');
                //mengarahkan file controller
                redirect('Typeequip/tambah');
            }
        } 

        $this->load->model('Typeequipmodel');
        $data['dtl_item'] = $this->Typeequipmodel->tampil_dtl_item();
        $data['dtl_poin'] = $this->Typeequipmodel->tampil_dtl_poin($this->session->userdata('id'));
        $this->load->model('Itemcheckmodel');
        $data['itemcheck'] = $this->Itemcheckmodel->tampil();
        
        //load tampilan tambah
        $this->load->view('typeequip_tambah', $data);
    }

    function tambah_dtl_poin($equid)
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('poinnama', 'Nama Pemeriksaan', 'required');
            $this->form_validation->set_rules('poinsatuan', 'Satuan', 'required');
            $this->form_validation->set_rules('standarmin', 'Standar Minimal', 'required');
            $this->form_validation->set_rules('standarmax', 'Standar Maksimal', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Typeequipmodel');

                //cek db apakah ada yang sama atau tidak
                if($this->Typeequipmodel->poin_dtl_exists($this->input->post('poinnama'), $equid))
                {
                    //menjalankan fungsi tambah data pada model
                    $this->Typeequipmodel->tambah_dtl_poin($equid);
                    $this->session->set_flashdata('item','tambah');
                    //mengarahkan file ke controller 
                    //artinya mengarahkan ke index
                    redirect ('typeequip/update/'.$equid);
                }
                else
                {
                    $this->session->set_flashdata('item','error');
                    redirect ('typeequip/update/'.$equid);

                }
            }
            else
            {
                $this->session->set_flashdata('item','error_required');
                //mengarahkan file controller
                redirect('Typeequip/update/'.$equid);
            }
        } 

        // $this->load->model('Typeequipmodel');
        // $data['dtl_item'] = $this->Typeequipmodel->tampil_dtl_item();
        // $data['dtl_poin'] = $this->Typeequipmodel->tampil_dtl_poin();
        // $this->load->model('Itemcheckmodel');
        // $data['itemcheck'] = $this->Itemcheckmodel->tampil();
        
        // //load tampilan tambah
        // $this->load->view('typeequip_tambah', $data);
    }

    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'jenisperalatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'jenisperalatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Typeequipmodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $data['hasil'] = $this->Typeequipmodel->tampil();
            $data['hasil_detail'] = $this->Typeequipmodel->tampil_detail();
            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('typeequip_tampil', $data);
        }
        else
        {
            redirect('home');
        }
    }

    // //fungsi hapus data
    // function delete($id)
    // {
    //     $this->load->model('Menumodel');
    //     if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'jenisperalatan'))
    //     {
    //         //meload file model
    //         $this->load->model('Typeequipmodel');
    
    //         //menjalankan fungsi hapus pada model
    //         $this->Typeequipmodel->hapus($id);
    //         $this->session->set_flashdata('item','hapus');
    
    //         //mengarahkan ke controller
    //         redirect('Typeequip');
    //     }
    //     else
    //     {
    //         redirect('Typeequip');
    //     }
    // }

    
    //fungsi hapus data
    function deleteon($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'jenisperalatan'))
        {
            //meload file model
            $this->load->model('Typeequipmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Typeequipmodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
    
            //mengarahkan ke controller
            redirect('Typeequip');
        }
        else
        {
            redirect('Typeequip');
        }
    }

    //fungsi hapus data
    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'jenisperalatan'))
        {
            //meload file model
            $this->load->model('Typeequipmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Typeequipmodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('Typeequip');
        }
        else
        {
            redirect('Typeequip');
        }
    }

     //fungsi hapus data
     function delete_item()
     {
        $usrid =  $this->uri->segment(4);
        $itemid =  $this->uri->segment(3);
         //meload file model
         $this->load->model('Typeequipmodel');
        
         //menjalankan fungsi hapus pada model
         $this->Typeequipmodel->hapus_item($itemid, $usrid);
         $this->session->set_flashdata('item','hapus');
 
         //mengarahkan ke controller
         redirect('Typeequip/tambah');
     }

     //fungsi hapus data
     function delete_poin($id)
     {
         //meload file model
         $this->load->model('Typeequipmodel');
 
         //menjalankan fungsi hapus pada model
         $this->Typeequipmodel->hapus_poin($id);
         $this->session->set_flashdata('item','hapus');
 
         //mengarahkan ke controller
         redirect('Typeequip/tambah');
     }

     //fungsi hapus data
     function delete_dtl_poin()
     {
        $dpoid = $this->uri->segment(3);
        $equid = $this->uri->segment(4);
         //meload file model
         $this->load->model('Typeequipmodel');
 
         //menjalankan fungsi hapus pada model
         $this->Typeequipmodel->hapus_dtl_poin($dpoid);
         $this->session->set_flashdata('item','hapus');
 
         //mengarahkan ke controller
         redirect('Typeequip/update/'.$equid);
     }

     //fungsi untuk melakukan perubahan data
    function detail($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'jenisperalatan'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'jenisperalatan');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Typeequipmodel');
            //menjalankan fungsi ubah tampil
            $data['hasil'] = $this->Typeequipmodel->ubah_tampil($id);

            //tampil data poin yang ada di dtl_poin
            $data['dtl_item'] = $this->Typeequipmodel->tampilubah_dtl_item($id);
            $data['dtl_poin'] = $this->Typeequipmodel->tampilubah_dtl_poin($id);
            $data['cek_item'] = $this->Typeequipmodel->tampilubah_checked_item($id);
            //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
            //meload file view
            $this->load->view('typeequip_detail', $data);
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
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'jenisperalatan'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'jenisperalatan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Typeequipmodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Typeequipmodel->ubah_tampil($id);
    
                //tampil data poin yang ada di dtl_poin
                $data['dtl_item'] = $this->Typeequipmodel->tampilubah_dtl_item_aktif($id);
                $data['dtl_poin'] = $this->Typeequipmodel->tampilubah_dtl_poin($id);
                $data['cek_item'] = $this->Typeequipmodel->tampilubah_checked_item($id);
                //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
                //meload file view
                $this->load->view('typeequip_ubah', $data);
            }
            else
            {
                redirect('Typeequip');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('berkala', 'Pengecekan Berkala', 'required');
            if($this->form_validation->run() == true)
            {
                //meload file model
                $this->load->model('Typeequipmodel');
                //menjalankan fungsi ubah 
                $this->Typeequipmodel->ubah($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Typeequip');
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'jenisperalatan');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Typeequipmodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Typeequipmodel->ubah_tampil($id);

                //tampil data poin yang ada di dtl_poin
                $data['dtl_item'] = $this->Typeequipmodel->tampilubah_dtl_item($id);
                $data['dtl_poin'] = $this->Typeequipmodel->tampilubah_dtl_poin($id);
                $data['cek_item'] = $this->Typeequipmodel->tampilubah_checked_item($id);
                //tampil data keseluruhan item checksheet dan di centang yang terdaftar di database
                //meload file view
                $this->load->view('typeequip_ubah', $data);
            }
        }
    }

    //fungsi untuk melakukan perubahan data
    function update_poin($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
        $this->form_validation->set_rules('poinnama', 'Nama Pemeriksaan', 'required');
        $this->form_validation->set_rules('poinsatuan', 'Satuan', 'required');
        $this->form_validation->set_rules('standarmin', 'Standar Minimal', 'required');
        $this->form_validation->set_rules('standarmax', 'Standar Maksimal', 'required');
        if($this->form_validation->run() == true)
        {
            //meload file model
            $this->load->model('Typeequipmodel');
            // if($this->Typeequipmodel->poin_exists($this->input->post('poinnama')))
            // {
                //menjalankan fungsi ubah 
                $this->Typeequipmodel->ubah_poin($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Typeequip/tambah');
            // }    
            // else
            // { 
            //     $this->session->set_flashdata('item','error');
            //     //mengarahkan file controller
            //     redirect('Typeequip/tambah');
            // }
        }
        else
        {
            $this->session->set_flashdata('item','error_required');
            //mengarahkan file controller
            redirect('Typeequip/tambah');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update_poin2()
    {
        $dpoid = $this->uri->segment(3);
        $equid = $this->uri->segment(4);
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
        $this->form_validation->set_rules('poinnama', 'Nama Pemeriksaan', 'required');
        $this->form_validation->set_rules('poinsatuan', 'Satuan', 'required');
        $this->form_validation->set_rules('standarmin', 'Standar Minimal', 'required');
        $this->form_validation->set_rules('standarmax', 'Standar Maksimal', 'required');
        if($this->form_validation->run() == true)
        {
            //meload file model
            $this->load->model('Typeequipmodel');
            // if($this->Typeequipmodel->poin_exists($this->input->post('poinnama')))
            // {
                //menjalankan fungsi ubah 
                $this->Typeequipmodel->ubah_poin2($dpoid);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Typeequip/update/'.$equid);
            // }
            // else
            // { 
            //     $this->session->set_flashdata('item','error');
            //     //mengarahkan file controller
            //     redirect('Typeequip/update/'.$equid);
            // }
        }
        else
        {
            $this->session->set_flashdata('item','error_required');
            //mengarahkan file controller
            redirect('Typeequip/update/'.$equid);
        }
    }
}
?>