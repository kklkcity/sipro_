<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        if ($this->session->userdata('level')=='2'){
            redirect('admin/dashboard');
        }elseif ($this->session->userdata('level')=='1') {
            redirect('user/dashboard');
        }else{
            $this->load->view('login/v_login');
        }
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        $data_login = array('username' => $this->input->post('username'), 
                            'password' => md5($this->input->post('password')));

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('msg1', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Masukkan Username dan Password!!! ");
            redirect('login');
        }else{
            $hasil=$this->m_login->cek_login($data_login); 

            if ($hasil->num_rows() == 1){ 
                foreach ($hasil->result() as $item){ 
                    $jenis=$item->level;
                }
                    switch ($jenis)
                    {
                        case '2':
                            $identity=$this->m_login->cek_admin($data_login);
                            foreach ($identity->result() as $item){
                            $data = array(
                                        'id' => $item->id,
                                        'nama_lengkap' => $item->nama_lengkap,
                                        'username' => $item->username,
                                        'level' => $item->level,
                                        'admin_is_logged_in' => TRUE); 
                            $this->session->set_userdata($data);
                            redirect('admin/dashboard/index');
                            break;
                            }
                        case '1':
                            $identity=$this->m_login->cek_user($data_login);
                            foreach ($identity->result() as $item){ 
                            if($item->status_akun=='Aktif'){
                                $data = array(
                                            'id' => $item->id,
                                            'nama_lengkap' => $item->nama_lengkap,
                                            'username' => $item->username,
                                            'level' => $item->level,
                                            'user_is_logged_in' => TRUE); 
                                $this->session->set_userdata($data);
                                redirect('user/dashboard/index');
                            }else{
                                $this->session->set_flashdata('msg2', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf akun Anda diblikir, silahkan hubungi Admin untuk mengaktifkan kembali!!! ");
                                redirect('login');
                            
                            }
                            break;
                        }
                    }          
            }else{ 
                $this->session->set_flashdata('msg2', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Cek Username dan Password yang anda masukkan!!! ");
                redirect('login'); 
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function register()
    {
        $this->load->view('login/v_register');
    }

    public function proses_register()
    {
        $object = array(
                    'id' => $this->input->post('id'),
                    'no_ktp' => $this->input->post('no_ktp'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'level'=>$this->input->post('level')  
                );

        $id=$this->input->post('id');
        $cek_id=$this->m_login->cek_id($id);
        $username=$this->input->post('username');
        $cek_username=$this->m_login->cek_username($username);
        $status_nikah=$this->input->post('status_nikah');

        if($cek_username->num_rows()>0){
                $this->session->set_flashdata('message1', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf username : $username yang anda masukkan sudah ada!!! ");
                redirect('login/register');
            }elseif($cek_id->num_rows()>0) {
                $this->session->set_flashdata('message2', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf ID : $id yang anda masukkan sudah ada!!! ");
                redirect('login/register');
            }elseif($status_nikah=="Belum"){
                $this->db->insert('user', $object);                   
                $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Selamat user telah ditambahkan, lengkapi data anda dan Login!!! ");
                $id=$this->input->post('id');
                $data['result'] = $this->m_login->ambil_user($id);
                $this->load->view('login/v_register_lengkap',$data);
            }else{
                $this->db->insert('user', $object);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Selamat user telah ditambahkan, lengkapi data anda dan Login!!! ");
                $id=$this->input->post('id');
                $data['result'] = $this->m_login->ambil_user($id);
                $this->load->view('login/v_register_lengkap',$data);

            }
    }

    public function proses_register_lengkap()
    {
        $id=$this->input->post('id');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $golongan_darah = $this->input->post('golongan_darah');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'alamat' => $alamat,
            'agama' => $agama,
            'golongan_darah' => $golongan_darah,
            'no_telepon' => $no_telepon,
            'email' => $email,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan
        );

        $this->m_login->update_user($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data berhasil disimpan, silahkan Login!!!");
        redirect('login');
    }
}

?>
