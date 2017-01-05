<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_profil');
        
        if($this->session->userdata('admin_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
        }  
    }

    public function aboutme()
    {  
        if($this->session->userdata('admin_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
       
        $data['result'] = $this->m_profil->ambil_admin($id);
        $data['page'] = "Profil";

        $this->load->view('v_template',$data);
        $this->load->view('admin/profil/v_profil', $data);
        $this->load->view('v_footer');
    }
    
    public function ambil_admin() 
    {
        if($this->session->userdata('admin_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_admin($id);
        $data['page'] = "Profil";
        
        $this->load->view('v_template', $data);
        $this->load->view('admin/profil/v_profil_edit', $data);
        $this->load->view('v_footer');
    }
    
    public function proses_edit_admin()
    {
        if($this->session->userdata('admin_is_logged_in'))
       {
            $id = $this->session->userdata('id');
        }  
                
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
         $data = array(
            'username' => $username,
            'password' => $password
        );

        $this->m_profil->update_admin($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data berhasil diubah! ");
        redirect('admin/profil/aboutme');  
    } 

    public function proses_edit_foto() {
        if($this->session->userdata('admin_is_logged_in')) {
            $id = $this->input->post('id');
            $foto = $this->input->post('foto');

            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/uploads/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; //maksimum besar file 3M
            $config['max_width']  = '5000'; //lebar maksimum 5000 px
            $config['max_height']  = '5000'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'foto' =>$gbr['file_name']
                );
                $this->m_profil->add_gambar($id,$data); //akses model untuk menyimpan ke database
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/hasil_resize/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 
                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize())
                {
                    $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
                }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata('message1', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Foto berhasil diubah! ");
                $path_uploads = './assets/uploads/'.$foto;
                $path_hasil_resize = './assets/hasil_resize/'.$foto;
                unlink($path_uploads);
                unlink($path_hasil_resize);
                redirect('admin/profil/aboutme'); //jika gagal maka akan ditampilkan form upload
            }
            else
            {
                echo $this->upload->display_errors(); die();
                redirect('admin/profil/aboutme'); //jika gagal maka akan ditampilkan form upload
            }
        }}
        else 
        {
            redirect('admin/profil/aboutme');
        }
    }

}
?>