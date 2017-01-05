<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Profil extends CI_Model
 {
 	public function ambil_user($id)
 	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

    public function add_gambar($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user', $data); 
    }

    public function cek_ktp($kode)
    {
        $this->db->where('id', $kode);
        $query=$this->db->get('user');
        return $query;
    }

    public function search()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from user WHERE nama_lengkap like '%$cari%'");
        return $data->result(); 
    }

    public function notifikasi($id)
    {
        $data = $this->db->query("SELECT * from permintaan WHERE id_diminta='$id'");
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            WHERE user.id=permintaan.id_peminta AND permintaan.id_diminta='$id'");
        return $data->result(); 
    }

    public function update_permintaan($id_peminta, $id, $data)
    {
        $this->db->where('id_peminta', $id_peminta);
        $this->db->where('id_diminta', $id);
        $this->db->update('permintaan', $data);
    }

    public function ambil_pasangan($id)
    {
        $data = $this->db->query("SELECT * from user INNER JOIN pernikahan 
            
            WHERE (user.id=pernikahan.id_istri AND pernikahan.id_suami='$id' )OR 
            (user.id=pernikahan.id_suami AND pernikahan.id_istri='$id')
            ")  ;
        return $data->result(); 
    }

    public function update_pernikahan($id_nikah, $data)
    {
        $this->db->where('id_nikah', $id_nikah);
        $this->db->update('pernikahan', $data);
    }

    public function hapus_pernikahan($id_nikah)
    {
        return $this->db->delete('pernikahan', array('id_nikah' => $id_nikah));
    }

    public function cek_id($kode)
    {
        $this->db->where('id',$kode);
        $query=$this->db->get('user');
        return $query;
    }

    public function ambil_ayah($id)
    {
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            ON permintaan.id_diminta=user.id
            WHERE permintaan.id_peminta='$id'
            AND permintaan.status_permintaan='Terima'
            AND permintaan.jenis_permintaan='Ayah'"
            );
        return $data->result(); 
    }

    public function ambil_ibu($id)
    {
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            ON permintaan.id_diminta=user.id
            WHERE permintaan.id_peminta='$id'
            AND permintaan.status_permintaan='Terima'
            AND permintaan.jenis_permintaan='Ibu'"
            );
        return $data->result(); 
    }

    public function hapus_orangtua($id_permintaan)
    {
        return $this->db->delete('permintaan', array('id_permintaan' => $id_permintaan));
    }

    public function detail_user($iduser)
    {
        $data = $this->db->query("SELECT * from user WHERE id='$iduser'");
        return $data->result(); 
    }   
    
}

?>


	