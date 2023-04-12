<?php
class Plant extends CI_Controller
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
            $this->form_validation->set_rules('kode', 'Kode Area', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Plantmodel');

                //menjalankan fungsi tambah data pada model
                $this->Plantmodel->tambah();
                $this->session->set_flashdata('item','tambah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('plant');
            }
        } 
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'plant'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'plant');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('plant_tambah', $data);
        }
        else
        {
            redirect('plant');
        }
    }

    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'plant'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'plant');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Plantmodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $data['hasil'] = $this->Plantmodel->tampil();

            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('plant_tampil', $data);
        }
        else
        {
            redirect('home');
        }
    }

    //fungsi hapus data
    function deleteon($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'plant'))
        {
            //meload file model
            $this->load->model('Plantmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Plantmodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
    
            //mengarahkan ke controller
            redirect('Plant');
        }
        else
        {
            redirect('Plant');
        }
    }

    //fungsi hapus data
    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'plant'))
        {
            //meload file model
            $this->load->model('Plantmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Plantmodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('Plant');
        }
        else
        {
            redirect('Plant');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'plant'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'plant');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Plantmodel');
        
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Plantmodel->ubah_tampil($id);
    
                //meload file view
                $this->load->view('plant_ubah', $data);
            }
            else
            {
                redirect('plant');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kode', 'Kode Area', 'required');
            if($this->form_validation->run() == true)
            {
                 //meload file model
                $this->load->model('Plantmodel');

                //menjalankan fungsi ubah 
                $this->Plantmodel->ubah($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Plant');
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'plant');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //mengarahkan file controller
                // redirect('Plant/update/'.$id);//meload file model
                $this->load->model('Plantmodel');
        
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Plantmodel->ubah_tampil($id);
                $this->load->view('plant_ubah',$data);
            }
        }
    }
}
?>