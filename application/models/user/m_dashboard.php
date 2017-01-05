<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dashboard extends CI_Model
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

	public function edit_user($id_user)
 	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function kelola_user($username, $id)
 	{
		$data=$this->db->query("select * from user where username = '$username' and id != '$id'");
		return $data->result();
	}

	public function detail_user($iduser)
    {
        $data = $this->db->query("SELECT * from user WHERE id='$iduser'");
        return $data->result(); 
    }
      
    public function add_gambar($id_user, $data){
        $this->db->where('id', $id_user);
        $this->db->update('user', $data); 
    }
    
    public function update_user($id_user, $data)
	{
		$this->db->where('id', $id_user);
		$this->db->update('user', $data);
	}

	public function hapus_user($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }
}
?>