<?php
class Departemen extends CI_Controller
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

            if($this->form_validation->run() == true)
            {
                //load file model 
                $this->load->model('Departemenmodel');

                //menjalankan fungsi tambah data pada model
                $this->Departemenmodel->tambah();
                $this->session->set_flashdata('item','tambah');
                //mengarahkan file ke controller 
                //artinya mengarahkan ke index
                redirect ('departemen');
            }
        }  
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooladd($this->session->userdata('role'), 'departemen'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'departemen');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            $this->load->view('departemen_tambah', $data);
        }
        else
        {
            redirect('departemen');
        }
    }
    
    //fungsi pertama kali diload ketika memanggil controller
    function index()
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbool($this->session->userdata('role'), 'departemen'))
        {
            $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'departemen');
            $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
            
            //meload file model
            $this->load->model('Departemenmodel');

            //mengambil nilai pengambalian dari fungsi tampil pada model
            //return nilai didapat berupa array
            $data['hasil'] = $this->Departemenmodel->tampil();

            //meload file view
            //sekaligus memberikan parameter $data
            //yang berisi data $hasil dari fungsi tampil pada model
            $this->load->view('departemen_tampil', $data);
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
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'departemen'))
        {
            //meload file model
            $this->load->model('Departemenmodel');
                
            //menjalankan fungsi hapus pada model
            $this->Departemenmodel->hapuson($id);
            $this->session->set_flashdata('item','non-aktifkan');
            
            //mengarahkan ke controller
            redirect('Departemen');
        }
        else
        {
            redirect('Departemen');
        }
    }

    //fungsi hapus data
    function deleteoff($id)
    {
        $this->load->model('Menumodel');
        if($this->Menumodel->returnbooldelete($this->session->userdata('role'), 'departemen'))
        {
            //meload file model
            $this->load->model('Departemenmodel');
    
            //menjalankan fungsi hapus pada model
            $this->Departemenmodel->hapusoff($id);
            $this->session->set_flashdata('item','aktifkan');
    
            //mengarahkan ke controller
            redirect('Departemen');
        }
        else
        {
            redirect('Departemen');
        }
    }

    //fungsi untuk melakukan perubahan data
    function update($id)
    {
        //membaca apakah form submit dilakukan
        if($_POST==null)
        {
            $this->load->model('Menumodel');
            if($this->Menumodel->returnbooledit($this->session->userdata('role'), 'departemen'))
            {
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'departemen');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //meload file model
                $this->load->model('Departemenmodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Departemenmodel->ubah_tampil($id);

                //meload file view
                $this->load->view('departemen_ubah', $data);
            }
            else
            {
                redirect('Departemen');
            }
        }
        else
        {
            $this->load->helper(array('form', 'url'));
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            if($this->form_validation->run() == true)
            {
                //meload file model
                $this->load->model('Departemenmodel');
                //menjalankan fungsi ubah 
                $this->Departemenmodel->ubah($id);
                $this->session->set_flashdata('item','ubah');

                //mengarahkan file controller
                redirect('Departemen');
            }
            else
            {
                $this->load->model('Menumodel');
                $data['akses']=$this->Menumodel->getstatus($this->session->userdata('role'), 'departemen');
                $data['menu']=$this->Menumodel->getmenu($this->session->userdata('role'));
                //mengarahkan file controller
                $this->load->model('Departemenmodel');
                //menjalankan fungsi ubah tampil
                $data['hasil'] = $this->Departemenmodel->ubah_tampil($id);

                //meload file view
                $this->load->view('departemen_ubah', $data);
            }
        }
    }
}
?>