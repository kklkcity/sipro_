<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Login extends CI_Model
 {
 	public function cek_login($data) 
 	{
		$query = $this->db->get_where('login', $data);
		return $query;
 	}

	public function cek_user($data) 
 	{
		$query = $this->db->get_where('user', $data);
		return $query;
	}

	public function cek_admin($data) 
 	{
		$query = $this->db->get_where('admin', $data);
		return $query;
	}

	public function cek_id($kode)
    {
        $this->db->where('id',$kode);
        $query=$this->db->get('user');
        return $query;
    }

	public function cek_username($kode)
    {
        $this->db->where('username',$kode);
        $query=$this->db->get('user');
        return $query;
    }

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
		$this->db->update('user',$data);
	}
}

?>