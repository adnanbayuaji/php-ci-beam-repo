<?php
class Role extends CI_Controller
{
    //fungsi untuk menambahkan data
    function tambah()
    {
        //jika ada post submit yang diterima dalam form
        if($this->input->post('submit'))
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Rolemodel');

                //menjalankan fungsi tambah data pada model
                $this->Rolemodel->tambah();
                $this->session->set_flashdata('item','tambah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('role');
            }
        }  
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'hakakses'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'hakakses');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('role_tambah', $data);
        }
        else
        {
            redirect('role');
        }
    }

    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'hakakses'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'hakakses');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Rolemodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $data['hasil'] = $this->Rolemodel->tampil();

            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('role_tampil', $data);
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
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'hakakses'))
        {
            //meload file model
            $this->load->model('Rolemodel');
    
            //menjalankan fungsi hapus pada model
            $this->Rolemodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
    
            //mengarahkan ke controller
            redirect('Role');
        }
        else
        {
            redirect('Role');
        }
    }

    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'hakakses'))
        {
            //meload file model
            $this->load->model('Rolemodel');
    
            //menjalankan fungsi hapus pada model
            $this->Rolemodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('Role');
        }
        else
        {
            redirect('Role');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'hakakses'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'hakakses');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Rolemodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Rolemodel->ubah_tampil($id);
                $data['hasilnew'] = $this->Rolemodel->ubah_tampil_detail($id);
    
                //meload file view
                $this->load->view('role_ubah', $data);
            }
            else
            {
                redirect('Role');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            if($this->form_validation->run() == true)
            {
                //meload file model
                $this->load->model('Rolemodel');
                //menjalankan fungsi ubah 
                $this->Rolemodel->ubah($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Role');
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'hakakses');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Rolemodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Rolemodel->ubah_tampil($id);
                $data['hasilnew'] = $this->Rolemodel->ubah_tampil_detail($id);

                //meload file view
                $this->load->view('role_ubah', $data);
            }
        }
    }
}
?>