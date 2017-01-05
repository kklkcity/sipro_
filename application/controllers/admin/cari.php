<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cari extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_dashboard');
        
        if($this->session->userdata('admin_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
        }  
    }

    public function cari_user()
    {
    if($this->session->userdata('admin_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        
        $data['result'] = $this->m_dashboard->ambil_admin($id);
        $data['cari'] = $this->m_dashboard->search();
        $data['page'] = "Hasil Pencarian";
        
        $this->load->view('v_template',$data);
        $this->load->view('admin/cari/v_cari_hasil', $data);
        $this->load->view('v_footer');
        }

}
?>