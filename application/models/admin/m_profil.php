<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Profil extends CI_Model
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
		
	public function cek_admin($cek) 
 	{
		$query = $this->db->get_where('admin', $cek);
		return $query;
	}

	public function update_admin($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
	}

    public function add_gambar($id, $data){
        $this->db->where('id', $id);
        $this->db->update('admin', $data); 
    }
}

?>


	