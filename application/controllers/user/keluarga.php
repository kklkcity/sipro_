<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keluarga extends CI_Controller {

    public function __construct()
    {
       	parent::__construct();
        $this->load->model('user/m_keluarga');
        
        if($this->session->userdata('user_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
        }  
    }

    Public function index()
    {
    if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        
        $data['result'] = $this->m_keluarga->ambil_user($id);
        $data['saudara'] = $this->m_keluarga->saudara($id);
        $data['pasangan'] = $this->m_keluarga->pasangan($id);
        $data['ayah'] = $this->m_keluarga->ayah($id);
        $data['ibu'] = $this->m_keluarga->ibu($id);
        $data['anak'] = $this->m_keluarga->anak($id);
        $data['page'] = "Keluarga";
        
        $this->load->view('v_template', $data);
        $this->load->view('user/keluarga/v_keluarga', $data);
        $this->load->view('v_footer');
    }

    public function detail_user()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $id_user = $this->input->post('iduser');
        $data['detail'] = $this->m_keluarga->lihat_user($id_user);
        $data['result'] = $this->m_keluarga->ambil_user($id);
        $data['page'] = "Detail Profil User";
        
        $this->load->view('v_template',$data);
        $this->load->view('user/cari/v_cari_detail', $data);
        $this->load->view('v_footer');
    }
}

?>