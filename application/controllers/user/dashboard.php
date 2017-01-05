<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
       	parent::__construct();
        $this->load->model('user/m_profil');
        $this->load->model('user/m_dashboard');
        
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
            $username = $this->session->userdata('username');
        }
        $data['notifikasi'] = $this->m_profil->notifikasi($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['user'] = $this->m_dashboard->kelola_user($username, $id);
        $data['page'] = "Dashboard";
        $this->load->view('v_template', $data);
		$this->load->view('user/dashboard/v_dashboard', $data);
        $this->load->view('v_footer');
    }

    public function konfirmasi_pasangan(){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $id_peminta = $this->input->post('id_peminta');
        $id_anak = $this->input->post('id_peminta');
        $jenis_permintaan = $this->input->post('jenis_permintaan');
        $status_permintaan = $this->input->post('status_permintaan_terima');

        if($jenis_permintaan=='Suami'){
            $id_suami = $this->input->post('id_diminta');
            $id_istri = $this->input->post('id_peminta');
        }elseif($jenis_permintaan=='Istri'){
            $id_suami = $this->input->post('id_peminta');
            $id_istri = $this->input->post('id_diminta');
        }elseif($jenis_permintaan=='Ayah'){
            $id_suami = $this->input->post('id_diminta');        
        }else{
            $id_istri = $this->input->post('id_diminta');        
        }

        $data = array(
            'id_suami' => $id_suami,
            'id_istri' => $id_istri
        );

        $data2 = array(
            'status_permintaan' => $status_permintaan
        );

        $this->db->insert('pernikahan', $data);
        $this->m_profil->update_permintaan($id_peminta, $id, $data2);       
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Permintaan hubungan berhasil ditambah, Cek Profil Anda! ");
        redirect('user/dashboard');
    }

    public function konfirmasi_pasangan_tolak(){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $id_peminta = $this->input->post('id_peminta');

        $data = array(
            'status_permintaan' => $this->input->post('status_permintaan_tolak')
        );

        $this->m_profil->update_permintaan($id_peminta, $id, $data);        
        $this->session->set_flashdata('message1', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> OOppss. Permintaan berhasil ditolak! ");
        redirect('user/dashboard');
    }

    public function detail()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $id_user = $this->input->post('iduser');
        $data['detail'] = $this->m_dashboard->detail_user($id_user);
        $data['result'] = $this->m_dashboard->ambil_user($id);
        $data['page'] = "Detail Profil User";

        $this->load->view('v_template',$data);
        $this->load->view('user/dashboard/v_user_detail', $data);
        $this->load->view('v_footer');
    }
    
    public function proses_edit_foto() {
        if($this->session->userdata('user_is_logged_in')) 
        {
            $id_user = $this->input->post('id_user');
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
                $this->m_dashboard->add_gambar($id_user,$data); //akses model untuk menyimpan ke database
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
                $this->session->set_flashdata('msg', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Foto berhasil diubah! ");
                $path_uploads = './assets/uploads/'.$foto;
                $path_hasil_resize = './assets/hasil_resize/'.$foto;
                unlink($path_uploads);
                unlink($path_hasil_resize);
                redirect('user/dashboard/'); //jika gagal maka akan ditampilkan form upload
            }
            else
            {
                echo $this->upload->display_errors(); die();
                redirect('user/dashboard/'); //jika gagal maka akan ditampilkan form upload
            }
        }}
        else 
        {
            redirect('user/dashboard/');
        }
    }
    
    public function ambil_user() 
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $id_user = $this->input->post('id_user');
        $data['result'] = $this->m_dashboard->ambil_user($id);
        $data['detail'] = $this->m_dashboard->edit_user($id_user);
        $data['page'] = "Edit Profil User";

        $this->load->view('v_template',$data);
        $this->load->view('user/dashboard/v_user_edit', $data);
        $this->load->view('v_footer');
    }

    public function proses_edit_user() 
    {
       if($this->session->userdata('admin_is_logged_in'))
       {
            $id = $this->session->userdata('id');
        } 
        $id_user = $this->input->post('id_user');     
        $no_ktp = $this->input->post('no_ktp');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $golongan_darah = $this->input->post('golongan_darah');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $status = $this->input->post('status');
        $tanggal_meninggal = $this->input->post('tanggal_meninggal');

        $data = array(
            'no_ktp' => $no_ktp,
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' =>  $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'agama' => $agama,
            'golongan_darah' => $golongan_darah,
            'no_telepon' => $no_telepon,
            'email' => $email,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'status' => $status,
            'tanggal_meninggal' => $tanggal_meninggal
        );

        $this->m_dashboard->update_user($id_user,$data);
        $this->session->set_flashdata('msg', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data berhasil diubah! ");
        redirect('user/dashboard/');
    }

    public function hapus_user($id)
    {
        $this->m_dashboard->hapus_user($id);
        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Profil berhasil dihapus!!! ");
        redirect('user/dashboard/');
    }

    public function cari_user()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['user'] = $this->m_profil->ambil_user($id);
        $data['cari'] = $this->m_profil->search();
        $data['page'] = "Hasil Pencarian User";

        $this->load->view('v_template',$data);
        $this->load->view('user/cari/v_cari_hasil', $data);
        $this->load->view('v_footer');
        }
    
    public function detail_user()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $id_user = $this->input->post('id_user');
        $data['detail'] = $this->m_profil->detail_user($id_user);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Detail Profil User";

        $this->load->view('v_template',$data);
        $this->load->view('user/cari/v_cari_detail', $data);
        $this->load->view('v_footer');
    }
}

?>