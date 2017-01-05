<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Dashboard extends CI_Model
 {
 	public function ambil_admin($id)
 	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function ambil_semua_user()
 	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

 	public function search()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from user WHERE nama_lengkap like '%$cari%'");
        return $data->result(); 
    }

	public function block($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	public function aktif($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function ambil_user($id_user)
 	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function update_user($id_user, $data)
	{
		$this->db->where('id', $id_user);
		$this->db->update('user', $data);
	}

	public function add_gambar($id_user, $data){
        $this->db->where('id', $id_user);
        $this->db->update('user', $data); 
    }

    public function hapus_user($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }
	
 }

 ?>