<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Keluarga extends CI_Model
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

	public function lihat_user($id_user)
 	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function saudara($id)
 	{
		//$data = $this->db->query(" select user.nama_lengkap, user.foto, user.id,permintaan.* from permintaan inner join user where user.id=permintaan.id_peminta aand id_diminta in ( select id_diminta from permintaan where jenis_permintaan='Ayah' group by id_diminta having count(*) >1)");
        $data = $this->db->query("select user.nama_lengkap, user.foto, user.id,permintaan.id_peminta from permintaan inner join user where id_diminta=(select id_diminta 
		from permintaan where id_peminta='$id' and jenis_permintaan='Ayah') and permintaan.id_peminta != '$id' and jenis_permintaan='Ayah' and status_permintaan='Terima' and user.id=permintaan.id_peminta ");
        return $data->result();
	}

	public function pasangan($id)
 	{
		//$data = $this->db->query(" select user.nama_lengkap, user.foto, user.id,permintaan.* from permintaan inner join user where user.id=permintaan.id_peminta aand id_diminta in ( select id_diminta from permintaan where jenis_permintaan='Ayah' group by id_diminta having count(*) >1)");
        $data = $this->db->query("SELECT * from user INNER JOIN pernikahan 
            WHERE user.id=pernikahan.id_istri AND pernikahan.id_suami=$id OR 
            user.id=pernikahan.id_suami AND pernikahan.id_istri=$id");
        return $data->result();
	}

	public function ayah($id)
 	{
		//$data = $this->db->query(" select user.nama_lengkap, user.foto, user.id,permintaan.* from permintaan inner join user where user.id=permintaan.id_peminta aand id_diminta in ( select id_diminta from permintaan where jenis_permintaan='Ayah' group by id_diminta having count(*) >1)");
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            ON permintaan.id_diminta=user.id
            WHERE permintaan.id_peminta='$id'
            AND permintaan.status_permintaan='Terima'
            AND permintaan.jenis_permintaan='Ayah'
			");
		return $data->result();
	}

	public function ibu($id)
 	{
		//$data = $this->db->query(" select user.nama_lengkap, user.foto, user.id,permintaan.* from permintaan inner join user where user.id=permintaan.id_peminta aand id_diminta in ( select id_diminta from permintaan where jenis_permintaan='Ayah' group by id_diminta having count(*) >1)");
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            ON permintaan.id_diminta=user.id
			
            WHERE permintaan.id_peminta='$id'
            AND permintaan.status_permintaan='Terima'
            AND permintaan.jenis_permintaan='Ibu' 
			");
		return $data->result();
	}

	public function anak($id)
 	{
		//$data = $this->db->query(" select user.nama_lengkap, user.foto, user.id,permintaan.* from permintaan inner join user where user.id=permintaan.id_peminta aand id_diminta in ( select id_diminta from permintaan where jenis_permintaan='Ayah' group by id_diminta having count(*) >1)");
        $data = $this->db->query("SELECT * from user INNER JOIN permintaan 
            ON permintaan.id_peminta=user.id
			
            WHERE permintaan.id_diminta='$id'
            AND permintaan.status_permintaan='Terima'
            AND (permintaan.jenis_permintaan='Ibu' 
            OR  permintaan.jenis_permintaan='Ayah' )
			");
		return $data->result();
	}
}
?>


	