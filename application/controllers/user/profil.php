<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
       	parent::__construct();
        $this->load->model('user/m_profil');
        
        if($this->session->userdata('user_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
        }  
    }

    public function aboutme()
    {  
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $cek_ktp=$this->m_profil->cek_ktp($id)->result();
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['cek_ktp'] = $cek_ktp;
        $data['page'] = "Profil";
        $data['sub_page'] = "About Me";
        $data['sub_page_satu'] = "";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_aboutme', $data);
        $this->load->view('v_footer');
    }
    
    public function ambil_user() 
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "About Me";
        $data['sub_page_satu'] = "Edit Profil";
        $this->load->view('v_template', $data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_aboutme_edit', $data);
        $this->load->view('v_footer');
    }

    public function proses_edit_user() 
    {
       if($this->session->userdata('user_is_logged_in'))
       {
            $id = $this->session->userdata('id');
        }       
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

        $this->m_profil->update_user($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data berhasil diubah! ");
        redirect('user/profil/aboutme');
    }

    public function proses_edit_foto() {
        if($this->session->userdata('user_is_logged_in')) {
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
                redirect('user/profil/aboutme'); //jika gagal maka akan ditampilkan form upload
            }
            else
            {
                echo $this->upload->display_errors(); die();
                redirect('user/profil/aboutme'); //jika gagal maka akan ditampilkan form upload
            }
        }}
        else 
        {
            redirect('user/profil/aboutme');
        }
    }

    public function orang_tua(){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['ayah'] = $this->m_profil->ambil_ayah($id);
        $data['ibu'] = $this->m_profil->ambil_ibu($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua', $data);
        $this->load->view('v_footer');
    }

    public function tambah_orang_tua_ayah()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Tambah Orang Tua";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_tambahayah', $data);
        $this->load->view('v_footer');
    }

    public function tambah_orang_tua_ibu()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Tambah Orang Tua";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_tambahibu', $data);
        $this->load->view('v_footer');
    }

    public function cari_orang_tua_ayah()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Tambah Orang Tua";
        $data['cari'] = $this->m_profil->search();
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_tambahayah', $data);
        $this->load->view('v_footer');
    }

    public function cari_orang_tua_ibu()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Tambah Orang Tua";
        $data['cari'] = $this->m_profil->search();
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_tambahibu', $data);
        $this->load->view('v_footer');
    }

    public function proses_tambah_orang_tua()
    {
       if($this->session->userdata('user_is_logged_in'))
       {
            $id = $this->session->userdata('id');
        }

        $jenis_permintaan = $this->input->post('jenis_permintaan_ayah');

        if($jenis_permintaan=='Ayah'){
            $jenis_permintaan = $this->input->post('jenis_permintaan_ayah');
        }else{
            $jenis_permintaan = $this->input->post('jenis_permintaan_ibu');
        }

        $data = array(
            'id_peminta' => $this->session->userdata('id'),
            'id_diminta' => $this->input->post('id'),
            'jenis_permintaan' => $jenis_permintaan         
        );

        $this->db->insert('permintaan', $data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Pasangan berhasil ditambah, Tunggu Konfirmasi permintaan Diterima! ");
        redirect('user/profil/orang_tua');
    }

    public function proses_tambah_orang_tua_manual()
    {
       if($this->session->userdata('user_is_logged_in'))
       {
            $id = $this->session->userdata('id');
            $username = $this->session->userdata('username');
        }
        $id_user = $this->session->userdata('id');
        $id_suami = $this->input->post('id_ayah');
        $id_nikah = $this->input->post('id_nikah');

        $data = array(
            'id' => $this->input->post('id_ayah'),
            'no_ktp' => $this->input->post('no_ktp_ayah'),
            'nama_lengkap' => $this->input->post('nama_lengkap_ayah'),
            'tempat_lahir' => $this->input->post('tempat_lahir_ayah'),
            'tanggal_lahir' => $this->input->post('tempat_lahir_ayah'),
            'username' => $username,
            'level' => $this->input->post('level')
        );

        $data2 = array(
            'id_suami' => $id_suami,
            'id_istri' => $id_istri
        );

        $id=$this->input->post('id_ayah');
        $cek_id=$this->m_profil->cek_id($id);
        if($cek_id->num_rows()>0) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf ID : $id yang anda masukkan sudah ada!!! ");
            redirect('user/profil/tambah_orang_tua');
        }else{
            $this->db->insert('user', $data);
            $this->db->insert('pernikahan', $data2);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Pasangan berhasil ditambahkan!!!");
            redirect('user/profil/tambah_orang_tua');
        }
    }

    public function detail_ayah()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['ayah'] = $this->m_profil->ambil_ayah($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Pasangan Ayah";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_ayahdetail', $data);
        $this->load->view('v_footer');
    }

    public function detail_ibu()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['ibu'] = $this->m_profil->ambil_ibu($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Orang Tua";
        $data['sub_page_satu'] = "Pasangan Ayah";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_orang_tua_ibudetail', $data);
        $this->load->view('v_footer');
    }

    public function hapus_orangtua($id_permintaan){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $this->m_profil->hapus_orangtua($id_permintaan);
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Hubungan Orang Tua berhasil dihapus!!! ");
        redirect('user/profil/orang_tua');
    }

    public function pasangan()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['pasangan'] = $this->m_profil->ambil_pasangan($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Pasangan";
        $data['sub_page_satu'] = "";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_pasangan', $data);
        $this->load->view('v_footer');
    }

    public function tambah_pasangan()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $jenis_permintaan = $this->input->post('jenis_permintaan');
        if($jenis_permintaan=='Suami'){
            $data['result'] = $this->m_profil->ambil_user($id);
            $data['page'] = "Profil";
            $data['sub_page'] = "Pasangan";
            $data['sub_page_satu'] = "Tambah Pasangan";
            $this->load->view('v_template',$data);
            $this->load->view('user/profil/v_profil_menu', $data);
            $this->load->view('user/profil/v_pasangan_tambah_suami', $data);
            $this->load->view('v_footer');
        }else{
            $data['result'] = $this->m_profil->ambil_user($id);
            $data['page'] = "Profil";
            $data['sub_page'] = "Pasangan";
            $data['sub_page_satu'] = "Tambah Pasangan";
            $this->load->view('v_template',$data);
            $this->load->view('user/profil/v_profil_menu', $data);
            $this->load->view('user/profil/v_pasangan_tambah_istri', $data);
            $this->load->view('v_footer');
        }
    }

    public function cari_pasangan_suami()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
            $data['result'] = $this->m_profil->ambil_user($id);
            $data['page'] = "Profil";
            $data['sub_page'] = "Pasangan";
            $data['sub_page_satu'] = "Tambah Pasangan";
            $data['cari'] = $this->m_profil->search();
            $this->load->view('v_template',$data);
            $this->load->view('user/profil/v_profil_menu', $data);
            $this->load->view('user/profil/v_pasangan_tambah_suami', $data);
            $this->load->view('v_footer');
    }

    public function cari_pasangan_istri()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
            $data['result'] = $this->m_profil->ambil_user($id);
            $data['page'] = "Profil";
            $data['sub_page'] = "Pasangan";
            $data['sub_page_satu'] = "Tambah Pasangan";
            $data['cari'] = $this->m_profil->search();
            $this->load->view('v_template',$data);
            $this->load->view('user/profil/v_profil_menu', $data);
            $this->load->view('user/profil/v_pasangan_tambah_istri', $data);
            $this->load->view('v_footer');
    }

    public function proses_tambah_pasangan()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $jenis_permintaan = $this->input->post('jenis_permintaan_suami');
        if($jenis_permintaan=='Suami'){
            $jenis_permintaan = $this->input->post('jenis_permintaan_suami');
        }else{
            $jenis_permintaan = $this->input->post('jenis_permintaan_istri');
        }

        $data = array(
            'id_peminta' => $this->session->userdata('id'),
            'id_diminta' => $this->input->post('id'),
            'jenis_permintaan' => $jenis_permintaan      
        );

        $this->db->insert('permintaan', $data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Pasangan berhasil ditambah, Tunggu Konfirmasi permintaan Diterima! ");
        redirect('user/profil/pasangan');
    }

    public function proses_tambah_pasangan_manual()
    {
       if($this->session->userdata('user_is_logged_in'))
       {
            $id = $this->session->userdata('id');
            $username = $this->session->userdata('username');
        }
        $jenis_permintaan = $this->input->post('jenis_permintaan');

        if($jenis_permintaan=='Suami'){
            $id_suami = $this->input->post('id_pasangan');
            $id_istri = $this->session->userdata('id');
        }else{
            $id_suami = $this->session->userdata('id');
            $id_istri = $this->input->post('id_pasangan');
        }

        $data = array(
            'id' => $this->input->post('id_pasangan'),
            'no_ktp' => $this->input->post('no_ktp'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tempat_lahir'),
            'username' => $username,
            'level' => $this->input->post('level')
        );

        $data2 = array(
            'id_suami' => $id_suami,
            'id_istri' => $id_istri
        );

        $id=$this->input->post('id_pasangan');
        $cek_id=$this->m_profil->cek_id($id);

        if($cek_id->num_rows()>0) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf ID : $id yang anda masukkan sudah ada!!! ");
            redirect('user/profil/tambah_pasangan');
        }else{
            $this->db->insert('user', $data);
            $this->db->insert('pernikahan', $data2);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Pasangan berhasil ditambahkan!!!");
            redirect('user/profil/pasangan');
        }
    }

    public function detail_pasangan()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['pasangan'] = $this->m_profil->ambil_pasangan($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Pasangan";
        $data['sub_page_satu'] = "Pasangan Detail";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_pasangan_detail', $data);
        $this->load->view('v_footer');
    }

    public function edit_pernikahan()
    {
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $data['pasangan'] = $this->m_profil->ambil_pasangan($id);
        $data['result'] = $this->m_profil->ambil_user($id);
        $data['page'] = "Profil";
        $data['sub_page'] = "Pasangan";
        $data['sub_page_satu'] = "Pasangan Detail";
        $this->load->view('v_template',$data);
        $this->load->view('user/profil/v_profil_menu', $data);
        $this->load->view('user/profil/v_pasangan_edit_pernikahan', $data);
        $this->load->view('v_footer');
    }

    public function proses_edit_pernikahan()
    {
       if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }
        $id_nikah = $this->input->post('id_nikah');

        $data = array(
            'tanggal_nikah' => $this->input->post('tanggal_nikah'),
            'tanggal_cerai' => $this->input->post('tanggal_cerai'),
            'status_nikah' => $this->input->post('status_nikah')         
        );

        $this->m_profil->update_pernikahan($id_nikah, $data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Pernikahan berhasil diubah!!! ");
        redirect('user/profil/pasangan');
    }

    public function hapus_pernikahan($id_nikah){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $this->m_profil->hapus_pernikahan($id_nikah);
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Pernikahan berhasil dihapus!!! ");
        redirect('user/profil/pasangan');
    }

}
?>